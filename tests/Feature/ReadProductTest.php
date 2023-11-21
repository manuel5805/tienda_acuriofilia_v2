<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadProductTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic feature test example.
     */
    public function test_read_product(): void
    {
        $product = Product::create([
            'name' => 'Batata',
            'category' => 'Food',
            'brand' => 'batat',
            'description' => 'batata food ',
            'quantity' =>  10,
            'price' => 9.99,
            'product_image' => 'batata.jpg',
        ]);

        $response = $this->getJson("/api/products/read/{$product->id}");

        $response->assertStatus(200)
            ->assertJson([
                'id' => $product->id,
            ]);
    }
}
