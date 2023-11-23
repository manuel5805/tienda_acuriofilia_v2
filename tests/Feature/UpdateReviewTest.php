<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateReviewTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_update_review(): void
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

        $review = Review::create([
            'comment' => 'Comentario de prueba',
            'assessment' => 5,
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);

        $updateReviewData = [
            'comment' => 'comentario prueba 2',
            'assessment' => 2
        ];

        $response = $this->putJson("/api/reviews/update/{$review->id}", $updateReviewData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('reviews', [
            'user_id' => $review->user_id,
            'product_id' => $review->product_id,
            'comment' => 'comentario prueba 2',
            'assessment' => 2,
        ]);
    }
}
 