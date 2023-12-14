<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadOrderTest extends TestCase
{
    use RefreshDatabase;
  
    public function test_read_orders_of_user(): void
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


        $order1 = Order::create([
            'user_id' => $user->id,
            'total' => 100,
            'num_products' => 3, 
            'address' => 'Dirección de envío',
        ]);

        $order2 = Order::create([
            'user_id' => $user->id,
            'total' => 100,
            'num_products' => 3, 
            'address' => 'Dirección de envío',
        ]);

        $response = $this->get("/api/orders/read/{$user->id}");

        $response->assertStatus(200)->assertJsonFragment(['id' => $order1->id],['id' => $order2]);
    }
}
