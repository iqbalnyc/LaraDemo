<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
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
            'review' => $this->faker->sentence,
            'name' => $this->faker->sentence,
            'email' => $this->faker->sentence
        ];
    }
}
