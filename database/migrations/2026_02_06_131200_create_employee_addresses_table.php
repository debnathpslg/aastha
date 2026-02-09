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
        Schema::create('employee_addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // FK to joining
            $table->uuid('employee_joining_id')->index();

            // Address type
            $table->enum('address_type', ['PRESENT', 'PERMANENT'])->index();

            // Address fields
            $table->string('street', 150);
            $table->string('locality', 150)->nullable();
            $table->string('city', 100)->index();
            $table->string('district', 100)->nullable();
            $table->string('post_office', 100)->nullable();
            $table->string('state', 100)->index();
            $table->string('pin_code', 10)->index();

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
        Schema::dropIfExists('employee_addresses');
    }
};
