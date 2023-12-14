<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ReadProductController extends Controller
{
    public function show(Product $product){
        return response()->json($product,200);

    }
}
