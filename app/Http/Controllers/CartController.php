<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\adminDashboardController;

class CartController extends Controller
{
    
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())->with('items')->where('status', 'active')->first();
        $total = 0;
    
        if ($cart) {
            foreach ($cart->items as $item) {
                $total += ($item->quantity * $item->price);
            }
        }
    
        return view('cart.index', compact('cart', 'total'));
    }
    

    public function addToCart(Request $request)
    {
        $cart = Cart::firstOrCreate(
            ['user_id' => Auth::id(), 'status' => 'active']
        );

        $product = Product::findOrFail($request->id);
        $cartItem = CartItem::updateOrCreate(
            ['cart_id' => $cart->id, 'product_id' => $request->id],
            ['quantity' => DB::raw('quantity + 1'), 'price' => $product->price]
        );

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function checkout()
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->where('status', 'active')->first();
            if (!$cart) return redirect()->route('cart.index')->with('error', 'No active cart');
    
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => $cart->items->sum(fn($item) => $item->quantity * $item->price),
                'status' => 'pending'
            ]);
    
            foreach ($cart->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price
                ]);
            }
    
            $cart->delete();
            return redirect()->route('orders.show', $order->id);
        }else{
            return redirect()->route('login');
        }
       
    }

    // Update the cart
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);
        $cartItem = CartItem::findOrFail($id);
        $cartItem->quantity = $validatedData['quantity'];
        $cartItem->save();

        return redirect()->back()->with('success', 'Cart updated!');
    }

    // Remove an item from the cart
    public function remove($id)
    {
        $cartItem = CartItem::findOrFail($id);
            $cartItem->delete();
        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    // Clear the entire cart
    public function clear()
    {
        $userId = Auth::id();
        $cart = Cart::where('user_id', $userId)->first();
        if ($cart) {
            $cart->delete();  
            
            return redirect()->route('products')->with('success', 'Cart cleared!');
        }
        return redirect()->back()->with('error', 'Cart not found');
    }
}

