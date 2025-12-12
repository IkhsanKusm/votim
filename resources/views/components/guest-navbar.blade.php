<header class="sticky top-0 z-50 py-4 px-4 sm:px-8 md:px-16 lg:px-24">
    <nav class="container mx-auto flex items-center justify-between glassmorphic rounded-xl p-3">
        <div class="flex items-center gap-4">
            <span class="material-symbols-outlined text-primary text-3xl">insights</span>
            <h2 class="text-white text-xl font-bold">Votim</h2>
        </div>
        <div class="md:flex items-center gap-12">
            <a class="text-white hover:text-primary text-sm font-medium leading-normal transition-colors" href="{{ route('platform') }}">Platform</a>
            <a class="text-white hover:text-primary text-sm font-medium leading-normal transition-colors" href="#how-it-works">How it Works</a>
            <a class="text-white hover:text-primary text-sm font-medium leading-normal transition-colors" href="#pricing">Pricing</a>
        </div>
        <div class="flex gap-2">
            @auth
                <a href="{{ route('dashboard') }}" class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary hover:bg-blue-500 text-white text-sm font-bold leading-normal tracking-[0.015em] transition-colors glow-button">
                    <span class="truncate">Dashboard</span>
                </a>
            @else
                <a href="{{ route('login') }}" class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-white/10 hover:bg-white/20 text-white text-sm font-bold leading-normal tracking-[0.015em] transition-colors">
                    <span class="truncate">Login</span>
                </a>
                <a href="{{ route('login') }}" class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary hover:bg-blue-500 text-white text-sm font-bold leading-normal tracking-[0.015em] transition-colors glow-button">
                    <span class="truncate">Sign Up</span>
                </a>
            @endauth
        </div>
    </nav>
</header>
