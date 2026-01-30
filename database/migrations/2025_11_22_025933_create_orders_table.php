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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID field
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete(); // Foreign key for user (if user is logged in)

            $table->string('number')->unique();





            $table->string('payment_method'); // Payment method used for the order
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending'); // Payment status for the order


            $table->enum('status', ['pending', 'processing', 'delivering', 'completed', 'cancelled', 'refunded'])->default('pending'); // Order status
            $table->string('notes')->nullable();
            // Additional notes for the order
            $table->json('options')->nullable();

            $table->timestamps(); // Timestamps for creation and updates


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
