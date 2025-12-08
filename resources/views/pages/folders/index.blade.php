@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-white">My Collections</h1>
            <p class="text-gray-500">Manage your folders and activities</p>
        </div>
        
        <!-- Create Folder Trigger -->
        <button x-data @click="$dispatch('open-modal', 'create-folder')" class="px-5 py-2.5 bg-white/10 hover:bg-white/20 border border-white/10 hover:border-white/20 text-white rounded-xl transition font-medium flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            New Folder
        </button>
    </div>

    <!-- Folders Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($folders as $folder)
            <a href="{{ route('folders.show', $folder) }}" class="block p-6 rounded-2xl glass-panel border border-white/5 hover:border-purple-500/50 hover:bg-white/5 transition group relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-gray-800 to-black flex items-center justify-center border border-white/10 group-hover:border-purple-500/50 transition">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                    </div>
                    <!-- Options Menu could go here -->
                </div>
                <h3 class="text-lg font-semibold text-white group-hover:text-purple-300 transition">{{ $folder->name }}</h3>
                <p class="text-sm text-gray-500 mt-1 capitalize">{{ $folder->module }} Module</p>
                
                <div class="mt-4 pt-4 border-t border-white/5 flex items-center justify-between text-xs text-gray-500">
                    <span>{{ $folder->created_at->diffForHumans() }}</span>
                    <span>0 Activities</span> <!-- Count later -->
                </div>
            </a>
        @empty
            <div class="col-span-full py-12 text-center">
                <div class="w-16 h-16 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                </div>
                <p class="text-gray-400 text-lg">No folders found</p>
                <p class="text-gray-600 text-sm">Create one to start organizing your activities.</p>
            </div>
        @endforelse
    </div>

    <!-- Create Folder Modal - Simplified -->
    <div x-data="{ open: false }" 
         x-show="open" 
         @open-modal.window="if ($event.detail === 'create-folder') open = true"
         @keydown.escape.window="open = false" 
         class="fixed inset-0 z-50 flex items-center justify-center px-4" 
         style="display: none;">
         
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" @click="open = false"></div>
        
        <div class="relative bg-[#0F1422] border border-white/10 rounded-2xl w-full max-w-md p-6 shadow-2xl">
            <h3 class="text-xl font-bold text-white mb-4">Create New Folder</h3>
            
            <form action="{{ route('folders.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-400 mb-2">Folder Name</label>
                    <input type="text" name="name" required class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-purple-500">
                </div>
                
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-400 mb-2">Module Type</label>
                    <select name="module" class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-purple-500 appearance-none">
                        <option value="voting">Voting & Polling</option>
                        <option value="opinion">Public Opinion</option>
                        <option value="forum">Forum Room</option>
                    </select>
                </div>
                
                <div class="flex justify-end gap-3">
                    <button type="button" @click="open = false" class="px-4 py-2 text-gray-400 hover:text-white transition">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-purple-600 hover:bg-purple-500 text-white rounded-xl font-medium transition">Create Folder</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="//unpkg.com/alpinejs" defer></script>
@endsection
