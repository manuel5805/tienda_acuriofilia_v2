<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateReviewRequest;

class UpdateReviewController extends Controller
{
    public function update(UpdateReviewRequest $request, Review $review){
        
        $reviewData = $request->validated();
        
        $review->update($reviewData);

        return response()->json($review,200);

    }
}
