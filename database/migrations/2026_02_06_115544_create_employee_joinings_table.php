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
        Schema::create('employee_joinings', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // Basic Identity
            $table->string('full_name', 150)->index();
            $table->string('mobile_no', 20)->index();
            $table->string('alternate_mobile_no', 20)->nullable();
            $table->string('email', 150)->nullable()->index();

            $table->date('dob');
            $table->enum('gender', ['Male', 'Female', 'Other'])->index();
            $table->string('nationality', 50)->default('Indian');
            $table->enum('marital_status', ['Single', 'Married', 'Divorced'])->index()->default('Single');

            // Guardian Info
            $table->string('father_name', 150);
            $table->string('local_guardian_name', 150);
            $table->string('local_guardian_mobile', 20);
            $table->uuid('local_guardian_relation_id');

            // Workflow
            $table->enum('joining_status', [
                'DRAFT',
                'SUBMITTED',
                'VERIFIED',
                'REJECTED',
            ])->default('DRAFT')->index();

            $table->text('remarks')->nullable()->comment('Hobbies etc.');

            $table->date('signed_date')->default(today())->index();
            $table->string('signed_place', 50)->default('Siliguri')->index();

            // Audit
            $table->uuid('created_by')->index();
            $table->uuid('updated_by')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

            // FK constraints
            $table->foreign('local_guardian_relation_id')
                ->references('id')->on('relations');

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
        Schema::dropIfExists('employee_joinings');
    }
};
