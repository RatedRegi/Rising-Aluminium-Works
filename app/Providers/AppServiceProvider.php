<?php

namespace App\Providers;


use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       View::composer('*', function($view){
        if(Auth::check()){
            $cart = Cart::where('user_id', Auth::id())->first();

            $cartCount =  $cart ? CartItem::where('cart_id', $cart->id)->count():0; 
        }else{
            $cartCount = 0;
        }
       
        $view->with('cartCount', $cartCount);
       });
    }
}
