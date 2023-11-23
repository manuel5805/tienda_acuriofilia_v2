<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Inquiry;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserInquirysTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_get_inquiries_of_user(): void
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

        $inquiryData1 = Inquiry::create([
            'user_id' => $user->id,
            'title' => 'prueba titulo',
            'category' => 'prueba categoria',
            'description' => 'prueba de descripcion',
            'img_inquiry' => 'inquiry.jpg',
            'state' => 'abierto'
        ]);
        
        $inquiryData2 = Inquiry::create([
            'user_id' => $user->id,
            'title' => 'prueba titulo 2',
            'category' => 'prueba categoria 2',
            'description' => 'prueba de descripcion 2',
            'img_inquiry' => 'inquiry2.jpg',
            'state' => 'cerrado'
        ]);
        
        $response = $this->get("/api/inquiries/user/{$user->id}");

        $response->assertStatus(200)
        ->assertJsonFragment($inquiryData1->toArray())
        ->assertJsonFragment($inquiryData2->toArray());
    }
}
