<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $folders = Folder::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.folders.index', compact('folders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'module' => 'required|in:voting,opinion,forum',
        ]);

        Folder::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'module' => $request->module,
        ]);

        return redirect()->route('folders.index')->with('success', 'Folder created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Folder $folder)
    {
        if ($folder->user_id !== auth()->id()) {
            abort(403);
        }

        $folder->load('activities');
        return view('pages.folders.show', compact('folder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Folder $folder)
    {
        if ($folder->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $folder->update([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Folder updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Folder $folder)
    {
        if ($folder->user_id !== auth()->id()) {
            abort(403);
        }

        $folder->delete();

        return redirect()->route('folders.index')->with('success', 'Folder deleted successfully.');
    }
}