<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Login - Votim</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        .material-symbols-outlined {
            font-variation-settings:
            'FILL' 0,
            'wght' 300,
            'GRAD' 0,
            'opsz' 24
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            -webkit-backdrop-filter: blur(12px);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#6325f4",
                        "background-light": "#f6f5f8",
                        "background-dark": "#151022",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.5rem",
                        "lg": "1rem",
                        "xl": "1.5rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
</head>
<body class="font-display">
<div class="relative flex h-screen w-full flex-col items-center justify-center overflow-hidden bg-[#0B0F19]">
    
    <!-- Ambient Background -->
    <div class="absolute -top-1/4 -left-1/4 h-1/2 w-1/2 rounded-full bg-gradient-to-br from-[#C887F6]/30 to-[#759DFF]/30 blur-3xl"></div>
    <div class="absolute -bottom-1/4 -right-1/4 h-1/2 w-1/2 rounded-full bg-gradient-to-tl from-[#759DFF]/30 to-[#C887F6]/30 blur-3xl"></div>

    <div class="relative z-10 flex w-full max-w-md flex-col items-center gap-6 rounded-xl p-8 glass-effect">
        <h1 class="text-[#E0E0E0] tracking-light text-[32px] font-bold leading-tight text-center">Welcome Back</h1>
        <p class="text-[#A0AEC0] text-center -mt-4 mb-2">Sign in to access your insight studio</p>

        <!-- Social Login Only (As requested) -->
        <div class="flex flex-col w-full gap-4">
            <a href="{{ route('login.google') }}" class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-xl h-14 px-5 bg-white hover:bg-gray-100 text-[#151022] text-base font-bold leading-normal tracking-[0.015em] transition-all hover:shadow-lg gap-3">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6 h-6" alt="Google">
                <span class="truncate">Continue with Google</span>
            </a>
            
            <!-- Removed Facebook/Password login as per instructions to stick to our Google Auth -->
        </div>

        @if(app()->isLocal())
        <div class="w-full pt-4">
            <div class="relative flex w-full items-center justify-center py-2">
                <div class="w-full h-px bg-white/10"></div>
                <span class="absolute bg-[#1B1A28] px-3 text-xs text-[#a59cba] uppercase tracking-wider">Dev Mode</span>
            </div>
            
            <a href="{{ url('/dev/login') }}" class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-xl h-12 px-5 bg-white/5 border border-white/10 hover:bg-white/10 text-[#C887F6] text-sm font-bold leading-normal tracking-[0.015em] transition-all">
                <span class="truncate">🚀 Bypass Login (Admin)</span>
            </a>
        </div>
        @endif

        <p class="text-[#a59cba] text-xs font-normal leading-normal pt-4 text-center">
            By signing in, you agree to our <a class="font-bold text-white underline transition-colors hover:text-[#C887F6]" href="#"> Terms of Service</a> and <a class="font-bold text-white underline transition-colors hover:text-[#C887F6]" href="#"> Privacy Policy</a>
        </p>
    </div>
</div>
</body>
</html>
