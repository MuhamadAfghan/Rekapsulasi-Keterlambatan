<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rombel::class>
 */
class RombelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rombel' => $this->faker->randomElement(['X RPL 1', 'X RPL 2', 'X RPL 3', 'X RPL 4', 'X RPL 5', 'X RPL 6']),
        ];
    }
}