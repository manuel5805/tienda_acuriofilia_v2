<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ReadOrderController extends Controller
{
    public function showUserOrders($userId)
    {
        $user = User::findOrFail($userId);

        $orders = $user->ordersRelation()->get();

        return response()->json($orders, 200);
    }
}
