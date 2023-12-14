<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateCommentRequest;

class CreateCommentController extends Controller
{
    public function store(CreateCommentRequest $request){
        $comment = new Comment();
        $comment->user_id = $request->input('user_id');
        $comment->inquiry_id = $request->input('inquiry_id');
        $comment->description = $request->input('description');
        $comment->parent_comment_id = $request->input('parent_comment_id');
        $comment->img_comment = $request->input('img_comment ');
        $comment->save();

        DB::table('users_inquirys_comments')->insert([
            'user_id' => $request->input('user_id'),
            'inquiry_id' => $request->input('inquiry_id'),
            'comment_id' => $comment->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        

        return response()->json($comment,201);
    }
}
