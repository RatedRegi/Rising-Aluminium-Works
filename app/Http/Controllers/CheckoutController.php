<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $userId = Auth::id();
    
        // Get cart items for the user
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();
    
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }
    
        // Calculate total price
        $totalPrice = $cartItems->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });
    
        // Create the order
        $order = Order::create([
            'user_id' => $userId,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);
    
        // Create order items
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price,
            ]);
        }
    
        // Clear the cart
        Cart::where('user_id', $userId)->delete();
    
        return redirect()->route('orders.show', $order->id)->with('success', 'Order placed successfully.');
    }
    
}
