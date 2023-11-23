<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateReviewTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_create_review(): void
    {

        $product = Product::create([
            'name' => 'Producto de prueba',
            'brand' => 'Marca de prueba',
            'quantity' =>  5 ,
            'category' => 'Categoría de prueba',
            'description' => 'Descripción de prueba',
            'price' => 10.99,
            'product_image' => 'imagen_de_prueba.jpg',
        ]);

        $user = User::create( [
            'name' => 'John Doe', 
            'last_name' => 'clonky chat',
            'role' => 'rarete',
            'profile_image' => 'rarete_chat',
            'address' => 'challenger rarete',
            'email' => 'john@example.com',
            'password' => 'password123',
        ]);

        $reviewData = [
            'comment' => 'Comentario de prueba',
            'assessment' => 5,
            'user_id' => $user->id,
            'product_id' => $product->id,
    
        ];
    
        $response = $this->postJson('/api/reviews/store', $reviewData);
    
        $response->assertStatus(201);
        
    }
}
