<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Votim - Insight Studio' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles & Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    
    <!-- Fallback for Dev without Vite Server -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#0B0F19] text-white antialiased h-full overflow-hidden selection:bg-purple-500 selection:text-white">

    <!-- Ambient Background -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="blob bg-purple-900/20 w-[500px] h-[500px] top-0 left-0 blur-[120px]"></div>
        <div class="blob bg-blue-900/10 w-[600px] h-[600px] bottom-0 right-0 blur-[120px]"></div>
    </div>

    <!-- Layout Wrapper -->
    <div class="relative z-10 flex h-screen" x-data="{ sidebarOpen: false }">
        
        <!-- Sidebar -->
        @include('layouts.partials.sidebar')

        <!-- Mobile Sidebar Overlay -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false" x-transition.opacity 
             class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40 lg:hidden"></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col h-full relative overflow-hidden transition-all duration-300 ml-0 lg:ml-[260px]">
            
            <!-- Topbar -->
            <header class="h-16 flex items-center justify-between px-6 border-b border-white/5 bg-[#0B0F19]/80 backdrop-blur-md sticky top-0 z-30">
                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-gray-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                
                <div class="flex items-center gap-4 ml-auto">
                    <!-- Notification Bell -->
                    <button class="relative p-2 text-gray-400 hover:text-white transition">
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </button>
                    <!-- User Menu triggered from Topbar is optional since Sidebar has one, but good for mobile -->
                </div>
            </header>

            <!-- Scrollable Content -->
            <main class="flex-1 overflow-y-auto p-6 lg:p-8 scroll-smooth">
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center gap-2 animate-fade-in-up">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ session('success') }}
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>

</body>
</html>
