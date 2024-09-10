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
        Schema::create('pv_lesson_info', function (Blueprint $table) {
            $table->id(); // bigInt by default
            $table->foreignId('pv_info_id')->constrained(); // Assuming this references a table with matching data types
            $table->unsignedBigInteger('pv_lesson_id');
            $table->foreign('pv_lesson_id')->references('id')->on('pv_lessons')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('pv_lesson_info');
    }
};