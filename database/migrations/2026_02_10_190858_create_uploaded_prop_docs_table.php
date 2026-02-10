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
        Schema::create('uploaded_prop_docs', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // FK
            $table->uuid('prop_document_id')->unique();

            // File meta
            $table->string('file_path', 255);
            $table->string('file_name', 150);
            $table->string('mime_type', 100);
            $table->unsignedBigInteger('file_size');

            // Audit
            $table->uuid('uploaded_by')->index();

            $table->timestamps();
            $table->softDeletes();

            // Constraints
            $table->foreign('prop_document_id')
                ->references('id')->on('prop_documents');

            $table->foreign('uploaded_by')
                ->references('employee_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uploaded_prop_docs');
    }
};
