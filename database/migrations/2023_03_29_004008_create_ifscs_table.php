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
        Schema::create('ifscs', function (Blueprint $table) {
            $table->id();
            $table->string('bank')->index();
            $table->string('ifsc', 11)->unique();
            $table->string('branch', 100)->index();
            $table->text('address')->nullable();
            $table->string('city1', 50)->index()->nullable();
            $table->string('city2', 50)->index()->nullable();
            $table->string('state', 50)->index()->nullable();
            $table->string('std_code', 10)->index()->nullable();
            $table->string('phone', 10)->index()->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ifscs');
    }
};
