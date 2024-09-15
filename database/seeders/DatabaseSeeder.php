<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
use App\Models\CarImage;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->count(10)->create()->each(function ($user) {
            Car::factory(rand(5, 10))->create([
                'user_id' => $user->id
            ])->each(function ($car) {
                CarImage::factory(rand(2, 4))->create([
                    'car_id' => $car->id
                ]);
            });
        });

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone' => '1234567890',
            'password' => Hash::make('admin123'),
            'is_admin' => true
        ]);
    }
}