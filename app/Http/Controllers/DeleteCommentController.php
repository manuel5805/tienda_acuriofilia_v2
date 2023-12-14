<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class DeleteCommentController extends Controller
{
    public function destroy(Comment $comment){
        $comment->delete();

        return response()->json(['message' => 'Comment deleted succesfully',200]);
    }
}
