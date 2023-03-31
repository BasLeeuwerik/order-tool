<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $this->seed();

        $response = $this->post('/register', [
            'first_name' => 'Test',
            'last_name' => 'User',
            'locale' => 'nl_NL',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'company_name' => 'test',
            'phone_number' => 'test',
            'website' => 'test',
            'vat_number' => 'test',
            'coc_number' => 'test',
            'address_line_1' => 'test',
            'zip_code' => 'test',
            'city' => 'test',
            'region' => 'test',
            'country' => 'test',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
