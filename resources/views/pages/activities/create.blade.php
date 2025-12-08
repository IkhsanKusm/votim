@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('folders.show', $folder) }}" class="text-gray-400 hover:text-white flex items-center gap-2 mb-2 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to {{ $folder->name }}
        </a>
        <h1 class="text-3xl font-bold text-white">Create New Activity</h1>
        <p class="text-gray-500">Choose a template to start collecting data</p>
    </div>

    <!-- Template Selection & Config Form -->
    <form action="{{ route('activities.store', $folder) }}" method="POST" x-data="{ selectedType: 'poll' }">
        @csrf
        
        <!-- Template Gallery Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Template 1: Quick Poll -->
            <label class="cursor-pointer relative">
                <input type="radio" name="type" value="poll" class="peer sr-only" x-model="selectedType">
                <div class="p-6 rounded-2xl border border-white/10 bg-white/5 hover:bg-white/10 transition-all peer-checked:border-purple-500 peer-checked:bg-purple-500/10 peer-checked:shadow-[0_0_20px_rgba(168,85,247,0.2)]">
                    <div class="w-12 h-12 rounded-xl bg-purple-500/20 flex items-center justify-center mb-4 text-purple-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h3 class="text-white font-semibold text-lg">Quick Voting</h3>
                    <p class="text-sm text-gray-400 mt-2">Multiple choice questions. Best for making decisions or quick surveys.</p>
                </div>
            </label>

            <!-- Template 2: Public Opinion -->
            <label class="cursor-pointer relative">
                <input type="radio" name="type" value="opinion" class="peer sr-only" x-model="selectedType">
                <div class="p-6 rounded-2xl border border-white/10 bg-white/5 hover:bg-white/10 transition-all peer-checked:border-blue-500 peer-checked:bg-blue-500/10 peer-checked:shadow-[0_0_20px_rgba(59,130,246,0.2)]">
                    <div class="w-12 h-12 rounded-xl bg-blue-500/20 flex items-center justify-center mb-4 text-blue-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    </div>
                    <h3 class="text-white font-semibold text-lg">Public Opinion</h3>
                    <p class="text-sm text-gray-400 mt-2">Open-ended questions. AI will summarize and detect sentiment.</p>
                </div>
            </label>
        </div>

        <!-- Configuration Section -->
        <div class="glass-panel p-8 rounded-2xl border border-white/5">
            <h2 class="text-xl font-semibold text-white mb-6">Configuration</h2>
            
            <!-- Common Field: Title -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-400 mb-2">Activity Question / Title</label>
                <input type="text" name="title" required placeholder="e.g., What should we build next?" 
                    class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition">
            </div>

            <!-- Dynamic Fields: Voting Options -->
            <div x-show="selectedType === 'poll'" class="mb-6 space-y-3" x-transition>
                <label class="block text-sm font-medium text-gray-400">Voting Options</label>
                
                <div class="space-y-3" x-data="{ options: [1, 2] }">
                    <template x-for="(opt, index) in options" :key="index">
                        <div class="flex gap-2">
                            <input type="text" name="options[]" :placeholder="'Option ' + (index + 1)" 
                                class="flex-1 bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-purple-500 transition">
                        </div>
                    </template>
                    
                    <button type="button" @click="options.push(options.length + 1)" 
                        class="text-sm text-purple-400 hover:text-purple-300 font-medium flex items-center gap-1 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Add another option
                    </button>
                </div>
            </div>

            <!-- Dynamic Fields: Opinion Settings -->
            <div x-show="selectedType === 'opinion'" class="mb-6" x-transition>
                <div class="p-4 rounded-xl bg-blue-500/5 border border-blue-500/20 text-sm text-blue-200">
                    <p class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        AI Aggregation will be enabled automatically for this activity type.
                    </p>
                </div>
            </div>

            <!-- Submit -->
            <div class="pt-6 border-t border-white/5 flex justify-end">
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-500 hover:to-blue-500 text-white font-semibold rounded-xl shadow-lg shadow-purple-500/25 transition-all transform hover:scale-[1.02]">
                    Create Activity
                </button>
            </div>
        </div>
    </form>
</div>
<script src="//unpkg.com/alpinejs" defer></script>
@endsection