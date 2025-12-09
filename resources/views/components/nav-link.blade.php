@props(['route', 'icon', 'params' => []])

@php
$isActive = request()->routeIs($route) && (empty($params) || request()->route('module') == $params['module']);

// Base Class
$classes = 'flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-300 group relative overflow-hidden';

// Active State (Neon Glow Ungu)
if ($isActive) {
    $classes .= ' bg-purple-500/10 text-white shadow-[0_0_20px_rgba(168,85,247,0.15)] border border-purple-500/30';
} else {
    // Inactive State
    $classes .= ' text-gray-400 hover:text-white hover:bg-white/5 border border-transparent';
}
@endphp

<a href="{{ route($route, $params)}}" {{ $attributes->merge(['class' => $classes]) }}>
    <!-- Active Indicator Bar (Left Side) -->
    @if($isActive)
        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-6 bg-purple-400 rounded-r-full shadow-[0_0_10px_#A855F7]"></div>
    @endif

    <!-- Icon Placeholder (Ganti dengan SVG/Phosphor Icons nanti) -->
    <span class="{{ $isActive ? 'text-purple-400 drop-shadow-[0_0_5px_rgba(168,85,247,0.5)]' : 'text-gray-500 group-hover:text-gray-300' }}">
        <!-- SVG Icon sederhana untuk demo -->
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
    </span>

    <span class="relative z-10">{{ $slot }}</span>
    
    <!-- Hover Glow Effect -->
    <div class="absolute inset-0 bg-gradient-to-r from-white/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
</a>