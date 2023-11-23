<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class DeleteInquiryController extends Controller
{
    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();

        return response()->json(['message' => 'Inquiry deleted succesfully'],200);
    }
}
