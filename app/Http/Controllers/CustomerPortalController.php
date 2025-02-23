<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePasswordRequest;

class CustomerPortalController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $user = Auth::user();
        $address = Address::where('user_id', $userId)->with('user')->first();
        $completed = Order::where('user_id', $userId)->where('status', 'completed')->get();
        $pending = Order::where('user_id', $userId)->where('status', 'pending')->get();
        $shipping = Order::where('user_id', $userId)->where('status', 'shipped')->get();
        if(!$user){
            return redirect()->route('login');
        }
        return view('customerDash.index', compact('completed', 'shipping', 'pending', 'user', 'userId', 'address'));
    }

    public function completed()
    {
        $userId = Auth::id();
        $orders = Order::get()->where('user_id', $userId)->where('status', 'completed');
        return view('customer.orders', compact('orders'));
    }
    public function pending()
    {
        $userId = Auth::id();
        $orders = Order::get()->where('user_id', $userId)->where('status', 'pending');
        return view('customer.orders', compact('orders'));
    }
    public function shipping()
    {
        $userId = Auth::id();
        $orders = Order::get()->where('user_id', $userId)->where('status', 'shipping');
        return view('customer.orders', compact('orders'));
    }

    
}
