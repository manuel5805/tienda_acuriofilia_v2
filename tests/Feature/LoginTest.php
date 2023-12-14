<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_with_valid_credentials()
    {
        $user = User::create( [
            'name' => 'John Doe', 
            'last_name' => 'clonky chat',
            'role' => 'rarete',
            'profile_image' => 'rarete_chat',
            'address' => 'challenger rarete',
            'email' => 'correo@ejemplo.com',
            'password' => 'contraseña',
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'correo@ejemplo.com',
            'password' => 'contraseña',
        ]);

        $response->assertStatus(200)
                 ->assertJson(['user_id' => $user->id]);
    }
}
