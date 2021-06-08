<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Shop\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home_tem');
});

Route::get('/home_tem', function () {
    return view('home_tem');
});

Route::resource('/products', ProductController::class);

Auth::routes();

Route::get('/',  [App\Http\Controllers\Shop\MainController::class, 'index']);



Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('/admin/users', App\Http\Controllers\UserController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('/admin/orders', App\Http\Controllers\OrderController::class);
});

Route::get('/TEE SHIRTS', [App\Http\Controllers\ProductController::class, 'index_cli']);
Route::get('/SHORTS & PANTS', [App\Http\Controllers\ProductController::class, 'index_cli1']);
Route::get('/HATS', [App\Http\Controllers\ProductController::class, 'index_cli2']);
Route::get('/BUSINESS CASUAL', [App\Http\Controllers\ProductController::class, 'index_cli3']);
Route::get('/SHOES', [App\Http\Controllers\ProductController::class, 'index_cli4']);
Route::get('/BEST SELLERS', [App\Http\Controllers\ProductController::class, 'index_cli5']);
Route::get('/home', [App\Http\Controllers\Shop\MainController::class, 'index'])->name('home');

Route::get('basket', [App\Http\Controllers\BasketController::class, 'show'])->name('basket.show');
Route::post('basket/add/{product}', [App\Http\Controllers\BasketController::class, 'add'])->name('basket.add');
Route::get('basket/remove/{product}', [App\Http\Controllers\BasketController::class, 'remove'])->name('basket.remove');
Route::get('basket/empty', [App\Http\Controllers\BasketController::class, 'empty'])->name('basket.empty');

Route::post('/coupon', [App\Http\Controllers\BasketController::class, 'storeCoupon'])->name('basket.store.coupon');
Route::delete('/coupon', [App\Http\Controllers\BasketController::class, 'destroyCoupon'])->name('basket.destroy.coupon');

Route::group(['middleware' => ['auth']], function () {
    Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'getCheckout'])->name('checkout.index');
    Route::post('/checkout/order', [App\Http\Controllers\CheckoutController::class, 'placeOrder'])->name('checkout.place.order');
    Route::get('/checkout/show', [App\Http\Controllers\CheckoutController::class, 'show'])->name('checkout.show');
});

//Apply Coupon Code
Route::post('/cart/apply-coupon', [App\Http\Controllers\ProductController::class, 'applyCoupon']);


//Coupons Route
Route::match(['get', 'post'], '/admin/add-coupon', [App\Http\Controllers\PromotionController::class, 'addCoupon']);
Route::match(['get', 'post'], '/admin/view-coupons', [App\Http\Controllers\PromotionController::class, 'viewCoupons']);
Route::match(['get', 'post'], '/admin/edit-coupon/{id}', [App\Http\Controllers\PromotionController::class, 'editCoupon']);
Route::get('/admin/delete-coupon/{id}', [App\Http\Controllers\PromotionController::class, 'deleteCoupon']);
Route::post('/admin/update-coupon-status', [App\Http\Controllers\PromotionController::class, 'updateStatus']);



//Test dashboard page
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/registered-user', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/registered-order', [App\Http\Controllers\OrderController::class, 'index']);
Route::get('/registered-product', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('/registered-promotion', [App\Http\Controllers\PromotionController::class, 'viewCoupons']);
