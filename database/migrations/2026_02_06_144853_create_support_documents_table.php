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
        Schema::create('support_documents', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // FK
            $table->uuid('employee_joining_id')->index();
            $table->uuid('support_doc_type_id')->index();

            // Document meta
            $table->boolean('is_mandatory')->default(false)->index();
            $table->string('remarks', 255)->nullable();

            // Audit
            $table->uuid('created_by')->index();
            $table->uuid('updated_by')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

            // Constraints
            $table->foreign('employee_joining_id')
                ->references('id')->on('employee_joinings');

            $table->foreign('support_doc_type_id')
                ->references('id')->on('support_doc_types');

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
        Schema::dropIfExists('support_documents');
    }
};
