<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $activity->title }} - Vot.ai</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #0B0F19; color: #E5E7EB; }
        .glass { background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.1); }
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center p-4 relative overflow-hidden">

    <!-- Ambient Background -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden pointer-events-none z-0">
        <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-purple-900/30 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-blue-900/20 rounded-full blur-[120px]"></div>
    </div>

    <!-- Main Card -->
    <div class="w-full max-w-lg relative z-10">
        
        <!-- Logo -->
        <div class="flex justify-center mb-8">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-purple-500 to-blue-600 flex items-center justify-center font-bold text-white">V</div>
                <span class="text-xl font-bold tracking-tight text-white">Vot.ai</span>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-center animate-fade-in-up">
            <svg class="w-12 h-12 mx-auto mb-2 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <h3 class="font-bold text-lg">Thank You!</h3>
            <p>{{ session('success') }}</p>
        </div>
        @elseif(session('error'))
        <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 text-center">
            <p>{{ session('error') }}</p>
        </div>
        @endif

        <!-- Form Card -->
        @if(!session('success'))
        <div class="glass rounded-2xl p-8 shadow-2xl">
            <div class="mb-6">
                <span class="inline-block px-3 py-1 rounded-full text-xs font-medium bg-white/10 text-gray-300 mb-3 capitalize">
                    {{ $activity->type === 'poll' ? 'Quick Vote' : 'Public Opinion' }}
                </span>
                <h1 class="text-2xl font-bold text-white leading-tight">{{ $activity->title }}</h1>
            </div>

            <form action="{{ route('public.activity.store', $activity->slug) }}" method="POST" class="space-y-6">
                @csrf
                
                @if($activity->type === 'poll')
                    <!-- Poll Options -->
                    <div class="space-y-3">
                        @php $options = $activity->settings['options'] ?? []; @endphp
                        @foreach($options as $option)
                        <label class="cursor-pointer group block">
                            <input type="radio" name="option" value="{{ $option }}" class="peer sr-only" required>
                            <div class="p-4 rounded-xl border border-white/10 bg-white/5 peer-checked:bg-purple-600 peer-checked:border-purple-500 peer-checked:text-white transition group-hover:bg-white/10 flex items-center justify-between">
                                <span class="font-medium text-gray-300 peer-checked:text-white">{{ $option }}</span>
                                <div class="w-5 h-5 rounded-full border border-gray-500 peer-checked:bg-white peer-checked:border-white"></div>
                            </div>
                        </label>
                        @endforeach
                    </div>
                @elseif($activity->type === 'opinion')
                    <!-- Opinion Textarea -->
                    <div>
                        <textarea name="opinion" rows="5" required minlength="3" placeholder="Type your thoughts here..." 
                            class="w-full bg-black/20 border border-white/10 rounded-xl p-4 text-white focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition resize-none"></textarea>
                        <p class="text-xs text-gray-500 mt-2 text-right">Your opinion will be anonymized and processed.</p>
                    </div>
                @endif

                <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-500 hover:to-blue-500 text-white font-bold shadow-lg shadow-purple-500/20 transition transform active:scale-95">
                    Submit Response
                </button>
            </form>
        </div>
        @endif

        <div class="mt-8 text-center text-xs text-gray-600">
            Powered by Vot.ai &bull; <a href="/" class="hover:text-gray-400">Create your own</a>
        </div>
    </div>

</body>
</html>