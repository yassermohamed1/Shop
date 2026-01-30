<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;





/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
// class ProductFactory extends Factory
// {
//     /**
//      * Define the model's default state.
//      *
//      * @return array<string, mixed>
//      */
//     public function definition(): array
//     {
//         $name = $this->faker->words(4, true);
//         return [
//             "name" => $name,
//             "slug" => Str::Slug($name),
//             "description" => $this->faker->sentence(14, true),
//             "image" => $this->faker->imageUrl(),
//             "price" => $this->faker->randomFloat(2, 1, 999),
//             'compare_price' => $this->faker->numberBetween(100, 400),


//             "quantity" => $this->faker->numberBetween(1, 100),

//             "category_id" => Category::inRandomOrder()->first()->id,

//             "active" => rand(0, 1),

//         ];
//     }
// }
