<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->name,
        'desc'=>$this->faker->sentence(10),
        'qun'=>$this->faker->randomDigit(),
        'price'=>$this->faker->randomDigit(),
        'image'=>$this->faker->imageUrl(),
        'cat_id'=>1,
        'user_id'=>1
        ];
    }
}
