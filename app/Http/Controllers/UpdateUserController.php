<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;

class UpdateUserController extends Controller
{
    
    public function update(UpdateUserRequest $request, User $user)
    {
        $userData = $request->validated();

        $user->update($userData);

        return response()->json($user, 200);
    }
}
