<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'make' => fake()->randomElement(['Audi', 'BMW', 'Mercedes-Benz']),
            'model' => fake()->word(),
            'price' => fake()->numberBetween(5000, 50000),
            'fuel' => fake()->randomElement(['diesel', 'petrol', 'electric']),
            'year' => fake()->year(),
            'body_type' => fake()->randomElement(['sedan', 'coupe', 'hatchback']),
            'allowed' => true,
            'image' => fake()->imageUrl()
        ];
    }
}
