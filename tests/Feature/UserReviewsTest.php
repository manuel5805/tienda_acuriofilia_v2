<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserReviewsTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_reviews_of_user()
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


        $product = Product::create([
            'name' => 'Producto de prueba',
            'brand' => 'Marca de prueba',
            'quantity' =>  5 ,
            'category' => 'Categoría de prueba',
            'description' => 'Descripción de prueba',
            'price' => 10.99,
            'product_image' => 'imagen_de_prueba.jpg',
        ]);
    
        $review = Review::create([
            'comment' => 'Comentario de prueba',
            'assessment' => 5,
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);

        $response = $this->get("/api/reviews/user/{$user->id}");

        $response->assertStatus(200)->assertJsonFragment(['id' => $review->id]);

    }
}
