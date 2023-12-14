<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Inquiry;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateCommenTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_create_comment(): void
    {
        $user = User::create( [
            'name' => 'John Doe', 
            'last_name' => 'clonky chat',
            'role' => 'rarete',
            'profile_image' => 'rarete_chat',
            'address' => 'challenger rarete',
            'email' => 'john@example.com',
            'password' => 'password123',
        ]);

        $inquiry = Inquiry::create([
            'user_id' => $user->id,
            'title' => 'prueba titulo',
            'category' => 'prueba categoria',
            'description' => 'prueba de descripcion',
            'img_inquiry' => 'inquiry.jpg',
            'state' => 'abierto'
        ]);


        $commentData = [
            'user_id' => $user->id,
            'inquiry_id' => $inquiry->id,
            'description' => 'prueba descripcion',
            'img_comment' => 'comment.jpg'
        ];

        $response = $this->postJson('/api/comments/store', $commentData);
        $response->assertStatus(201);
    }
}
