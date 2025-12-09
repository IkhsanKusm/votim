<x-app-layout title="Settings">
    <div x-data="{ activeTab: 'profile' }">
        
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-white tracking-tight">Settings</h1>
            <p class="text-gray-400 mt-1">Manage your account preferences and subscription.</p>
        </div>

        <!-- Tab Navigation -->
        <div class="flex items-center gap-6 mb-8 border-b border-white/10">
            <button @click="activeTab = 'profile'" 
                :class="activeTab === 'profile' ? 'text-purple-400 border-purple-500' : 'text-gray-400 border-transparent hover:text-white'"
                class="pb-3 border-b-2 font-medium transition duration-200">
                User Profile
            </button>
            <button @click="activeTab = 'billing'" 
                :class="activeTab === 'billing' ? 'text-purple-400 border-purple-500' : 'text-gray-400 border-transparent hover:text-white'"
                class="pb-3 border-b-2 font-medium transition duration-200">
                Subscription & Plan
            </button>
        </div>

        <!-- CONTENT: PROFILE TAB -->
        <div x-show="activeTab === 'profile'" x-transition.opacity class="space-y-6">
            
            <!-- Profile Card -->
            <div class="glass-panel p-8 rounded-3xl relative overflow-hidden">
                <div class="flex flex-col md:flex-row gap-8 items-start">
                    
                    <!-- Avatar Upload -->
                    <div class="flex-shrink-0 relative group">
                        <div class="w-24 h-24 rounded-full bg-gradient-to-br from-purple-500 to-blue-600 p-[2px]">
                            <div class="w-full h-full rounded-full bg-[#0B0F19] overflow-hidden flex items-center justify-center">
                                @if(auth()->user()->avatar_url)
                                    <img src="{{ auth()->user()->avatar_url }}" class="w-full h-full object-cover">
                                @else
                                    <span class="text-3xl font-bold text-white">{{ substr(auth()->user()->display_name ?? 'U', 0, 1) }}</span>
                                @endif
                            </div>
                        </div>
                        <button class="absolute bottom-0 right-0 p-2 rounded-full bg-white text-black shadow-lg hover:scale-110 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </button>
                    </div>

                    <!-- Inputs -->
                    <div class="flex-1 space-y-6 w-full">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-400">Display Name</label>
                                <input type="text" value="{{ auth()->user()->display_name }}" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white focus:border-purple-500 focus:outline-none focus:ring-1 focus:ring-purple-500 transition" placeholder="Your Name">
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-400">Email Address</label>
                                <input type="email" value="{{ auth()->user()->email }}" disabled class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-gray-500 cursor-not-allowed" placeholder="email@example.com">
                                <p class="text-xs text-gray-500">Contact admin to change email.</p>
                            </div>
                        </div>

                        <div class="pt-6 border-t border-white/5 flex justify-end">
                            <button class="px-6 py-2.5 rounded-xl bg-purple-600 hover:bg-purple-500 text-white font-semibold transition shadow-lg shadow-purple-500/20">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Danger Zone (Logout & Delete) -->
            <div class="glass-panel p-8 rounded-3xl border border-red-500/20 bg-red-500/5">
                <h3 class="text-lg font-bold text-white mb-4">Danger Zone</h3>
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <p class="text-sm text-gray-400">Sign out of your account session.</p>
                    
                    <!-- LOGOUT BUTTON IMPLEMENTATION -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-2 px-6 py-2.5 rounded-xl bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white font-semibold border border-red-500/20 transition duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- CONTENT: BILLING TAB -->
        <div x-show="activeTab === 'billing'" x-transition.opacity class="space-y-6" style="display: none;">
            
            <!-- Current Plan -->
            <div class="glass-panel p-8 rounded-3xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-500/10 rounded-full blur-[80px] -translate-y-1/2 translate-x-1/2"></div>
                
                <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-6">
                    <div>
                        <div class="text-sm font-bold text-emerald-400 uppercase tracking-wider mb-1">Current Plan</div>
                        <h2 class="text-3xl font-bold text-white">{{ ucfirst(auth()->user()->plan_type ?? 'Free') }} Plan</h2>
                        <p class="text-gray-400 mt-2">Billing cycle: Monthly</p>
                    </div>
                    <div class="text-center md:text-right">
                        @if(auth()->user()->plan_type === 'pro')
                            <p class="text-white font-mono text-xl mb-3">Active until <span class="text-emerald-400">Dec 31, 2025</span></p>
                            <button class="px-6 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-semibold border border-white/10 transition">Manage Subscription</button>
                        @else
                            <button class="px-8 py-3 rounded-xl bg-gradient-to-r from-purple-600 to-blue-600 hover:opacity-90 text-white font-bold shadow-lg shadow-purple-500/30 transition transform hover:scale-105">Upgrade to PRO</button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Pricing Table -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Free Card -->
                <div class="glass-panel p-8 rounded-3xl border border-white/5 opacity-80 hover:opacity-100 transition">
                    <h3 class="text-xl font-bold text-white">Free Starter</h3>
                    <p class="text-3xl font-bold text-white mt-4">$0 <span class="text-sm font-normal text-gray-500">/ mo</span></p>
                    <ul class="mt-6 space-y-4 text-sm text-gray-400">
                        <li class="flex gap-3"><svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 3 Active Activities</li>
                        <li class="flex gap-3"><svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 100 Responses / mo</li>
                        <li class="flex gap-3"><svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> No AI Summary</li>
                    </ul>
                </div>

                <!-- Pro Card -->
                <div class="glass-panel p-8 rounded-3xl border border-purple-500/30 relative overflow-hidden group">
                    <div class="absolute inset-0 bg-purple-500/5 group-hover:bg-purple-500/10 transition"></div>
                    <div class="relative z-10">
                        <div class="flex justify-between items-start">
                            <h3 class="text-xl font-bold text-white">Pro Insight</h3>
                            <span class="px-3 py-1 rounded-full bg-purple-500/20 text-purple-300 text-xs font-bold uppercase">Popular</span>
                        </div>
                        <p class="text-3xl font-bold text-white mt-4">$29 <span class="text-sm font-normal text-gray-500">/ mo</span></p>
                        <ul class="mt-6 space-y-4 text-sm text-gray-300">
                            <li class="flex gap-3"><svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Unlimited Activities</li>
                            <li class="flex gap-3"><svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Unlimited Responses</li>
                            <li class="flex gap-3"><svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> GenAI Report & Summary</li>
                            <li class="flex gap-3"><svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Advanced Export (PDF/CSV)</li>
                        </ul>
                        <button class="w-full mt-8 py-3 rounded-xl bg-white text-purple-900 font-bold hover:bg-gray-100 transition">Upgrade Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
