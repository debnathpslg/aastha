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
            //
            Schema::table('users', function (Blueprint $table) {

                // Role relation
                $table->uuid('role_id')->nullable()->after('id');

                // SU protection
                $table->boolean('is_su')->default(false)->after('password');

                // Active status
                $table->boolean('is_active')->default(true)->after('is_su');
                $table->softDeletes();

                // Foreign key
                $table->foreign('role_id')
                    ->references('id')
                    ->on('roles');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropForeign(['role_id']);

            $table->dropColumn([
                'role_id',
                'is_su',
                'is_active'
            ]);
        });
    }
};
