<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;

class CreateProductController extends Controller
{
    // Otros métodos del controlador...

    public function store(CreateProductRequest $request)
    {
        // Si la solicitud llega aquí, significa que la validación ha pasado

        $product = new Product();
        $product->name = $request->input('name');
        $product->brand = $request->input('brand');
        $product->quantity = $request->input('quantity');
        $product->category = $request->input('category');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->product_image = $request->input('product_image');


        $product->save();

        return response()->json($product, 201);
    }
}
