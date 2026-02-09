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
        Schema::create('educational_qualifications', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // FK to joining
            $table->uuid('employee_joining_id')->index();

            // Education reference
            $table->uuid('education_standard_id')->index();
            $table->uuid('education_board_id')->index();

            // Academic info
            $table->unsignedSmallInteger('year_of_passing')->index();
            $table->string('remarks', 50)->nullable();

            // Audit
            $table->uuid('created_by')->index();
            $table->uuid('updated_by')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

            // Constraints
            $table->foreign('employee_joining_id')
                ->references('id')->on('employee_joinings');

            $table->foreign('education_standard_id')
                ->references('id')->on('education_standards');

            $table->foreign('education_board_id')
                ->references('id')->on('education_boards');

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
        Schema::dropIfExists('educational_qualigications');
    }
};
