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
        Schema::create('verse_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
            $table->foreignId('pv_verses_info_id')->constrained('pv_verses_info')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verse_tags');
    }
};
