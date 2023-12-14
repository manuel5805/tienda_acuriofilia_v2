<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderProductTest extends TestCase
{
   use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_add_products_to_order(): void
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

        $product1 = Product::create([
            'name' => 'Producto de prueba',
            'brand' => 'Marca de prueba',
            'quantity' =>  5 ,
            'category' => 'Categoría de prueba',
            'description' => 'Descripción de prueba',
            'price' => 11.99,
            'product_image' => 'imagen_de_prueba.jpg',
        ]);

        $product2 = Product::create([
            'name' => 'Producto de prueba 2',
            'brand' => 'Marca de prueba 2',
            'quantity' =>  3 ,
            'category' => 'Categoría de prueba 2',
            'description' => 'Descripción de prueba 2',
            'price' => 19.99,
            'product_image' => 'imagen_de_prueba2.jpg',
        ]);

        $producto1 = [
            'product_id' => $product1->id,
            'quantity' => 1
        ];

        $producto2 = [
            'product_id' => $product2->id,
            'quantity' => 2
        ];
       $products = [$producto1,$producto2];

       $productData = [$producto1,$producto2];
        
        $order = Order::create([
            'user_id' => $user->id,
            'total' => 100,
            'num_products' => 0, 
            'address' => 'Dirección de envío',
        ]);

        $response = $this->postJson("/api/orders/{$order->id}/products", [
            'products' => $productData,
        ]);


        $response->assertStatus(200);

    
        
    }
}
