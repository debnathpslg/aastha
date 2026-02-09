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
        Schema::create('roles', function (Blueprint $table) {
            // 1. UUID Primary
            $table->uuid('id')->primary();

            // 2. Basic
            $table->string('name')->unique()->index();   // Super User
            $table->string('slug')->unique()->index();   // su

            // 3. তোমার Level System
            $table->unsignedTinyInteger('level')->index();

            // 4. Bitmask Permission
            $table->unsignedSmallInteger('permission')->default(1)->index();

            // 5. System Role Protection
            $table->boolean('is_system')->default(false)->index();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
