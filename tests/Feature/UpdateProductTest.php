<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateProductTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_update_product(): void
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

        $updateProductData = [
            'name' => 'patata',
            'price' => 3
        ];

        $response = $this->putJson("/api/products/update/{$product->id}", $updateProductData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'patata',
            'price' => 3,
        ]);
    }
}
