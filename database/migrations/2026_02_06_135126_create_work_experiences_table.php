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
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // FK to joining
            $table->uuid('employee_joining_id')->index();

            // Experience details
            $table->string('company_name', 150)->index();
            $table->string('job_title', 150)->index();
            $table->date('work_start_date');
            $table->date('work_end_date')->nullable();
            $table->string('manager_feedback', 150)->nullable();

            // Audit
            $table->uuid('created_by')->index();
            $table->uuid('updated_by')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

            // Constraints
            $table->foreign('employee_joining_id')
                ->references('id')->on('employee_joinings');

            $table->foreign('created_by')
                ->references('employee_id')->on('users');

            $table->foreign('updated_by')
                ->references('employee_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
};
