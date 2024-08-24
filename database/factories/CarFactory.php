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
            'brand' => fake()->randomElement([
                'Audi', 'BMW', 'Mercedes-Benz', 'Toyota', 'Honda', 'Ford', 'Chevrolet', 'Nissan', 'Volkswagen', 'Hyundai',
                'Kia', 'Subaru', 'Mazda', 'Porsche', 'Jaguar', 'Land Rover', 'Lexus', 'Volvo', 'Buick', 'Chrysler'
            ]
            ),
            'model' => fake()->word(),
            'price' => fake()->numberBetween(5000, 100000),
            'mileage' => fake()->numberBetween(25000, 300000),
            'fuel' => fake()->randomElement(['Diesel', 'Petrol', 'Electric', 'Hybrid']),
            'year' => fake()->year(),
            'body_type' => fake()->randomElement(['Crossover', 'Convertible', 'Coupe', 'Hatchback', 'Sedan', 'Sports_car', 'Suv', 'Truck', 'Van', 'Wagon']),
            'allowed' => true
        ];
    }
}