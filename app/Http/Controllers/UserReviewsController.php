<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserReviewsController extends Controller
{
    public function showUserReviews($userId)
    {
        $user = User::findOrFail($userId);

        $reviews = $user->reviewUserRelation()->get();

        return response()->json($reviews, 200);
    }
}
