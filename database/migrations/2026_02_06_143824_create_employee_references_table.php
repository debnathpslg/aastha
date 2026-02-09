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
        Schema::create('employee_references', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // FK
            $table->uuid('employee_joining_id')->index();
            $table->uuid('relation_id')->index();

            // Reference details
            $table->string('reference_name', 150)->index();
            $table->string('contact_no', 20)->index();
            $table->string('address', 255);

            // Audit
            $table->uuid('created_by')->index();
            $table->uuid('updated_by')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

            // Constraints
            $table->foreign('employee_joining_id')
                ->references('id')->on('employee_joinings');

            $table->foreign('relation_id')
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
        Schema::dropIfExists('employee_references');
    }
};
