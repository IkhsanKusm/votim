<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('name');
            $table->enum('module', ['voting', 'opinion', 'forum']);
            $table->timestamps();

            $table->index(['user_id', 'module']);
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('folders');
    }
};
