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
            'brand' => $brand = fake()->randomElement(array_keys(config('brands'))),
            'model' => fake()->randomElement(config('brands')[$brand]),
            'price' => fake()->numberBetween(5000, 100000),
            'mileage' => fake()->numberBetween(25000, 300000),
            'fuel' => fake()->randomElement(config('car.fuels')),
            'year' => fake()->year(),
            'body_type' => fake()->randomElement(config('car.body_types')),
            'transmission' => fake()->randomElement(config('car.transmissions')),
            'power' => fake()->numberBetween(100, 350),
            'drive_system' => fake()->randomElement(config('car.drive_systems')),
            'door_count' => fake()->numberBetween(2, 5),
            'number_of_seats' => fake()->numberBetween(2, 6),
            'cubic_capacity' => fake()->numberBetween(1000, 4000),
            'allowed' => true
        ];
    }
}