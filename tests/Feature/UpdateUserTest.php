<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_update_user(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'last_name' => 'new lastname',
            'address' => 'new address',
            'profile_image' => 'new image',
            'role' =>  'admin',
            'password' => 'new password',
            'email' => 'john@example.com',
        ]);

        $updatedUserData = [
            'name' => 'Jane Doe',
            'email' => '',
            'address' => ' ',
        ];

        $response = $this->putJson("/api/users/update/{$user->id}", $updatedUserData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Jane Doe',
            'email' => 'john@example.com',
            'address' => 'new address',
        ]);
    }
}
