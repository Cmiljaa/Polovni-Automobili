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
        $email = fake()->email();

        $response = $this->post('/user', [
            'name' => 'John Doe',
            'email' => $email,
            'phone' => '1234123',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        
        $response->assertRedirect('/cars');

        $this->assertDatabaseHas('users', ['email' => $email]);
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

    public function test_car_search_returns_no_results(): void
    {
        $response = $this->get('/cars/filter?brand=NonExistingCar');
        $response->assertStatus(200);
        $response->assertSee('No cars found');
    }

    public function test_car_listing(): void
    {
        $car = Car::factory()->create(['brand' => 'Audi', 'model' => 'A6']);
        $response = $this->get('/cars');
        $response->assertStatus(200);
        $response->assertSee('Audi A6');
    }

    //Car Creation Update And Deletion Tests
    public function test_car_creation_form_is_accessible_to_admin(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $response = $this->actingAs($admin)->get('/cars/create');
        $response->assertStatus(200);
    }

    public function test_car_can_be_created_by_admin(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $carData = [
            'brand' => 'Tesla',
            'model' => 'Model 3',
            'price' => 40000,
            'mileage' => 10000,
            'fuel' => 'Electric',
            'year' => 2022,
            'body_type' => 'Sedan',
            'power' => 300,
            'transmission' => 'Automatic',
            'drive_system' => 'All-Wheel',
            'cubic_capacity' => 1500,
            'number_of_seats' => 5,
            'door_count' => 4,
            'images' => [
                'image' => HttpUploadedFile::fake()->image('car1.jpg'),
            ],
        ];

        $response = $this->actingAs($admin)->post('/cars', $carData);
        $response->assertRedirect('/cars');
        $this->assertDatabaseHas('cars', ['brand' => 'Tesla', 'model' => 'Model 3']);
    }

    public function test_car_creation_form_requires_all_fields(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $response = $this->actingAs($admin)->post('/cars', [
            'brand' => '',
        ]);
        $response->assertSessionHasErrors(['brand', 'model', 'price']);
    }

    public function test_car_update_by_admin(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $car = Car::factory()->create(['brand' => 'Toyota', 'model' => 'Corolla']);

        $response = $this->actingAs($admin)->put('/cars/' . $car->id, [
            'brand' => 'Tesla',
            'model' => 'Test Model',
            'price' => 40000,
            'mileage' => 10000,
            'fuel' => 'Electric',
            'year' => 2022,
            'body_type' => 'Sedan',
            'power' => 300,
            'transmission' => 'Automatic',
            'drive_system' => 'All-Wheel',
            'cubic_capacity' => 1500,
            'number_of_seats' => 5,
            'door_count' => 4,
            'images' => [
                'image' => HttpUploadedFile::fake()->image('car1.jpg'),
            ],
        ]);

        $response->assertRedirect('/user/list');
        $this->assertDatabaseHas('cars', ['model' => 'Test Model']);
    }
    
    public function test_car_can_be_deleted(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $car = Car::factory()->create();
        
        $response = $this->actingAs($admin)->delete('/cars/' . $car->id);
        $response->assertRedirect();
        $this->assertDatabaseMissing('cars', ['id' => $car->id]);
    }

    public function test_admin_can_delete_any_car(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $car = Car::factory()->create(); 

        $response = $this->actingAs($admin)->delete('/cars/' . $car->id);
        
        $response->assertRedirect();
        $this->assertDatabaseMissing('cars', ['id' => $car->id]);
    }

    public function test_owner_can_delete_own_car(): void
    {
        $owner = User::factory()->create();
        $car = Car::factory()->create(['user_id' => $owner->id]);

        $response = $this->actingAs($owner)->delete('/cars/' . $car->id);
        
        $response->assertRedirect();
        $this->assertDatabaseMissing('cars', ['id' => $car->id]);
    }

    public function test_non_admin_non_owner_cannot_delete_car(): void
    {
        $user = User::factory()->create(['is_admin' => false]);
        $car = Car::factory()->create();

        $response = $this->actingAs($user)->delete('/cars/' . $car->id);
        
        $response->assertStatus(403);
    }

    //Error Handling Tests

    public function test_404_error_for_non_existing_car(): void
    {
        $response = $this->get('/cars/999999');
        $response->assertStatus(404);
    }
}