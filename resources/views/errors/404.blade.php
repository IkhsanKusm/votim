<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>404 - Halaman Tidak Ditemukan</title>
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
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
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
            <!-- Creative 404 Illustration -->
            <div class="relative flex items-center justify-center">
                <!-- Floating Numbers -->
                <div class="flex items-center gap-4 text-8xl font-black">
                    <span class="animate-bounce text-transparent bg-clip-text bg-gradient-to-br from-[#4A90E2] to-[#6325f4]" style="animation-delay: 0s;">4</span>
                    
                    <!-- Broken Link Icon in the middle -->
                    <div class="relative flex h-20 w-20 items-center justify-center">
                        <!-- Pulsing Circle Background -->
                        <div class="absolute inset-0 animate-ping rounded-full bg-[#4A90E2] opacity-20"></div>
                        <div class="absolute inset-0 rounded-full bg-gradient-to-br from-[#4A90E2]/20 to-[#6325f4]/20 backdrop-blur-sm"></div>
                        
                        <!-- Icon with Rotation Animation -->
                        <span class="material-symbols-outlined relative text-5xl text-white" style="animation: float 3s ease-in-out infinite;">
                            link_off
                        </span>
                    </div>
                    
                    <span class="animate-bounce text-transparent bg-clip-text bg-gradient-to-br from-[#6325f4] to-[#4A90E2]" style="animation-delay: 0.2s;">4</span>
                </div>
            </div>
            
            <style>
                @keyframes float {
                    0%, 100% { transform: translateY(0px) rotate(0deg); }
                    50% { transform: translateY(-10px) rotate(5deg); }
                }
            </style>
            
            <!-- Header and Body Text -->
            <div class="flex flex-col items-center gap-2">
                <h1 class="text-4xl font-bold tracking-tighter text-white md:text-5xl">404</h1>
                <p class="text-lg font-semibold leading-tight tracking-tight text-white">Halaman Tidak Ditemukan</p>
                <p class="mt-2 max-w-xs text-sm font-normal leading-normal text-[#E0E0E0]/80">
                    Sepertinya halaman yang Anda cari tidak ada. Anda bisa kembali ke beranda atau mencoba pencarian lain.
                </p>
            </div>
            
            <!-- Action Buttons -->
            <div class="mt-4 flex w-full flex-col items-center gap-4 sm:flex-row sm:justify-center">
                <!-- Primary CTA -->
                <a href="{{ route('home') }}" 
                   class="flex h-10 w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-gradient-to-r from-[#4A90E2] to-[#6325f4] px-6 text-sm font-bold text-white shadow-lg shadow-[#4A90E2]/20 transition-all hover:shadow-xl hover:shadow-[#6325f4]/30 sm:w-auto">
                    <span>Kembali ke Beranda</span>
                </a>
                
                <!-- Secondary CTA -->
                <a href="{{ route('contact') }}" 
                   class="flex h-10 w-full min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg border border-white/20 bg-white/10 px-6 text-sm font-bold text-white transition-colors hover:bg-white/20 sm:w-auto">
                    <span class="truncate">Hubungi Dukungan</span>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
