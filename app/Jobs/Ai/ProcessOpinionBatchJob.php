<?php

namespace App\Jobs\Ai;

use App\Services\Ai\AggregatorService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\Middleware\WithoutOverlapping;

class ProcessOpinionBatchJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Tentukan jumlah percobaan maksimal.
     * Kita batasi 2x saja untuk hemat resource. Jika gagal 2x, anggap data "beracun" (Batch Poisoning).
     */
    public $tries = 2;

    /**
     * Timeout job (detik).
     * Set 120 detik karena koneksi ke Gemini API bisa lambat di jam sibuk.
     */
    public $timeout = 120;

    public function __construct(
        public int $activityId
    ) {}

    /**
     * Middleware: Mencegah race condition.
     * Jangan jalankan 2 job untuk Activity ID yang sama secara bersamaan.
     * Ini menjaga agar AggregatorService tidak mengambil data yang sama dua kali.
     */
    public function middleware(): array
    {
        return [(new WithoutOverlapping($this->activityId))->releaseAfter(60)];
    }

    /**
     * Execute the job.
     */
    public function handle(AggregatorService $aggregatorService): void
    {
        // Panggil logic "Otak" yang sudah kita buat di Phase 1
        // Service ini akan mengambil 50 data, kirim ke Gemini, dan update DB.
        $aggregatorService->processPendingBatch($this->activityId);
    }
}