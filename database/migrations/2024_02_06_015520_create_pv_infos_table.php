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
        Schema::create('pv_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pv_event_id')->constrained();
            $table->foreignId('pv_event_type_id')->constrained();
            $table->integer('created_by');
            $table->date('event_date');
            $table->time('event_time');
            $table->string('event_location', 100);
            $table->string('district_id', 100);
            $table->string('local_id', 100);
            $table->tinyInteger('is_locked');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pv_infos');
    }
};
