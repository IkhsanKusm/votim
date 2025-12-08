<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class PublicActivityController extends Controller
{
    /**
     * Display the specified resource by slug.
     */
    public function show($slug)
    {
        $activity = Activity::where('slug', $slug)->firstOrFail();

        // Check if closed
        if ($activity->status !== 'active' || ($activity->closed_at && now()->gt($activity->closed_at))) {
            return view('pages.public.closed', compact('activity'));
        }

        return view('pages.public.show', compact('activity'));
    }

    /**
     * Store a newly created response in storage.
     */
    public function store(Request $request, $slug)
    {
        $activity = Activity::where('slug', $slug)->firstOrFail();

        // 1. Check Status
        if ($activity->status !== 'active' || ($activity->closed_at && now()->gt($activity->closed_at))) {
            return back()->with('error', 'This activity is closed.');
        }

        // 2. Identify Guest
        // Prioritize attribute set by Middleware, then cookie
        $fingerprint = $request->get('guest_fingerprint') ?? $request->cookie('vot_guest_fp') ?? $request->ip();

        // 3. Unique Check (Optional Config: but default safe to enforce for polls)
        // Check if this fingerprint has already responded to this activity
        // We look inside the JSONB column value_data->metadata->fingerprint
        $hasVoted = Response::where('activity_id', $activity->id)
            ->whereJsonContains('value_data->metadata->fingerprint', $fingerprint)
            ->exists();

        if ($hasVoted) {
            return back()->with('error', 'You have already voted on this activity.');
        }

        // 4. Validation based on Type
        $rules = [];
        if ($activity->type === 'poll') {
            $rules['option'] = 'required'; // Radio button selection
        } elseif ($activity->type === 'opinion') {
            $rules['opinion'] = 'required|string|min:3|max:5000';
        }

        $request->validate($rules);

        // 5. Construct Payload
        $payload = [];

        if ($activity->type === 'poll') {
            $payload['choice'] = $request->option;
        } elseif ($activity->type === 'opinion') {
            $payload['text'] = $request->opinion;
        }

        // Add Metadata
        $payload['metadata'] = [
            'fingerprint' => $fingerprint,
            'ip'          => $request->ip(),
            'user_agent'  => $request->userAgent(),
            'timestamp'   => now()->toIso8601String(),
        ];

        // 6. Save
        Response::create([
            'activity_id' => $activity->id,
            'value_data' => $payload,
            'is_processed_by_ai' => false,
        ]);

        return back()->with('success', 'Thank you! Your response has been recorded.');
    }
}