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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_code')->min(1000000)->max(9999999);
            $table->foreignId('work_status_id')->constrained('work_statuses');
            $table->foreignId('location_id')->constrained('locations');
            $table->foreignId('designation_id')->constrained('designations');
            $table->string('employee_name', 100)->index();
            $table->string('fathers_name', 100)->index()->nullable();
            $table->text('address')->nullable();
            $table->string('pin', 6)->nullable();
            $table->string('email', 100)->index()->nullable();
            $table->string('mobile_no', 15)->nullable()->index();
            $table->string('alternate_no', 15)->nullable();
            $table->string('office_mobile_no', 15)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_join')->nullable()->index();
            $table->date('date_of_resignation')->nullable()->index();
            $table->string('local_guardian_name', 100)->nullable();
            $table->string('local_guardian_contact_no', 15)->nullable();
            $table->string('account_holder_name', 100)->nullable();
            $table->foreignId('relationship_id')->nullable()->constrained('relationships')->nullOnDelete();
            $table->string('account_number', 25)->nullable();
            $table->foreignId('ifsc_id')->nullable()->constrained('ifscs')->nullOnDelete();
            $table->string('aadhaar_no', 12)->nullable();
            $table->string('pan_no', 10)->nullable();
            $table->boolean('is_authorised')->default(false);
            $table->boolean('is_bank_changed')->default(false);
            $table->foreignId('created_by_id')->constrained('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
