// 2024_01_01_000001_create_votim_schema.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. USERS (Modified for Auth & Plan)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('display_name'); // Wajib untuk privasi (Bab 8.2.1)
            $table->string('email')->unique();
            $table->string('password');
            $table->string('google_id')->nullable();
            $table->enum('plan_type', ['free', 'pro'])->default('free');
            $table->timestamp('subscription_ends_at')->nullable();
            $table->timestamps();
        });

        // 2. FOLDERS (Wadah Utama)
        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->enum('module', ['voting', 'opinion', 'forum']); 
            $table->timestamps();
            
            // Index untuk mempercepat query dashboard user
            $table->index(['user_id', 'module']);
        });

        // 3. ACTIVITIES (Subbab Fitur)
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('folder_id')->constrained()->cascadeOnDelete();
            $table->string('type'); // single_choice, open_opinion, town_hall, etc.
            $table->string('title');
            $table->string('slug')->unique(); // Index otomatis karena unique
            $table->enum('status', ['active', 'closed'])->default('active');
            $table->timestamp('closed_at')->nullable();
            
            // JSONB untuk konfigurasi fleksibel (Regex, Limits, Options)
            $table->jsonb('settings')->default('{}'); 
            
            $table->timestamps();
        });

        // 4. RESPONSES (Data Mentah - Transactional)
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->constrained()->cascadeOnDelete();
            
            // JSONB menyimpan semua variasi jawaban: {"rating": 5} atau {"text": "..."}
            $table->jsonb('value_data'); 
            
            // Flag untuk Aggregator Engine
            $table->boolean('is_processed_by_ai')->default(false);
            
            $table->timestamps();

            // VITAL: Index untuk Auto-Purge Cron Job (Delete data > 7 hari)
            // Composite index membantu filter per activity juga.
            $table->index(['created_at', 'activity_id']);
            $table->index('is_processed_by_ai'); // Agar Worker cepat ambil data pending
        });

        // 5. AI AGGREGATES (Cache Hasil Analisis)
        Schema::create('ai_aggregates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->constrained()->cascadeOnDelete();
            $table->date('batch_date'); // Pengelompokan harian
            
            // Hasil olahan AI: Sentiment count, Keywords list, Summary text
            $table->jsonb('summary_data'); 
            
            $table->timestamps();
            
            // Cache hit optimization
            $table->index(['activity_id', 'batch_date']);
        });

        // 6. REPORT SNAPSHOTS (Metadata Laporan - BUKAN File PDF)
        // Sesuai Addendum: File PDF di-stream, tapi kita butuh cache hasil hitungan json
        Schema::create('report_snapshots', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            
            // Menyimpan state data saat laporan dibuat (bukan file fisik)
            $table->jsonb('snapshot_data'); 
            
            $table->timestamp('expires_at');
            $table->timestamps();

            // Index untuk Auto-Purge file temp metadata
            $table->index('expires_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('report_snapshots');
        Schema::dropIfExists('ai_aggregates');
        Schema::dropIfExists('responses');
        Schema::dropIfExists('activities');
        Schema::dropIfExists('folders');
        Schema::dropIfExists('users');
    }
};