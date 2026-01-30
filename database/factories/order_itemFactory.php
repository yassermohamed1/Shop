<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class order_itemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(4, true);
        return [
            "name" => $name,



            "subtotal" => $this->faker->randomFloat(2, 1, 999),
            "quantity" => $this->faker->numberBetween(1, 100),


            "product_id" => Product::inRandomOrder()->first()->id,
            "order_id" => Order::inRandomOrder()->first()->id,


        ];
    }
}
