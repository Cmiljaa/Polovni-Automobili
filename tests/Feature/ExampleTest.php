<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    //Basic Application Tests

    public function test_the_application_redirects_to_cars(): void
    {
        $response = $this->get('/');
        $response->assertRedirect('/cars');
    }

    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_privacy_policy_page_is_accessible(): void
    {
        $response = $this->get('/privacy_policy');
        $response->assertStatus(200);
        $response->assertSee('Privacy Policy');
    }

    public function test_terms_and_conditions_page_is_accessible(): void
    {
        $response = $this->get('/terms_conditions');
        $response->assertStatus(200);
        $response->assertSee('Privacy Policy');
    }

    //Authentication Tests

    public function test_user_can_login(): void
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect('/cars');
    }

    public function test_user_can_register(): void
    {
        $response = $this->post('/user', [
            'name' => 'John Doe',
            'email' => fake()->email(),
            'phone' => '1234123',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect('/cars');
        $this->assertDatabaseHas('users', ['email' => 'johndoe@example.com']);
    }

    public function test_user_can_logout(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user)->post('/logout');
        $this->assertGuest();
    }

    public function test_unauthenticated_user_cannot_access_car_creation_page(): void
    {
        $response = $this->get('/cars/create');
        $response->assertRedirect('/login');
    }

    public function test_user_cannot_access_admin_dashboard(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/admin');
        $response->assertRedirect('/login');
    }

    //Admin Dashboard Tests

    public function test_unauthorized_users_cannot_access_admin(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/login');
    }

    public function test_admin_user_can_access_admin_dashboard(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $response = $this->actingAs($admin)->get('/admin');
        $response->assertStatus(200);
    }
    
    //Car Listing and Filtering Tests
    
    public function test_car_filtering(): void
    {
        $car1 = Car::factory()->create(['brand' => 'Audi', 'model' => 'A6']);
        $car2 = Car::factory()->create(['brand' => 'BMW', 'model' => 'M3']);

        $response = $this->get('/cars/filter?brand=BMW');
        $response->assertStatus(200);
        $response->assertSee('BMW M3');
        $response->assertDontSee('Audi A6');
    }

    public function test_car_listing(): void
    {
        $car = Car::factory()->create(['brand' => 'Audi', 'model' => 'A6']);
        $response = $this->get('/cars');
        $response->assertStatus(200);
        $response->assertSee('Audi A6');
    }

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('/cars');
    }
}