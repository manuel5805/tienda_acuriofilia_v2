<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    public function addProductsToOrder(Request $request, $orderId){
        $order = Order::find($orderId);

        $products = $request->input('products');

        $total = 0;
        $numProducts = 0;

        foreach ($products as $product) {
            $productId = $product['product_id'];
            $quantity = $product['quantity'];

            $order->orderProductsRelation()->attach($productId, ['quantity' => $quantity]);
            
            $product = Product::find($productId);

            if ($product->quantity < $quantity) {
                return response()->json('Not enough stock available for ' . $product->name, 400);
            }
    
            // Restar la cantidad del producto del inventario
            $product->quantity -= $quantity;
            $product->save();
            
            $total += $product->price * $quantity;
            $numProducts += $quantity;
        }

        $order->update(['total' => $total, 'num_products' => $numProducts]);

        return response()->json('Products added to order successfully', 200);
    }
}
