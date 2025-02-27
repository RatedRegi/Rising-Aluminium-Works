<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function home() {
        $products = Product::with('category')->get();
        $categories = Category::all();
        $testimonies = Testimony::with('user')->get();
        return view('home.index', compact('products', 'categories', 'testimonies'));
    }

    public function index(Request $request) {
        $categories = Category::all();
        $search = $request->input('search');
        $products = Product::with('category')->latest()->filter($request->only('search', 'category_id'))->paginate(8);
       $cartItems = CartItem::all();
       
        return view('shop.cart', compact('products', 'categories', 'cartItems'));
    }

    public function show() {
        $products = Product::with('category')->paginate(4);
        $categories = Category::all();
        return view('dashboard.products', compact('products', 'categories'));
    }

    public function Edit($id) {
        // Find the product by ID
        $products = Product::find($id);
        return view('dashboard.products', compact('products'));
    }
    
    public function create(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'category_id' => 'required|integer'
      ]);

      if($request->hasFile('image_url')){
     $validatedData['image_url'] = $request->file('image_url')->store('images', 'public');
      }

      Product::create($validatedData);
       
      return redirect()->back()->with('message', 'Product created successfuly');
}

public function delete($id) {
    $products = Product::find($id);
    if($products){
        $products->delete();
    }
    return redirect()->back()->with('message', 'Product deleted successfuly');
}
    public function update(Request $request, $id) {
            // Fetch the product by ID
            $product = Product::findOrFail($id);
        
            // Update the product details
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->stock = $request->input('stock');
            $product->category_id = $request->input('category_id');
            if ($request->hasFile('image_url')) {
                $imagePath = $request->file('image_url')->store('uploaded', 'public');
                $product->image_url = $imagePath;
            }
        
            $product->save();
        
            return redirect()->back()->with('message', 'Product updated successfully.');
        }

        public function weeklyOrdersReport()
        {
            // Get the start and end dates for current and previous weeks
            $currentWeekStart = Carbon::now()->startOfWeek();
            $currentWeekEnd = Carbon::now()->endOfWeek();
            $previousWeekStart = Carbon::now()->subWeek()->startOfWeek();
            $previousWeekEnd = Carbon::now()->subWeek()->endOfWeek();
        
            // Fetch total sales for current and previous weeks
            $currentWeekSales = Product::where('status', 'completed')->whereBetween('created_at', [$currentWeekStart, $currentWeekEnd])->sum('total_price');
            $previousWeekSales = Product::where('status', 'completed')->whereBetween('created_at', [$previousWeekStart, $previousWeekEnd])->sum('total_price');
        
            // Calculate percentage change (avoid division by zero)
            if ($previousWeekSales == 0) {
                $percentageChange = $currentWeekSales > 0 ? 100 : 0; // If no sales last week, assume full increase
            } else {
                $percentageChange = (($currentWeekSales - $previousWeekSales) / $previousWeekSales) * 100;
            }
        
            return view('dashboard.calculations', [
                'currentWeekSales' => $currentWeekSales,
                'previousWeekSales' => $previousWeekSales,
                'percentageChange' => round($percentageChange, 2)
            ]);
        }
        
    }  
    
