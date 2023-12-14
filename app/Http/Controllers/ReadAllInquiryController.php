<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class ReadAllInquiryController extends Controller
{
    public function showAll()
    {
        $inquiries = Inquiry::with('userRelation:id,name,last_name,profile_image')->get();
        return response()->json($inquiries, 200);
    }
}
