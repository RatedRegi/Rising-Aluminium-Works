<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function show($id)
    {
        $orders = Order::with('items')->findOrFail($id);
        $timestamp = $orders->created_at;
        $usertimezone = 'Africa/Harare';
        $localTime = Carbon::parse($timestamp)->setTimezone($usertimezone);
        return view('orders.show', compact('orders', 'localTime'));
    }
    public function report()
    {
        $products = Product::leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
        ->leftJoin('orders', 'order_items.order_id', '=', 'orders.id')
        ->select('products.*', DB::raw('COALESCE(SUM(order_items.quantity), 0) as total_sold'))
        ->where('orders.status', 'completed')
        ->groupBy('products.id')
        ->orderByDesc('total_sold')
        ->paginate(8);
        // Get the start and end dates for current and previous weeks
        $currentWeekStart = Carbon::now()->startOfWeek();
        $currentWeekEnd = Carbon::now()->endOfWeek();
        $previousWeekStart = Carbon::now()->subWeek()->startOfWeek();
        $previousWeekEnd = Carbon::now()->subWeek()->endOfWeek();
    
        // Fetch total sales for current and previous weeks
        $currentWeekSales = Order::where('status', 'completed')->whereBetween('created_at', [$currentWeekStart, $currentWeekEnd])->sum('total_price');
        $previousWeekSales = Order::where('status', 'completed')->whereBetween('created_at', [$previousWeekStart, $previousWeekEnd])->sum('total_price');
    
        // Calculate percentage change (avoid division by zero)
        if ($previousWeekSales == 0) {
            $percentageChange = $currentWeekSales > 0 ? 100 : 0; // If no sales last week, assume full increase
        } else {
            $percentageChange = (($currentWeekSales - $previousWeekSales) / $previousWeekSales) * 100;
        }
    
     // Fetch total orders for current and previous weeks
     $currentWeekOrders = Order::whereBetween('created_at', [$currentWeekStart, $currentWeekEnd])->count();
     $previousWeekOrders = Order::whereBetween('created_at', [$previousWeekStart, $previousWeekEnd])->count();
 
     // Calculate percentage change (avoid division by zero)
     if ($previousWeekOrders == 0) {
         $percentageChangeOrders = $currentWeekOrders > 0 ? 100 : 0; // If no orders last week, assume full increase
     } else {
         $percentageChangeOrders = (($currentWeekOrders - $previousWeekOrders) / $previousWeekOrders) * 100;
     }

          // Fetch total users for current and previous weeks
          $currentWeekCustomers = User::where('role', 'user')->whereBetween('created_at', [$currentWeekStart, $currentWeekEnd])->count();
          $previousWeekCustomers = User::where('role', 'user')->whereBetween('created_at', [$previousWeekStart, $previousWeekEnd])->count();
      
          // Calculate percentage change (avoid division by zero)
          if ($previousWeekCustomers == 0) {
              $percentageChangeCustomers = $currentWeekCustomers > 0 ? 100 : 0; // If no orders last week, assume full increase
          } else {
              $percentageChangeCustomers = (($currentWeekCustomers - $previousWeekCustomers) / $previousWeekCustomers) * 100;
          }
        return view('dashboard.operations', [
            'currentWeekSales' => $currentWeekSales,
            'previousWeekSales' => $previousWeekSales,
            'percentageChange' => round($percentageChange, 2),
            'currentWeekOrders' => $currentWeekOrders,
            'previousWeekOrders' => $previousWeekOrders,
            'percentageChangeOrders' => round($percentageChangeOrders, 2),
            'currentWeekCustomers' => $currentWeekCustomers,
            'previousWeekCustomers' => $previousWeekCustomers,
            'percentageChangeCustomers' => round($percentageChangeCustomers, 2),
            'products' => $products
        ]);
    }

}
    
    

