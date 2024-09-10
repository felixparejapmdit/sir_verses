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
        Schema::create('pv_verses_info', function (Blueprint $table) {
            $table->id();
            
            // Ensure the referenced table name is correct
            $table->foreignId('pv_lesson_id')->constrained('pv_lessons')->onDelete('cascade');
            
            $table->string('verse', 500);
            
            // Ensure the referenced table name is correct
            $table->foreignId('translation_id')->constrained('translations')->onDelete('cascade');
            
            $table->string('revision_number', 50);
            
            // Consider using 'text' if content might exceed 255 characters
            $table->string('verse_content', 255);
            $table->string('verse_explanation', 500);
            
            $table->integer('updated_by');
            $table->integer('index');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pv_verses_info');
    }
};
