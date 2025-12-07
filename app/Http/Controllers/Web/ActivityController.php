<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    public function create(Folder $folder)
    {
        abort_if($folder->user_id !== auth()->id(), 403);
        return view('pages.activities.create', compact('folder'));
    }

    public function store(Request $request, Folder $folder)
    {
        abort_if($folder->user_id !== auth()->id(), 403);

        // 1. Validasi Dasar
        $request->validate([
            'title' => 'required|string|max:150',
            'type'  => 'required|in:single_choice,rating,open_opinion',
            // Validasi conditional: opsi wajib ada jika tipe single_choice
            'options' => 'required_if:type,single_choice|array|min:2',
            'options.*' => 'required_if:type,single_choice|string|max:100',
        ]);

        // 2. Susun Payload JSONB berdasarkan Tipe
        $settingsPayload = [];

        if ($request->type === 'single_choice') {
            // Simpan opsi voting ke dalam JSON settings
            $settingsPayload = [
                'options' => array_values($request->options), // Re-index array
                'allow_multiple' => $request->has('allow_multiple'),
                'randomize_order' => true
            ];
        } elseif ($request->type === 'open_opinion') {
            $settingsPayload = [
                'char_limit' => 500,
                'sentiment_analysis' => true // Default true untuk fitur AI
            ];
        } elseif ($request->type === 'rating') {
            $settingsPayload = [
                'scale_max' => 5,
                'icon' => 'star' // star, heart, thumb
            ];
        }

        // 3. Simpan ke Database
        $activity = Activity::create([
            'folder_id' => $folder->id,
            'title' => $request->title,
            'type'  => $request->type,
            'slug'  => Str::slug($request->title) . '-' . Str::random(6), // Unik
            'status' => 'active',
            'settings' => $settingsPayload, // Magic happens here
        ]);

        return redirect()->route('folders.show', $folder->id)
            ->with('success', 'Activity launched successfully!');
    }
}