<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function getChatData(){
        $orders = Order::all();
        $sales = Order::where('status', 'completed');
        $total = $sales->sum('total_price');
        $stock = Product::all();
        $orderOwner = Order::with('user')->get();
        $totalStock = $stock->sum('stock');
        $users = User::where('role', 'user');
   

      $pie = Product::with('category')->get();
      $total = $pie->count();
        $data = [];
        $data2 = [];
     foreach ($pie as $value) {
        $data[] = [$value->name];
     }

     foreach ($pie as $value2) {
        $data2[] = [(int)  $value2->stock];
     }
    
      $chatData = json_encode($data, JSON_UNESCAPED_UNICODE);
      $chatData2 = json_encode($data, JSON_UNESCAPED_UNICODE);
      return view('dashboard.analytics', compact('chatData', 'chatData2', 'users', 'orders', 'total', 'totalStock', 'orderOwner'));
    }
   
}
