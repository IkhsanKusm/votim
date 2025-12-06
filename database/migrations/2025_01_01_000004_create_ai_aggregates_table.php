<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ai_aggregates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->constrained('activities')->cascadeOnDelete();
            $table->date('batch_date');
            $table->jsonb('summary_data');
            $table->timestamps();

            $table->index(['activity_id', 'batch_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ai_aggregates');
    }
};
