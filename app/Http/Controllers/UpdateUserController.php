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
        $existingUserData = $user->toArray();
    
        
        $validFields = array_filter($userData, function ($value) {
            return $value !== null;
        });
    
        foreach ($validFields as $key => $value) {
            if ($value !== $existingUserData[$key]) {
                $user->{$key} = $value;
            }
        }
        $user->save();
    
        return response()->json($user, 200);
    }
}
