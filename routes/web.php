<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FAQController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EnquiriesController;
use App\Http\Controllers\TestimonyController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\adminDashboardController;
use App\Http\Controllers\CustomerPortalController;


Route::get('/faq', [FAQController::class, 'index'])->name('faq');
Route::get('/about_us',  function () {
    return view('about');
});
Route::get('/why_us',  function () {
    return view('why_us');
})->name('why_us');
// meet the team
Route::get('/team',  function () {
    return view('home.team');
})->name('team');

Route::get('/products',  [ProductsController::class, 'index'])->name('products'); 

Route::post('/products',  [ProductsController::class, 'create'])->name('productCreate'); 

Route::get('/home/shop',  [CartController::class, 'index'])->name('cart'); 

// authentication
Route::get('/register', [RegisterController::class, 'index'])->name('register'); 
Route::post('/register', [RegisterController::class, 'store']); 

 Route::get('/login',  [LoginController::class, 'index'])->name('login'); 
 Route::post('/login',  [LoginController::class, 'login']);

Route::get('/customerPortal/completed', [CustomerPortalController::class, 'completed'])->name('completed');
Route::get('/customerPortal/pending', [CustomerPortalController::class, 'pending'])->name('pending');
Route::get('/customerPortal/shipping', [CustomerPortalController::class, 'shipping'])->name('shipping');
Route::get('/customerPortal', [CustomerPortalController::class, 'index'])->name('customerPortal');
Route::put('/customerPortal/update', [UserController::class, 'update'])->name('details');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/admin/productManagement', [adminDashboardController::class, 'index'])->name('admin.products');
Route::get('/admin/productAdd', [adminDashboardController::class, 'Add'])->name('admin.productsAdd');
Route::post('/products/update/{id}', [ProductsController::class, 'update'])->name('products.update');
Route::get('/admin/productRemove', [adminDashboardController::class, 'Remove'])->name('admin.productsRemove');
Route::get('/', [ProductsController::class, 'home'])->name('home'); 

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
// cart section
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/cart/checkout/address', [AddressController::class, 'index'])->name('address');
Route::post('/cart/checkout/address', [AddressController::class, 'store'])->name('storeAddress');
Route::post('/testimony', [TestimonyController::class, 'store'])->name('testimony');

Route::get('/pages_sign_in', [adminDashboardController::class, 'show1'])->name('sign_in');
Route::post('/pages_sign_in', [LoginController::class, 'login']);
Route::get('/pages_sign_up', [adminDashboardController::class, 'show2'])->name('sign_up');
Route::post('/pages_sign_up', [RegisterController::class, 'store']);

    Route::middleware(['role:admin'])->group(function () {
Route::get('/main/profile', [adminDashboardController::class, 'profile'])->name('profile');
Route::get('/main', [adminDashboardController::class, 'main'])->name('main_page');
Route::get('/main/order/update', [adminDashboardController::class, 'update'])->name('update_order');
Route::post('/main/order/pending/{id}', [adminDashboardController::class, 'updatePending'])->name('updatePending');
Route::post('/main/order/shipped/{id}', [adminDashboardController::class, 'updateShipped'])->name('updateShipped');
Route::post('/main/order/completed/{id}', [adminDashboardController::class, 'updateCompleted'])->name('updateCompleted');
Route::post('/main/logout',  [LogoutController::class, 'logoutAdmin'])->name('logoutAdmin');
Route::get('/main/customers', [adminDashboardController::class, 'customers'])->name('customers');
Route::get('/main/quotations',  [adminDashboardController::class, 'quotations'])->name('quotations'); 
Route::get('/main/products',  [ProductsController::class, 'show'])->name('Adminproducts'); 
Route::delete('/main/delete/{id}',  [ProductsController::class, 'delete'])->name('delete'); 
Route::get('/main/edit/{id}',  [ProductsController::class, 'edit'])->name('edit'); 
Route::put('/main/update/{id}',  [ProductsController::class, 'update'])->name('update'); 
Route::get('/enquiry',  [adminDashboardController::class, 'enquiry'])->name('enquiry'); 
Route::delete('/main/deleteUser/{id}',  [adminDashboardController::class, 'deleteUser'])->name('deleteUser'); 

});
Route::post('/enquiry', [EnquiriesController::class, 'enquiry'])->name('enquiry'); 
Route::get('/operations-report', [OrderController::class, 'report'])->name('operations-report'); 