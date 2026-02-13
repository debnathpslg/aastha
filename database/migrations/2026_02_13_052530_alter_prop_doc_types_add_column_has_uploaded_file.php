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
        Schema::table(
            'prop_doc_types',
            function (Blueprint $table) {
                $table->boolean('has_uploaded_file')
                    ->index()
                    ->after('is_system')
                    ->default(false);
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prop_doc_types', function (Blueprint $table) {
            $table->dropColumn(['has_uploaded_file']);
        });
    }
};
