<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $activity->title }} - Vot.ai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #0B0F19; color: white; }
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        /* Animasi masuk */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-enter { animation: fadeUp 0.6s ease-out forwards; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden">

    <!-- Ambient Background -->
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-purple-600/20 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-blue-600/20 rounded-full blur-[120px]"></div>
    </div>

    <!-- Main Card -->
    <div class="w-full max-w-lg glass-card rounded-3xl p-8 relative z-10 animate-enter">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-white/5 mb-4 border border-white/10">
                <span class="text-2xl">
                    @if($activity->type == 'rating') ⭐ 
                    @elseif($activity->type == 'single_choice') 📊 
                    @else 💬 @endif
                </span>
            </div>
            <h1 class="text-2xl font-bold tracking-tight mb-2">{{ $activity->title }}</h1>
            <p class="text-gray-400 text-sm">Powered by Vot.ai • Secure & Anonymous</p>
        </div>

        <!-- Feedback Messages -->
        @if(session('success'))
            <div class="bg-green-500/10 border border-green-500/20 text-green-400 p-4 rounded-xl text-center mb-6">
                <p class="font-medium">✨ {{ session('success') }}</p>
            </div>
        @elseif(session('error'))
            <div class="bg-red-500/10 border border-red-500/20 text-red-400 p-4 rounded-xl text-center mb-6">
                <p class="font-medium">{{ session('error') }}</p>
            </div>
        @elseif($hasVoted)
            <div class="bg-blue-500/10 border border-blue-500/20 text-blue-300 p-4 rounded-xl text-center mb-6">
                <p class="font-medium">Anda sudah mengisi form ini.</p>
            </div>
        @endif

        <!-- Form Stage -->
        @if(!$hasVoted && !session('success'))
        <form action="{{ route('public.submit', $activity->slug) }}" method="POST" class="space-y-6">
            @csrf

            <!-- 1. RENDER: SINGLE CHOICE -->
            @if($activity->type === 'single_choice')
                <div class="space-y-3">
                    @foreach($activity->settings['options'] as $option)
                        <label class="flex items-center gap-4 p-4 rounded-xl bg-white/5 border border-white/5 hover:bg-white/10 hover:border-purple-500/50 cursor-pointer transition group">
                            <input type="radio" name="answer" value="{{ $option }}" class="w-5 h-5 text-purple-500 border-gray-600 focus:ring-purple-500 bg-transparent">
                            <span class="text-gray-200 group-hover:text-white transition">{{ $option }}</span>
                        </label>
                    @endforeach
                </div>
            @endif

            <!-- 2. RENDER: RATING (STAR) -->
            @if($activity->type === 'rating')
                <div class="flex justify-center gap-2 py-4">
                    @php $max = $activity->settings['scale_max'] ?? 5; @endphp
                    @for($i = 1; $i <= $max; $i++)
                        <label class="cursor-pointer group relative">
                            <input type="radio" name="rating" value="{{ $i }}" class="peer sr-only">
                            <!-- Star SVG: Gray by default, Yellow on hover/checked -->
                            <svg class="w-12 h-12 text-gray-600 peer-checked:text-yellow-400 hover:text-yellow-300 transition transform hover:scale-110" 
                                 fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        </label>
                    @endfor
                </div>
            @endif

            <!-- 3. RENDER: OPEN OPINION -->
            @if($activity->type === 'open_opinion')
                <div>
                    <textarea name="text" rows="5" required
                        placeholder="Tulis pendapat Anda di sini..."
                        maxlength="{{ $activity->settings['char_limit'] ?? 500 }}"
                        class="w-full bg-black/20 border border-white/10 rounded-xl p-4 text-white placeholder-gray-500 focus:outline-none focus:border-purple-500 transition resize-none"></textarea>
                    <p class="text-right text-xs text-gray-500 mt-2">Maks {{ $activity->settings['char_limit'] ?? 500 }} karakter. AI akan menganalisis sentimen Anda.</p>
                </div>
            @endif

            <!-- Submit Button -->
            <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-500 hover:to-blue-500 text-white font-bold shadow-lg shadow-purple-500/25 transition transform active:scale-95">
                Kirim Jawaban
            </button>
        </form>
        @endif
        
    </div>

</body>
</html>