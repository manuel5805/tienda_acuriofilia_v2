<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ReadUserController extends Controller
{
    public function show(User $user){
        return response()->json($user, 200);
    }
}
