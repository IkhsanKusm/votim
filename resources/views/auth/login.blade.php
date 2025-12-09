<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Votim</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #0B0F19; }
        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            z-index: 0;
            opacity: 0.6;
        }
    </style>
</head>
<body class="h-screen w-full flex items-center justify-center relative overflow-hidden text-gray-300">

    <!-- Ambient Background -->
    <div class="blob bg-purple-600 w-96 h-96 top-0 left-0 -translate-x-1/2 -translate-y-1/2"></div>
    <div class="blob bg-blue-600 w-96 h-96 bottom-0 right-0 translate-x-1/2 translate-y-1/2"></div>

    <!-- Main Container -->
    <div class="glass-panel p-10 rounded-3xl w-full max-w-sm relative z-10 shadow-2xl text-center">
        
        <!-- Logo/Brand -->
        <div class="mb-8 flex flex-col items-center">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-500 to-blue-600 flex items-center justify-center text-white font-bold text-2xl shadow-lg shadow-purple-500/30 mb-4">
                V
            </div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Welcome Back</h1>
            <p class="text-gray-500 text-sm mt-1">Masuk untuk mengelola insight Anda</p>
        </div>

        <!-- Google Login Button -->
        <a href="{{ route('login.google') }}" class="flex items-center justify-center gap-3 w-full bg-white hover:bg-gray-100 text-gray-900 font-semibold py-3.5 px-4 rounded-xl transition duration-200 shadow-lg group">
            <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5 transition-transform group-hover:scale-110" alt="Google">
            <span>Continue with Google</span>
        </a>

        <!-- Divider -->
        <div class="my-8 flex items-center gap-4 opacity-50">
            <div class="h-px bg-gray-700 flex-1"></div>
            <span class="text-xs text-gray-500 uppercase tracking-widest">or</span>
            <div class="h-px bg-gray-700 flex-1"></div>
        </div>

        <!-- Dev Bypass (Only Local) -->
        @if(app()->isLocal())
        <div class="bg-white/5 border border-white/5 rounded-xl p-4 mb-6">
            <p class="text-xs text-gray-400 mb-3 font-mono">Development Mode Access</p>
            <a href="{{ url('/dev/login') }}" class="block w-full py-2 bg-purple-500/20 hover:bg-purple-500/30 text-purple-300 text-xs font-bold rounded-lg border border-purple-500/30 transition">
                🚀 Bypass as Admin
            </a>
        </div>
        @endif

        <!-- Footer -->
        <div class="text-[10px] text-gray-600 leading-relaxed">
            By continuing, you agree to Votim's 
            <a href="#" class="underline hover:text-gray-400">Terms of Service</a> and 
            <a href="#" class="underline hover:text-gray-400">Privacy Policy</a>.
        </div>
    </div>

</body>
</html>
