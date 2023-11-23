<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\CreateReviewRequest;

class CreateReviewController extends Controller
{
      /**
     * Store a newly created review in storage.
     *
     * @param  \App\Http\Requests\CreateReviewRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateReviewRequest $request)
    {
       $review = new Review();
       $review->comment = $request->input('comment');
       $review->assessment = $request->input('assessment');
       $review->user_id = $request->input('user_id');
       $review->product_id = $request->input('product_id');

       $review->save();

       return response()->json($review, 201);
    }
}
