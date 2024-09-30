<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
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
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('/cars');
    }
}