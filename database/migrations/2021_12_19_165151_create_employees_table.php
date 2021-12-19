<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('emp_id_no')->unique();
            $table->string('emp_id')->unique();
            $table->bigInteger('emp_location')->unsigned();
            $table->bigInteger('emp_designation')->unsigned();
            $table->string('emp_name')->unique();
            $table->string('emp_email')->nullable();
            $table->string('emp_mobile')->nullable();
            $table->string('emp_ac_holder_name')->nullable();
            $table->bigInteger('emp_relation')->unsigned();
            $table->string('emp_account_no')->nullable();
            $table->string('emp_bank_name')->nullable();
            $table->string('emp_bank_branch')->nullable();
            $table->string('emp_bank_ifsc')->nullable();
            $table->boolean('is_active')->default(true);
            $table->bigInteger('sal_type')->default(0);
            $table->dateTime('joined_on')->nullable();
            $table->dateTime('left_on')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
