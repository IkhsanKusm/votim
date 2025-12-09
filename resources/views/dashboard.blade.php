<x-app-layout>
    @section('header', 'Insight Studio')

    <div class="max-w-7xl mx-auto space-y-8">
        
        <!-- 1. Report Composer (Hero Action) -->
        <div class="relative group">
            <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-600 to-blue-600 rounded-2xl opacity-30 group-hover:opacity-60 blur transition duration-500"></div>
            <div class="relative glass-panel rounded-2xl p-8 flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <h2 class="text-2xl font-bold text-white mb-2">Buat Laporan Baru</h2>
                    <p class="text-slate-400 max-w-xl">
                        Gabungkan data voting, opini publik, dan forum menjadi satu laporan strategis PDF yang dianalisis oleh AI.
                    </p>
                </div>
                <button class="px-6 py-3 rounded-xl bg-white text-[#0B0F19] font-bold text-sm hover:bg-purple-50 transition shadow-[0_0_20px_rgba(255,255,255,0.3)] transform hover:scale-105">
                    Compose Report +
                </button>
            </div>
        </div>

        <!-- 2. Quick Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Stat 1 -->
            <div class="glass-panel p-6 rounded-2xl border-t border-purple-500/20 relative overflow-hidden group">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-400 text-sm font-medium">Total Responden</p>
                        <h3 class="text-3xl font-bold text-white mt-1">1,240</h3>
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-purple-500/20 flex items-center justify-center text-purple-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                </div>
                <div class="flex items-center text-xs text-emerald-400 font-medium">
                    <span>+12% dari minggu lalu</span>
                </div>
                <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-purple-500/10 rounded-full blur-2xl group-hover:bg-purple-500/20 transition-all"></div>
            </div>

            <!-- Stat 2 -->
            <div class="glass-panel p-6 rounded-2xl border-t border-blue-500/20 relative overflow-hidden group">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-400 text-sm font-medium">Active Activities</p>
                        <h3 class="text-3xl font-bold text-white mt-1">3 <span class="text-sm text-slate-500 font-normal">/ 5</span></h3>
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-blue-500/20 flex items-center justify-center text-blue-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                </div>
                <div class="flex items-center text-xs text-slate-400 font-medium">
                    <span>Limit Free Plan</span>
                </div>
                <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-blue-500/10 rounded-full blur-2xl group-hover:bg-blue-500/20 transition-all"></div>
            </div>

            <!-- Stat 3 -->
            <div class="glass-panel p-6 rounded-2xl border-t border-pink-500/20 relative overflow-hidden group">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-400 text-sm font-medium">Avg. Sentiment</p>
                        <h3 class="text-3xl font-bold text-white mt-1">Positif</h3>
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-pink-500/20 flex items-center justify-center text-pink-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>
                <div class="flex items-center text-xs text-slate-400 font-medium">
                    <span>Berdasarkan 50 opini terakhir</span>
                </div>
                <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-pink-500/10 rounded-full blur-2xl group-hover:bg-pink-500/20 transition-all"></div>
            </div>
        </div>

        <!-- 3. Recent Activity Table -->
        <div class="space-y-4">
            <h3 class="text-white font-semibold text-lg">Aktivitas Terakhir</h3>
            
            <div class="glass-panel rounded-2xl overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-white/5 text-slate-400 text-xs uppercase tracking-wider">
                        <tr>
                            <th class="p-4 font-medium border-b border-white/5">Nama Aktivitas</th>
                            <th class="p-4 font-medium border-b border-white/5">Tipe</th>
                            <th class="p-4 font-medium border-b border-white/5">Status</th>
                            <th class="p-4 font-medium border-b border-white/5 text-right">Responden</th>
                            <th class="p-4 font-medium border-b border-white/5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-white/5">
                        <!-- Row 1 -->
                        <tr class="hover:bg-white/5 transition">
                            <td class="p-4 font-medium text-white">Evaluasi Kinerja Q3</td>
                            <td class="p-4 text-slate-400">
                                <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md bg-purple-500/10 text-purple-400 text-xs border border-purple-500/20">
                                    Open Opinion
                                </span>
                            </td>
                            <td class="p-4">
                                <span class="inline-flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                    <span class="text-emerald-400">Active</span>
                                </span>
                            </td>
                            <td class="p-4 text-right text-white">85</td>
                            <td class="p-4 text-right">
                                <a href="#" class="text-purple-400 hover:text-purple-300 font-medium text-xs">View Report &rarr;</a>
                            </td>
                        </tr>
                        <!-- Row 2 -->
                        <tr class="hover:bg-white/5 transition">
                            <td class="p-4 font-medium text-white">Menu Makan Siang</td>
                            <td class="p-4 text-slate-400">
                                <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md bg-blue-500/10 text-blue-400 text-xs border border-blue-500/20">
                                    Voting
                                </span>
                            </td>
                            <td class="p-4">
                                <span class="inline-flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-slate-500"></span>
                                    <span class="text-slate-400">Closed</span>
                                </span>
                            </td>
                            <td class="p-4 text-right text-white">42</td>
                            <td class="p-4 text-right">
                                <a href="#" class="text-purple-400 hover:text-purple-300 font-medium text-xs">View Report &rarr;</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>