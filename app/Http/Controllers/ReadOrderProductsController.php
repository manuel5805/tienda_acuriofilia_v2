<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ReadOrderProductsController extends Controller
{
    public function showProductOrders($orderId)
    {
        $order = Order::findOrFail($orderId);

        $ordersProduct = $order->orderProductsRelation()->get();

        return response()->json($ordersProduct, 200);
    }
}
