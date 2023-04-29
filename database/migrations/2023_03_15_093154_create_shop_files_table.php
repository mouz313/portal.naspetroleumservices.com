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
        Schema::create('shop_files', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_id');
            $table->string('required_document')->nullable();
            $table->string('required_document_name')->nullable();
            $table->string('test_reports')->nullable();
            $table->string('test_reports_name')->nullable();
            $table->string('nov')->nullable();
            $table->string('nov_name')->nullable();
            $table->text('note')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_files');
    }
};
