<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Comment;
use App\Models\Inquiry;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadInquiryCommentsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_get_comments_of_inquiries(): void
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

          $user2 = User::create([
            'name' => 'John Doe', 
            'last_name' => 'clonky chat',
            'role' => 'rarete',
            'profile_image' => 'rarete_chat',
            'address' => 'challenger rarete',
            'email' => 'john@example2.com',
            'password' => 'password123'
        ]);

         $user3 = User::create([
            'name' => 'John Doe', 
            'last_name' => 'clonky chat',
            'role' => 'rarete',
            'profile_image' => 'rarete_chat',
            'address' => 'challenger rarete',
            'email' => 'john@example3.com',
            'password' => 'password123'
        ]);

        $inquiry = Inquiry::create([
            'user_id' => $user->id,
            'title' => 'prueba titulo 2',
            'category' => 'prueba categoria 2',
            'description' => 'prueba de descripcion 2',
            'img_inquiry' => 'inquiry2.jpg',
            'state' => 'cerrado'
        ]);

        $comment1 = Comment::create([
            'user_id' => $user2->id,
            'inquiry_id' => $inquiry->id,
            'description' => 'prueba descripcion',
            'img_comment' => 'comment.jpg'
        ]);

        $comment2 = Comment::create([
            'user_id' => $user3->id,
            'inquiry_id' => $inquiry->id,
            'description' => 'prueba descripcion 2',
            'img_comment' => 'comment2.jpg'
        ]);

        $response = $this->get("/api/comments/inquiry/{$inquiry->id}");

            $response->assertStatus(200)
        ->assertJsonFragment($comment1->toArray())
        ->assertJsonFragment($comment2->toArray());
    }

    
}
