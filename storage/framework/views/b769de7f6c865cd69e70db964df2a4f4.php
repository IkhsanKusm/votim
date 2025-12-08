

<?php $__env->startSection('title', 'Insight Studio'); ?>

<?php $__env->startSection('content'); ?>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Stats Card 1 -->
        <div class="p-6 rounded-2xl glass-panel relative overflow-hidden group hover:-translate-y-1 transition duration-300">
             <div class="flex items-start justify-between mb-4">
                 <div>
                    <h3 class="text-gray-400 text-sm font-medium mb-1">Total Responden</h3>
                    <p class="text-3xl font-bold text-white tracking-tight">1,240</p>
                 </div>
                 <div class="p-2 rounded-lg bg-purple-500/10 text-purple-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                 </div>
             </div>
             <div class="flex items-center gap-2 text-xs">
                <span class="text-emerald-400 bg-emerald-500/10 px-1.5 py-0.5 rounded flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    +12%
                </span>
                <span class="text-gray-500">vs bulan lalu</span>
             </div>
             <!-- Decor Blob -->
             <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-purple-500/20 rounded-full blur-3xl group-hover:bg-purple-500/30 transition-all"></div>
        </div>

        <!-- Stats Card 2 -->
        <div class="p-6 rounded-2xl glass-panel relative overflow-hidden group hover:-translate-y-1 transition duration-300">
             <div class="flex items-start justify-between mb-4">
                 <div>
                    <h3 class="text-gray-400 text-sm font-medium mb-1">AI Insights Generated</h3>
                    <p class="text-3xl font-bold text-white tracking-tight">85</p>
                 </div>
                 <div class="p-2 rounded-lg bg-blue-500/10 text-blue-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                 </div>
             </div>
             <div class="flex items-center gap-2 text-xs">
                <span class="text-white bg-white/10 px-1.5 py-0.5 rounded">All time</span>
             </div>
             <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-blue-500/20 rounded-full blur-3xl group-hover:bg-blue-500/30 transition-all"></div>
        </div>
        
        <!-- Action Card -->
        <div class="p-6 rounded-2xl border border-dashed border-white/10 hover:border-white/20 hover:bg-white/5 transition flex flex-col items-center justify-center text-center group cursor-pointer">
            <div class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center mb-3 group-hover:scale-110 transition">
                <svg class="w-6 h-6 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            </div>
            <h3 class="text-white font-medium">Buat Koleksi Baru</h3>
            <p class="text-xs text-gray-500 mt-1">Voting, Opini, atau Forum</p>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ASUS\Documents\Repository\votim\resources\views/dashboard.blade.php ENDPATH**/ ?>