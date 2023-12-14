<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\CreateOrderRequest;

class CreateOrderController extends Controller
{
    public function store(CreateOrderRequest $request){
        $order = new Order();
        $order->user_id = $request->input('user_id');
        $order->total = $request->input('total');
        $order->num_products = $request->input('num_products');
        $order->address = $request->input('address');
        $order->save();

        return response()->json($order,201);
    }
}
