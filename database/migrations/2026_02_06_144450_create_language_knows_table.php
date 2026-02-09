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
        Schema::create('language_knows', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // FK
            $table->uuid('employee_joining_id')->index();
            $table->uuid('language_id')->index();

            $table->boolean('can_understand')->index()->default(true);
            $table->boolean('can_speak')->index()->default(true);
            $table->boolean('can_read')->index()->default(true);
            $table->boolean('can_write')->index()->default(false);

            // Audit
            $table->uuid('created_by')->index();
            $table->uuid('updated_by')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

            // Constraints
            $table->foreign('employee_joining_id')
                ->references('id')->on('employee_joinings');

            $table->foreign('language_id')
                ->references('id')->on('languages');

            $table->foreign('created_by')
                ->references('employee_id')->on('users');

            $table->foreign('updated_by')
                ->references('employee_id')->on('users');

            // Prevent duplicate language for same candidate
            $table->unique(
                ['employee_joining_id', 'language_id'],
                'uniq_employee_language'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_knows');
    }
};
