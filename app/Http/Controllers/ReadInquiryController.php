<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class ReadInquiryController extends Controller
{
    public function show(Inquiry $inquiry){
        return response()->json($inquiry,200);

    }
}
