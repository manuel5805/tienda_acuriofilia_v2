<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductReviewsController extends Controller
{

    public function showProductReviews($productId)
    {
        $product = Product::findOrFail($productId);

        $reviews = $product->reviewProductRelation()->get();

        return response()->json($reviews,200);

    }

}
