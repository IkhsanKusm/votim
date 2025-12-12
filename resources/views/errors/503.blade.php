<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Mode Pemeliharaan - Votim</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#4A90E2",
                        "background-light": "#f6f5f8",
                        "background-dark": "#0B0F19",
                        "deep-space": "#0B0F19",
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
                    animation: {
                        'blob-1': 'blob-1 15s infinite ease-in-out',
                        'blob-2': 'blob-2 20s infinite ease-in-out',
                        'spin-slow': 'spin 3s linear infinite',
                        'spin-reverse': 'spin-reverse 4s linear infinite',
                    },
                    keyframes: {
                        'blob-1': {
                            '0%, 100%': { transform: 'translate(0px, 0px) scale(1)' },
                            '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                            '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                        },
                        'blob-2': {
                            '0%, 100%': { transform: 'translate(0px, 0px) scale(1)' },
                            '33%': { transform: 'translate(-40px, 30px) scale(1.2)' },
                            '66%': { transform: 'translate(50px, -20px) scale(0.8)' },
                        },
                        'spin-reverse': {
                            '0%': { transform: 'rotate(360deg)' },
                            '100%': { transform: 'rotate(0deg)' },
                        },
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }
        
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(74, 144, 226, 0.3); }
            50% { box-shadow: 0 0 40px rgba(74, 144, 226, 0.6); }
        }
        
        .pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite;
        }
    </style>
</head>
<body class="font-display">
    <div class="relative flex min-h-screen w-full flex-col items-center justify-center overflow-hidden bg-deep-space text-[#E0E0E0] dark group/design-root">
        <!-- Ambient Light Blobs -->
        <div class="absolute top-0 -left-1/4 h-[500px] w-[500px] animate-blob-1 rounded-full bg-[#4A90E2] opacity-20 blur-3xl filter"></div>
        <div class="absolute bottom-0 -right-1/4 h-[500px] w-[500px] animate-blob-2 rounded-full bg-[#6325f4] opacity-20 blur-3xl filter"></div>
        
        <!-- Central Glassmorphic Panel -->
        <div class="relative z-10 flex w-full max-w-lg flex-col items-center gap-6 rounded-xl border border-white/10 bg-white/10 p-8 text-center shadow-2xl shadow-black/20 backdrop-blur-2xl md:p-12">
            
            <!-- Creative Settings Illustration -->
            <div class="relative flex h-32 w-32 items-center justify-center">
                <!-- Outer Rotating Glow -->
                <div class="absolute inset-0 animate-spin-slow rounded-full bg-gradient-to-r from-[#4A90E2]/30 to-transparent"></div>
                
                <!-- Main Settings Icon Container -->
                <div class="relative flex h-24 w-24 items-center justify-center">
                    <!-- Pulsing Background -->
                    <div class="absolute inset-0 pulse-glow rounded-full bg-gradient-to-br from-[#4A90E2]/20 to-[#6325f4]/20"></div>
                    
                    <!-- Outer Gear (Rotating Counter-clockwise) -->
                    <span class="material-symbols-outlined absolute text-7xl text-[#4A90E2]/40 animate-spin-reverse">
                        settings
                    </span>
                    
                    <!-- Middle Gear (Rotating Clockwise) -->
                    <span class="material-symbols-outlined absolute text-5xl text-white/60 animate-spin-slow">
                        settings
                    </span>
                    
                    <!-- Inner Tool Icon (Static) -->
                    <span class="material-symbols-outlined relative text-3xl text-white">
                        construction
                    </span>
                </div>
                
                <!-- Sparkle Effects -->
                <div class="absolute top-0 right-0 h-2 w-2 rounded-full bg-[#4A90E2] animate-ping"></div>
                <div class="absolute bottom-2 left-2 h-2 w-2 rounded-full bg-[#6325f4] animate-ping" style="animation-delay: 0.5s;"></div>
            </div>
            
            <!-- Header and Body Text -->
            <div class="flex flex-col items-center gap-2">
                <h1 class="text-3xl font-bold tracking-tight text-white md:text-4xl">Kami Sedang Melakukan Perbaikan</h1>
                <p class="mt-2 max-w-sm text-sm font-normal leading-normal text-[#E0E0E0]/80">
                    Votim sedang dalam pemeliharaan terjadwal untuk meningkatkan layanan kami. Mohon maaf atas ketidaknyamanannya.
                </p>
                <div class="mt-4 flex items-center gap-2 rounded-lg bg-white/5 px-4 py-2 border border-white/10">
                    <span class="material-symbols-outlined text-[#4A90E2] text-xl">schedule</span>
                    <p class="text-xs font-semibold text-white/80">Estimasi: Kembali dalam 30 menit</p>
                </div>
            </div>
            
            <!-- Action Button -->
            <div class="mt-4 flex w-full flex-col items-center gap-4 sm:flex-row sm:justify-center">
                <a href="{{ route('home') }}" 
                   class="flex h-10 w-full min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg border border-white/20 bg-white/10 px-6 text-sm font-bold text-white transition-colors hover:bg-white/20 sm:w-auto">
                    <span class="truncate">Kembali ke Beranda</span>
                </a>
            </div>
            
            <!-- Social Links (Optional) -->
            <div class="mt-6 flex flex-col items-center gap-3">
                <p class="text-xs text-white/50">Ikuti update kami:</p>
                <div class="flex gap-4">
                    <a href="#" class="flex h-8 w-8 items-center justify-center rounded-full bg-white/5 border border-white/10 text-white/60 transition-all hover:bg-white/10 hover:text-white">
                        <span class="text-sm">𝕏</span>
                    </a>
                    <a href="#" class="flex h-8 w-8 items-center justify-center rounded-full bg-white/5 border border-white/10 text-white/60 transition-all hover:bg-white/10 hover:text-white">
                        <span class="text-sm">in</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
