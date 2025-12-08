@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <a href="{{ route('folders.index') }}" class="text-gray-400 hover:text-white flex items-center gap-2 mb-2 transition text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Collections
            </a>
            <h1 class="text-3xl font-bold text-white flex items-center gap-3">
                <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                {{ $folder->name }}
            </h1>
            <p class="text-gray-500 capitalize">{{ $folder->module }} Module</p>
        </div>
        
        <!-- Create Activity Button -->
        <a href="{{ route('activities.create', $folder) }}" class="px-5 py-2.5 bg-purple-600 hover:bg-purple-500 text-white rounded-xl shadow-lg shadow-purple-500/25 transition font-medium flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            New Activity
        </a>
    </div>

    <!-- Activities List -->
    <div class="space-y-4">
        @forelse($folder->activities as $activity)
            <div class="p-6 rounded-2xl glass-panel border border-white/5 hover:border-white/10 transition group relative flex items-center justify-between">
                <div>
                    <div class="flex items-center gap-3 mb-1">
                        <span class="px-2 py-0.5 rounded text-xs font-medium uppercase {{ $activity->status === 'active' ? 'bg-emerald-500/10 text-emerald-400' : 'bg-gray-700 text-gray-400' }}">
                            {{ $activity->status }}
                        </span>
                        <span class="text-xs text-gray-500">{{ $activity->created_at->format('M d, Y') }}</span>
                    </div>
                    <h3 class="text-lg font-semibold text-white group-hover:text-purple-300 transition">
                        <a href="{{ route('activities.show', $activity) }}" class="focus:outline-none">
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            {{ $activity->title }}
                        </a>
                    </h3>
                    <p class="text-sm text-gray-400 mt-1 capitalize">{{ $activity->type }} Type</p>
                </div>

                <div class="flex items-center gap-6 relative z-10">
                    <!-- Metrics Preview -->
                    <div class="text-center">
                        <span class="block text-lg font-bold text-white">{{ $activity->responses->count() ?? 0 }}</span>
                        <span class="text-xs text-gray-500">Responses</span>
                    </div>
                    
                    <!-- Action -->
                    <a href="{{ route('activities.show', $activity) }}" class="p-2 rounded-lg bg-white/5 hover:bg-white/10 text-gray-400 hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>
        @empty
            <div class="py-16 text-center rounded-2xl border border-dashed border-white/10 bg-white/5">
                <div class="w-16 h-16 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <p class="text-gray-400 text-lg">No activities yet</p>
                <p class="text-gray-600 text-sm mb-6">Create your first activity in this folder.</p>
                <a href="{{ route('activities.create', $folder) }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-white/10 hover:bg-white/20 text-white rounded-xl transition font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Create Activity
                </a>
            </div>
        @endforelse
    </div>
</div>
@endsection
