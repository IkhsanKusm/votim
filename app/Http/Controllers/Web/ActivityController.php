<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Folder $folder)
    {
        if ($folder->user_id !== auth()->id()) {
            abort(403);
        }

        return view('pages.activities.create', compact('folder'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Folder $folder)
    {
        if ($folder->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:poll,opinion,qa', // Sesuai field 'type' di DB. Perlu disesuaikan dengan enum module folder jika ada restrict.
            'options' => 'nullable|array', // Untuk tipe Poll
            'settings' => 'nullable|array', // Config tambahan
        ]);

        // Construct settings JSON
        $settings = $request->input('settings', []);
        
        // Jika tipe polling, masukkan options ke dalam settings
        if ($request->has('options')) {
            // Filter empty options
            $options = array_filter($request->input('options'), function($value) {
                return !is_null($value) && $value !== '';
            });
            $settings['options'] = array_values($options);
        }

        $activity = Activity::create([
            'folder_id' => $folder->id,
            'type' => $request->type,
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . Str::random(6),
            'status' => 'active',
            'settings' => $settings, // Auto-casted to JSON by Model
        ]);

        return redirect()->route('folders.show', $folder)->with('success', 'Activity created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        // Simple authorization check
        // Note: Public might need access later, but for dashboard editing/viewing:
        if ($activity->folder->user_id !== auth()->id()) {
            abort(403);
        }

        return view('pages.activities.show', compact('activity'));
    }
}