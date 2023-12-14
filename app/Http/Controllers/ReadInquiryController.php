<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class ReadInquiryController extends Controller
{
    public function show(Inquiry $inquiry){
        $inquiry->load('userRelation:id,name,last_name,profile_image');
        
        return response()->json($inquiry, 200);
    }
}
