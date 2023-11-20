<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_read_user(): void
    {
        $user = User::create([
            'name' => 'John Doe', 
            'last_name' => 'clonky chat',
            'role' => 'rarete',
            'profile_image' => 'rarete_chat',
            'address' => 'challenger rarete',
            'email' => 'john@example.com',
            'password' => 'password123'
        ]);

        $response = $this->getJson("/api/users/read/{$user->id}");

        $response->assertStatus(200)
            ->assertJson([
                'id' => $user->id,
                // ... otros campos que esperas encontrar en la respuesta
            ]);
    }
}
