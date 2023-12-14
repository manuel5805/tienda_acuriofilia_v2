<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ReadUserCommentsController extends Controller
{
    public function showUserComments($userId)
    {
        $user = User::findOrFail($userId);

        $comments = $user->commentsRelation()->get();

        return response()->json($comments,200);
    }
}
