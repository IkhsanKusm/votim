<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vot.ai') }}</title>

    <!-- Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (Dev Mode) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js (Untuk interaksi UI sederhana) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #0B0F19; }
        ::-webkit-scrollbar-thumb { background: #334155; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #475569; }

        /* Ambient Animation */
        @keyframes float {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .blob { animation: float 7s infinite; }
        
        /* Glass Utilities */
        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .glass-sidebar {
            background: rgba(11, 15, 25, 0.7);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>
</head>
<body class="bg-[#0B0F19] text-slate-300 antialiased overflow-hidden selection:bg-purple-500 selection:text-white">

    <!-- 0. Ambient Background (Glow Effects) -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="blob absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-purple-600/20 rounded-full blur-[120px] mix-blend-screen"></div>
        <div class="blob absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[120px] mix-blend-screen" style="animation-delay: 2s"></div>
    </div>

    <div class="relative z-10 flex h-screen">
        
        <!-- 1. Sidebar (Fixed Left - 260px) -->
        <aside class="w-[260px] flex-shrink-0 h-full flex flex-col glass-sidebar z-50">
            <!-- Logo -->
            <div class="h-20 flex items-center px-8 border-b border-white/5">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-purple-600 to-blue-600 flex items-center justify-center shadow-lg shadow-purple-500/25">
                        <span class="text-white font-bold text-lg">V</span>
                    </div>
                    <span class="text-white font-bold text-xl tracking-tight">Vot.ai</span>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <!-- Helper: Nav Item Component -->
                @php
                    function navClass($active) {
                        return $active 
                            ? 'bg-purple-500/10 text-white shadow-[0_0_15px_rgba(168,85,247,0.15)] border-purple-500/30' 
                            : 'text-slate-400 hover:text-white hover:bg-white/5 border-transparent';
                    }
                @endphp

                <a href="{{ route('dashboard') }}" class="{{ navClass(request()->routeIs('dashboard')) }} flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium border transition-all duration-300 group">
                    <svg class="w-5 h-5 {{ request()->routeIs('dashboard') ? 'text-purple-400' : 'text-slate-500 group-hover:text-slate-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Insight Studio
                </a>

                <div class="pt-4 pb-2">
                    <p class="px-4 text-[10px] font-bold text-slate-500 uppercase tracking-wider">Features</p>
                </div>

                <a href="#" class="{{ navClass(false) }} flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium border transition-all duration-300 group">
                    <svg class="w-5 h-5 text-slate-500 group-hover:text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    Voting & Polling
                </a>

                <a href="#" class="{{ navClass(false) }} flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium border transition-all duration-300 group">
                    <svg class="w-5 h-5 text-slate-500 group-hover:text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    Public Opinion
                </a>

                <a href="#" class="{{ navClass(false) }} flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium border transition-all duration-300 group">
                    <svg class="w-5 h-5 text-slate-500 group-hover:text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Room Forum
                </a>
            </nav>

            <!-- User Profile -->
            <div class="p-4 border-t border-white/5">
                <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-white/5 border border-white/5 hover:bg-white/10 transition cursor-pointer">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-r from-slate-700 to-slate-600 flex items-center justify-center text-xs font-bold text-white border border-white/10">
                        {{ substr(auth()->user()->display_name ?? 'Guest', 0, 2) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate">{{ auth()->user()->display_name ?? 'Guest User' }}</p>
                        <p class="text-[10px] text-purple-400 font-bold uppercase tracking-wide">
                            {{ ucfirst(auth()->user()->plan_type ?? 'Free') }} Plan
                        </p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- 2. Main Content Wrapper -->
        <div class="flex-1 flex flex-col h-full relative overflow-hidden">
            
            <!-- Topbar (Header) -->
            <header class="h-[70px] w-full flex items-center justify-between px-8 border-b border-white/5 bg-[#0B0F19]/50 backdrop-blur-md sticky top-0 z-40">
                <!-- Page Title -->
                <div>
                    <h1 class="text-white font-semibold text-lg tracking-tight">@yield('header', 'Dashboard')</h1>
                </div>

                <!-- Right Actions -->
                <div class="flex items-center gap-4">
                    <!-- AI Credits -->
                    <div class="hidden md:flex items-center gap-2 px-3 py-1.5 rounded-full bg-black/40 border border-white/10">
                        <div class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_8px_#10B981]"></div>
                        <span class="text-xs text-slate-400 font-medium">AI Credits: <span class="text-white">850</span>/1000</span>
                    </div>

                    <!-- Logout Form -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-slate-400 hover:text-white transition">
                            Sign Out
                        </button>
                    </form>
                </div>
            </header>

            <!-- Scrollable Content -->
            <main class="flex-1 overflow-y-auto overflow-x-hidden p-8">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>