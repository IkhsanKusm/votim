<aside class="w-[260px] h-screen fixed left-0 top-0 flex flex-col glass-panel border-r border-white/5 z-50">
    
    <!-- Logo Area -->
    <div class="h-20 flex items-center px-8 border-b border-white/5">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-purple-500 to-blue-600 flex items-center justify-center shadow-lg shadow-purple-500/20">
                <span class="text-white font-bold text-lg">V</span>
            </div>
            <span class="text-white font-bold text-xl tracking-tight">Vot.ai</span>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 px-4 py-6 space-y-2">
        
        <!-- Menu Item: Insight Studio (Active State Example) -->
        <x-nav-link route="dashboard" icon="chart-pie">
            Insight Studio
        </x-nav-link>

        <!-- Menu Item: Voting -->
        <x-nav-link route="folders.index" :params="['module' => 'voting']" icon="archive-box">
            Voting & Polling
        </x-nav-link>

        <!-- Menu Item: Public Opinion -->
        <x-nav-link route="folders.index" :params="['module' => 'opinion']" icon="chat-bubble-left-right">
            Public Opinion
        </x-nav-link>

        <!-- Menu Item: Room Forum -->
        <x-nav-link route="folders.index" :params="['module' => 'forum']" icon="users">
            Room Forum
        </x-nav-link>

    </nav>

    <!-- Bottom: Settings & User -->
    <div class="p-4 border-t border-white/5">
        <x-nav-link route="settings.index" icon="cog">
            Settings
        </x-nav-link>
        
        <!-- User Profile Mini -->
        <div class="mt-4 flex items-center gap-3 px-4 py-3 rounded-xl bg-white/5 border border-white/5 hover:bg-white/10 transition cursor-pointer group">
            <div class="w-8 h-8 rounded-full bg-gradient-to-r from-gray-700 to-gray-600 border border-white/20"></div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-white truncate">{{ auth()->user()->display_name ?? 'Guest' }}</p>
                <p class="text-xs text-gray-500 truncate uppercase">{{ auth()->user()->plan_type ?? 'Free' }} Plan</p>
            </div>
        </div>
    </div>
</aside>