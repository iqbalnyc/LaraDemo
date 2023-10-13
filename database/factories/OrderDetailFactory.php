<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'orderDate' =>  now(),
            'orderId' => $this->faker->sentence,
            'userName' => $this->faker->sentence,
            'pId' => $this->faker->sentence,
            'pName' => $this->faker->sentence,
            'pCatId' => $this->faker->sentence,
            'pPrice' => $this->faker->randomFloat(2, 0, 1000),
            'pQty' => $this->faker->randomFloat(2, 0, 1000)
        ];
    }
}
