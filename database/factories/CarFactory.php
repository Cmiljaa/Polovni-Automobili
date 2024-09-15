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
            'brand' => fake()->randomElement(config('brands')),
            'model' => fake()->word(),
            'price' => fake()->numberBetween(5000, 100000),
            'mileage' => fake()->numberBetween(25000, 300000),
            'fuel' => fake()->randomElement(config('fuels')),
            'year' => fake()->year(),
            'body_type' => fake()->randomElement(config('body_types')),
            'transmission' => fake()->randomElement(['Automatic', 'Manual', 'Semi-automatic']),
            'power' => fake()->numberBetween(100, 350),
            'drive_system' => fake()->randomElement(['Front-Wheel', 'Rear-Wheel', 'All-Wheel', 'Four-Wheel']),
            'door_count' => fake()->numberBetween(2, 5),
            'number_of_seats' => fake()->numberBetween(2, 6),
            'cubic_capacity' => fake()->numberBetween(1000, 4000),
            'allowed' => true
        ];
    }
}