<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->constrained('activities')->cascadeOnDelete();
            $table->jsonb('value_data');
            $table->boolean('is_processed_by_ai')->default(false);
            $table->timestamps();

            $table->index(['created_at', 'activity_id']);
            $table->index('is_processed_by_ai');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};
