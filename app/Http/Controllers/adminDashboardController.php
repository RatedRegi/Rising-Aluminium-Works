<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\Enquiry;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminDashboardController extends Controller
{
  public function enquiry(){
    $enquiries = Enquiry::all();
    return view('dashboard.enquiries', compact('enquiries'));
  }  
  
  public function index() {
      return view('dashboard.index');
  }

  public function main()
    {
      $orders = Order::all();
      $sales = Order::where('status', 'completed');
      $total = $sales->sum('total_price');
      $stock = Product::all();
      $orderOwner = Order::latest()->with('user')->paginate(8);
      $totalStock = $stock->sum('stock');
      $users = User::where('role', 'user');
      $user = Auth::user();

      return view('dashboard.analytics', compact('users', 'orders', 'total', 'totalStock', 'orderOwner'));
    }

    public function profile()
    {
      $products = Product::all();
      $user = Auth::user();
        return view('dashboard.pages_profile', compact('user'));
    }

  public function show1(){
    return view('dashboard.pages_sign_in');
  }
 public function show2(){
  return view('dashboard.pages_sign_up',);
  }
  public function update(){
    $orderOwner = Order::with('user', 'user.address')->latest()->paginate(8);
    $usertimezone = 'Africa/Harare';
    foreach ($orderOwner as $order) {
      $order->localTime = Carbon::parse($order->created_at)->setTimezone($usertimezone);
    }
   
    return view('dashboard.orders', compact('orderOwner'));

  }
  public function customers(){
    $users = User::where('role', 'user')->with('address')->paginate(8);
    return view('dashboard.customers', compact('users'));
  }
 
  public function quotations(){
    return view('dashboard.quotations');
  }
 
    public function Add()
    {
      $users = User::count();
      $products = Product::get();
      $orders = Order::count();
        return view('productAdd.productAdd', compact('users', 'products', 'orders'));
    }

    public function Remove()
    {
      $users = User::count();
      $products = Product::get();
      $orders = Order::count();
        return view('productRemove.index', compact('users', 'products', 'orders'));
    }
 public function deleteUser($id){
$user = User::where('id', $id);
$user->delete();
return redirect()->back()->with('message', 'User deleted successfully.');
 }

 public function updateCompleted(Request $request, $id){
$order = Order::findOrFail($id);
if(($order->status === 'pending' || $order->status === 'shipped') && $request->completed === 'completed')
{
  foreach ($order->items as $orderItem) {
    $product = Product::find($orderItem->product_id);
    if($product){
      $product->stock -= $orderItem->quantity;
      $product->save();
    }
  }
}
$order->status = $request->completed;
$order->update();
return redirect()->back()->with('message', 'Order completed & stock updated.');
 }

 public function updateShipped(Request $request, $id){
  $order = Order::findOrFail($id);
  $order->status = $request->shipped;
  $order->update();
  return redirect()->back()->with('error', 'Order Being Shipped.');
   }
   public function updatePending(Request $request, $id){
    $order = Order::findOrFail($id);
    $order->status = $request->pending;
    $order->update();
    return redirect()->back()->with('warning', 'Order Pending.');
     }
}
