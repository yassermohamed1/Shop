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
        Schema::create('order_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id'); // Foreign key for order
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade'); // Define foreign key constraint
            $table->string('first_name'); // Customer's name (if user is not logged in)
            $table->string('last_name');
            $table->enum('type', ['billing', 'shipping']);
            $table->string('email'); // Customer's email address (if user is not logged in)
            $table->string('phone_number')->nullable(); // Customer's phone number

            $table->string('street_address')->nullable(); // Customer's address
            $table->string('city')->nullable(); // Customer's city
            $table->string('state')->nullable(); // Customer's state
            $table->string('postal_code')->nullable(); // Customer's zipcode
            $table->string('country')->nullable(); // Customer's country

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_addresses');
    }
};
