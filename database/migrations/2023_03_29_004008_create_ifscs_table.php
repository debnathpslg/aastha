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
            $table->string('ifsc', 11)->unique();
            $table->string('bank_name')->index();
            $table->string('bank_short_name', 4)->index();
            $table->string('branch_name', 100)->index();
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
