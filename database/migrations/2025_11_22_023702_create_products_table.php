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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID field
            $table->string('name'); // Product name
            $table->string('slug')->unique(); // Product slug for SEO friendly URLs
            $table->text('description')->nullable(); // Product description
            $table->decimal('price', 8, 2); // Product price, up to 8 digits with 2 decimal places
            $table->integer('compare_price');
            $table->unsignedBigInteger('category_id'); // Foreign key for category
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); // Define foreign key constraint
            $table->integer('quantity')->default(0); // Quantity of product in stock
            $table->string('image')->nullable(); // Product image filename
            $table->boolean('active')->default(true); // Whether the product is active (for display on the website)
            $table->timestamps(); // Timestamps for creation and updates


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
