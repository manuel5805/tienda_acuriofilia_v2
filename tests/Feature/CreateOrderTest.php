<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateOrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_order()
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

        $product = Product::create([
            'name' => 'Producto de prueba',
            'brand' => 'Marca de prueba',
            'quantity' =>  5 ,
            'category' => 'Categoría de prueba',
            'description' => 'Descripción de prueba',
            'price' => 10.99,
            'product_image' => 'imagen_de_prueba.jpg',
        ]);
       
        $orderData = [
            'user_id' => $user->id,
            'total' => 100,
            'num_products' => 3, 
            'address' => 'Dirección de envío',
        ];

        $response = $this->postJson('/api/orders/store', $orderData);
        $response->assertStatus(201);
 
    }
}