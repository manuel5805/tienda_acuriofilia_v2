<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DeleteProductController extends Controller
{
    
    public function destroy(Product $product) {
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'],200);
    }

}
