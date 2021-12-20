<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->default('Dummy');
            $table->string('user_email')->unique();
            $table->string('user_mobile')->unique();
            $table->string('password');
            $table->bigInteger('user_role')->unsigned()->default(0);
            $table->boolean('is_active')->default(false);
            $table->bigInteger('location_id')->unsigned()->default(2);
            $table->dateTime('last_login')->nullable();
            $table->boolean('is_logged_in')->default(false);
            $table->string('emp_id')->unique();
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
        Schema::dropIfExists('users');
    }
}
