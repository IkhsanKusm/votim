<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Vot.ai - Insight Studio' }}</title>

    <!-- Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script> <!-- Fallback dev -->

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* Ambient Blobs Animation */
        @keyframes float {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .blob {
            animation: float 7s infinite;
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body class="bg-[#0B0F19] text-gray-300 antialiased overflow-x-hidden relative">

    <!-- 0. Ambient Background (The "Deep" Part) -->
    <!-- Elemen ini penting agar efek kaca terlihat -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="blob absolute top-0 left-0 w-[500px] h-[500px] bg-purple-900/20 rounded-full blur-[100px] mix-blend-screen"></div>
        <div class="blob absolute bottom-0 right-0 w-[500px] h-[500px] bg-blue-900/10 rounded-full blur-[100px] mix-blend-screen animation-delay-2000"></div>
    </div>

    <!-- Layout Container (Z-Index harus di atas ambient background) -->
    <div class="relative z-10 flex h-screen overflow-hidden">
        
        <!-- 1. Sidebar (Fixed Left) -->
        @include('layouts.partials.sidebar')

        <!-- 2. Main Content Wrapper -->
        <div class="flex-1 flex flex-col h-full relative overflow-y-auto overflow-x-hidden ml-[260px]">
            
            <!-- 3. Top Bar -->
            @include('layouts.partials.topbar')

            <!-- 4. Content Stage -->
            <main class="flex-1 p-8 pt-24">
                {{ $slot }}
            </main>
        </div>
    </div>

</body>
</html>