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
        Schema::create('order_item', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID field
            $table->unsignedBigInteger('order_id'); // Foreign key for order
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade'); // Define foreign key constraint
            $table->unsignedBigInteger('product_id'); // Foreign key for product
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); // Define foreign key constraint
            $table->string('name'); // Product name
            $table->unsignedInteger('quantity');
            $table->float('price')->default(1);
            $table->json('options')->nullable();
            $table->decimal('subtotal', 8, 2); // Product subtotal, up to 8 digits with 2 decimal places
            $table->unique(['order_id', 'product_id']);
            $table->timestamps(); // Timestamps for creation and updates    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_item');
    }
};
