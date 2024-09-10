<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pv_verse_combinations', function (Blueprint $table) {
            $table->id(); // This creates an unsignedBigInteger by default
            $table->foreignId('pv_lesson_id')->constrained('pv_lessons')->onDelete('cascade');
            $table->foreignId('pv_verse_info_id')->constrained('pv_verses_info')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pv_verse_combinations');
    }
};
