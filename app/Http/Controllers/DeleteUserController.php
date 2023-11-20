<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DeleteUserController extends Controller
{
    
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
