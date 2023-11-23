<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserInquirysController extends Controller
{
    public function showUserInquirys($userId){
        $user = User::findOrFail($userId);

        $reviews = $user->inquirysRelation()->get();

        return response()->json($reviews,200);
    }
}
