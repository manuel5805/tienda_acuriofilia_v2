<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;

class CreateUserController extends Controller
{

    public function store(CreateUserRequest  $request)
    {

        $userData = $request->validated();
        $user = User::create($userData);

        return response()->json($user, 201);
    }



}
