<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProductRequest;

class UpdateProductController extends Controller
{
 
    public function update(UpdateProductRequest $request, Product $product) {

        $productData = $request->validated();
        
        $product->update($productData);

        return response()->json($product, 200);
    }
    
}
