<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rayon>
 */
class RayonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'rayon' => $this->faker->randomElement(['Ciawi 5', 'Ciawi 6', 'Ciawi 2']),
            // 'user_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}