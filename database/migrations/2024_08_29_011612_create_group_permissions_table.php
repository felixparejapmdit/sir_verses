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
        Schema::create('group_permissions', function (Blueprint $table) {
            $table->integer('group_id');
            $table->integer('permission_id');
            $table->integer('category_id');
            $table->integer('accessrights');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_permissions');
    }
};
