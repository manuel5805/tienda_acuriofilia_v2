<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class ReadInquiryCommentsController extends Controller
{
    public function showInquiryComments($inquiryId){
        $inquiry = Inquiry::findOrFail($inquiryId);

        $comments = $inquiry->commentRelation()->get();

        return response()->json($comments,200);
    }
}
