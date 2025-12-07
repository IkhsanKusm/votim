<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function index()
    {
        // Eager load activities count untuk performa
        $folders = auth()->user()->folders()->withCount('activities')->get();
        return view('pages.folders.index', compact('folders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'module' => 'required|in:voting,opinion,forum',
        ]);

        auth()->user()->folders()->create($validated);

        return redirect()->back()->with('success', 'Folder created successfully');
    }

    public function show(Folder $folder)
    {
        // Pastikan user pemilik folder (Security IDOR Check)
        abort_if($folder->user_id !== auth()->id(), 403);
        
        $folder->load('activities');
        return view('pages.folders.show', compact('folder'));
    }
}