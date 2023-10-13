<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'productName' => $this->faker->sentence,
            'productCatId' => Category::factory(),
            'productDesc' => $this->faker->sentence,
            'productManu' => $this->faker->sentence,
            'productPartNo' => $this->faker->sentence,
            'productStatus' => $this->faker->sentence,
            'productPrice' => $this->faker->randomFloat(2, 0, 1000)
        ];
    }
}
