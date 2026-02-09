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
        Schema::create('support_doc_types', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name')->unique()->index();
            $table->string('remarks')->nullable()->index()->default(null);

            // Audit
            $table->uuid('created_by')->index();
            $table->uuid('updated_by')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('support_doc_types');
    }
};
