<?php

namespace App\Services\Ai;

use App\Models\Activity;
use App\Models\Response;
use App\Models\AiAggregate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class AggregatorService
{
    // Sesuai Bab 7.6.1: Batching Strategy
    const BATCH_SIZE = 50; 

    /**
     * Dipanggil oleh Job: ProcessOpinionBatchJob
     */
    public function processPendingBatch(int $activityId)
    {
        // 1. Ambil tumpukan data pending (Staging)
        $pendingResponses = Response::where('activity_id', $activityId)
            ->where('is_processed_by_ai', false)
            ->limit(self::BATCH_SIZE)
            ->get();

        if ($pendingResponses->isEmpty()) {
            return;
        }

        // 2. Susun Prompt JSON Raksasa (Sesuai Bab 8.3.2)
        $promptPayload = $this->constructBatchPrompt($pendingResponses);

        try {
            // 3. Kirim ke Gemini (Mocking Client Call)
            // Timeout Trap: Sesuai Addendum II Poin 2.3 (Maks 30 detik)
            $apiResponse = Http::timeout(30)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=' . config('services.gemini.key'), [
                    'contents' => [['parts' => [['text' => $promptPayload]]]]
                ]);

            if ($apiResponse->failed()) {
                throw new \Exception("Gemini API Error: " . $apiResponse->status());
            }

            // 4. Parse JSON Response (Anti-Halusinasi & Markdown Strip)
            $aiData = $this->parseGeminiResponse($apiResponse->json());

            // 5. Database Transaction (Atomic Update)
            DB::transaction(function () use ($pendingResponses, $aiData, $activityId) {
                // Tandai processed
                Response::whereIn('id', $pendingResponses->pluck('id'))
                    ->update(['is_processed_by_ai' => true]);

                // Update/Upsert Aggregates
                // Logic ini menggabungkan hasil baru dengan summary yang sudah ada (Incremental Update)
                $this->updateAggregates($activityId, $aiData);
            });

        } catch (\Exception $e) {
            Log::error("Aggregator Failed for Activity $activityId: " . $e->getMessage());
            // Retry logic akan ditangani oleh Queue Worker mechanism
            throw $e; 
        }
    }

    private function constructBatchPrompt($responses): string
    {
        // Format input array sesuai instruksi JSON Prompt (Bab 8.3)
        $items = $responses->map(function ($res) {
            // Asumsi value_data menyimpan {"text": "..."}
            $text = $res->value_data['text'] ?? ''; 
            return ['id' => $res->id, 'text' => substr($text, 0, 500)]; // Token limiting
        })->toArray();

        return json_encode([
            "task" => "analyze_opinion_batch",
            "input_context" => "List opini: " . json_encode($items),
            "instruction" => "Analisis setiap item. 1) Tentukan sentimen. 2) Ekstrak 1 keyword. 3) Ringkasan global.",
            "expected_output_schema" => [ /* ... Struktur JSON Bab 8.3 ... */ ]
        ]);
    }

    private function parseGeminiResponse(array $rawResponse): array
    {
        // Gemini sering membungkus response dengan ```json ... ```
        $textResponse = $rawResponse['candidates'][0]['content']['parts'][0]['text'] ?? '{}';
        
        $cleanJson = preg_replace('/^```json\s*|\s*```$/', '', $textResponse);
        
        $data = json_decode($cleanJson, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
             // Fallback Logic / Handling "Batch Poisoning" (Addendum 9.2)
            throw new \Exception("Invalid JSON from AI");
        }

        return $data;
    }

    private function updateAggregates($activityId, $aiData)
    {
        // Logic sederhana untuk menyimpan hasil ke tabel ai_aggregates
        // Dalam implementasi nyata, ini akan me-merge array keyword dan hitungan sentimen
        AiAggregate::updateOrCreate(
            [
                'activity_id' => $activityId, 
                'batch_date' => now()->toDateString()
            ],
            [
                'summary_data' => json_encode($aiData['global_summary'] ?? [])
            ]
        );
    }
}