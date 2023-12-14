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

         
          if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $userData['profile_image'] = 'images/' . $imageName;
        }
    
  
          $user = User::create($userData);
  
          return response()->json($user, 201);
    }



}
