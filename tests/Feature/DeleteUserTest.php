<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_delete_user(): void
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

        $response = $this->deleteJson("/api/users/delete/{$user->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
