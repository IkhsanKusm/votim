<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\DB;
use App\Models\Response;
use App\Jobs\Ai\ProcessOpinionBatchJob;

// 1. AI AGGREGATOR DISPATCHER (Every 5 Minutes)
// Tugas: Cari Activity yang punya respon "pending", lalu tugaskan Worker.
Schedule::call(function () {
    
    // Query Ringan: Ambil ID Activity yang memiliki setidaknya 1 respon pending.
    // Menggunakan DISTINCT agar kita tidak melempar 100 job untuk activity yang sama.
    $activitiesNeedingProcessing = Response::where('is_processed_by_ai', false)
        ->select('activity_id')
        ->distinct()
        ->pluck('activity_id');

    foreach ($activitiesNeedingProcessing as $activityId) {
        // Dispatch Job ke Queue 'low' (Jalur Ekonomi/Gratisan)
        // Free User & Batch Processing masuk sini agar tidak mengganggu proses krusial lain.
        ProcessOpinionBatchJob::dispatch($activityId)->onQueue('low');
    }

})->everyFiveMinutes()
  ->name('ai:dispatch-batches') // Nama unik untuk locking (prevent overlapping schedule)
  ->withoutOverlapping();       // Jangan jalankan schedule baru jika yang lama belum kelar


// 2. SURVIVAL MODE: AGGRESSIVE PRUNING (Daily)
// Sesuai Addendum: Hapus data > 7 hari & Failed Jobs > 24 jam
Schedule::call(function () {
    
    // A. Hapus Data Mentah > 7 Hari (Free Tier Optimization)
    // Menggunakan chunkById untuk menghapus ribuan data tanpa memory leak
    Response::where('created_at', '<', now()->subDays(7))
        ->chunkById(100, function ($responses) {
            foreach ($responses as $response) {
                $response->delete();
            }
        });

    // B. Hapus Failed Jobs > 24 Jam (Agar tabel failed_jobs tidak bengkak)
    DB::table('failed_jobs')
        ->where('failed_at', '<', now()->subHours(24))
        ->delete();

})->dailyAt('03:00') // Jalankan jam 3 pagi saat traffic sepi
  ->name('system:purge-data');

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();
