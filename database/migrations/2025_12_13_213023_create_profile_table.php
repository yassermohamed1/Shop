

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->unique()
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('first_name');
            $table->string('last_name');

            $table->string('address')->nullable();

            $table->string('gender')->nullable(); // أفضل من enum

            $table->date('birth_date')->nullable();

            $table->char('country', 2)->nullable(); // ISO code
            $table->char('locale', 2)->nullable();

            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
