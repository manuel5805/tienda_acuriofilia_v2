<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_delete_product(): void
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

        $response = $this->deleteJson("/api/products/delete/{$product->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
