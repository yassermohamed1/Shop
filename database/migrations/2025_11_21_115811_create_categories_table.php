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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID field
            $table->string('name'); // Category name
            $table->text('description')->nullable(); // Category description
            $table->string('slug')->unique(); // Category slug for SEO friendly URLs
            $table->timestamps(); // Timestamps for creation and updates
            $table->string('image')->nullable(); // Product image filename
            $table->unsignedBigInteger('parent_id')->nullable(); // Parent category ID for sub-categories
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade'); // Define foreign key constraint

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
