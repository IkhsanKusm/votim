<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PublicActivityController extends Controller
{
    /**
     * Tampilkan Halaman Voting / Opini
     */
    public function show($slug)
    {
        $activity = Activity::where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        // Cek Fingerprint untuk UX (Apakah user ini sudah pernah vote?)
        $fingerprint = Cookie::get('vot_guest_fp');
        $hasVoted = false;

        if ($fingerprint) {
            // Query JSONB Postgres: Cek apakah fingerprint ada di dalam value_data
            $hasVoted = Response::where('activity_id', $activity->id)
                ->where('value_data->fingerprint', $fingerprint)
                ->exists();
        }

        return view('pages.public.show', compact('activity', 'hasVoted'));
    }

    /**
     * Handle Submission
     */
    public function submit(Request $request, $slug)
    {
        $activity = Activity::where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        // 1. Ambil Fingerprint dari Cookie (Identity Proof)
        $fingerprint = $request->cookie('vot_guest_fp');

        if (!$fingerprint) {
            throw ValidationException::withMessages(['system' => 'Browser Anda tidak mendukung cookie.']);
        }

        // 2. Validasi Duplicate Vote (Jika Activity disetting "Strict")
        // Default kita anggap strict untuk demo ini.
        $alreadyVoted = Response::where('activity_id', $activity->id)
            ->where('value_data->fingerprint', $fingerprint)
            ->exists();

        if ($alreadyVoted) {
            return back()->with('error', 'Anda sudah mengisi form ini sebelumnya.');
        }

        // 3. Validasi Input Berdasarkan Tipe Activity
        $rules = [];
        if ($activity->type === 'single_choice') {
            $options = $activity->settings['options'] ?? [];
            $rules['answer'] = 'required|in:' . implode(',', $options);
        } elseif ($activity->type === 'rating') {
            $max = $activity->settings['scale_max'] ?? 5;
            $rules['rating'] = 'required|integer|min:1|max:' . $max;
        } elseif ($activity->type === 'open_opinion') {
            $limit = $activity->settings['char_limit'] ?? 500;
            $rules['text'] = 'required|string|min:3|max:' . $limit;
        }

        $validated = $request->validate($rules);

        // 4. Susun Payload JSONB
        // Kita simpan jawaban + fingerprint dalam satu kolom untuk hemat storage
        $payload = array_merge($validated, [
            'fingerprint' => $fingerprint,
            'ip_hash'     => md5($request->ip()), // Layer keamanan kedua (opsional)
            'submitted_at'=> now()->toIso8601String()
        ]);

        // 5. Simpan ke Database
        Response::create([
            'activity_id' => $activity->id,
            'value_data'  => $payload,
            'is_processed_by_ai' => false, // Pending untuk Queue Worker
        ]);

        return back()->with('success', 'Terima kasih! Suara Anda telah direkam.');
    }
}