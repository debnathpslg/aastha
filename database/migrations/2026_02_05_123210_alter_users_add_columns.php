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
        Schema::table('users', function (Blueprint $table) {
            $table->uuid('employee_id')
                ->nullable()
                ->unique()
                ->index()
                ->after('id')
                ->comment('Will link to employees.id in future');

            $table->uuid('created_by')->nullable()->after('employee_id')->default(null);
            $table->uuid('last_updated_by')->nullable()->after('created_by')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['employee_id', 'created_by', 'last_updated_by']);
        });
    }
};
