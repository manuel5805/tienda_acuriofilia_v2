<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use App\Http\Requests\CreateInquiryRequest;

class CreateInquiryController extends Controller
{
 
    public function store(CreateInquiryRequest $request)
    {
        $inquiry = new Inquiry();
        $inquiry->user_id = $request->input('user_id');
        $inquiry->title = $request->input('title');
        $inquiry->category = $request->input('category');
        $inquiry->description = $request->input('description');
        $inquiry->img_inquiry = $request->input('img_inquiry');
        $inquiry->state = $request->input('state');

        $inquiry->save();

        return response()->json($inquiry,201);

    }

}
