<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateProductTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_create_product(): void
    {
        
        $productData = [
            'name' => 'Producto de prueba',
            'brand' => 'Marca de prueba',
            'quantity' =>  5 ,
            'category' => 'Categoría de prueba',
            'description' => 'Descripción de prueba',
            'price' => 10.99,
            'product_image' => 'imagen_de_prueba.jpg',
            // Completa con otros datos necesarios para la creación de un producto
        ];
    
        $response = $this->postJson('/api/products/store', $productData);
    
        $response->assertStatus(201);
    }
}
