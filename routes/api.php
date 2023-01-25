<?php

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['admin-api'])
    ->group(function () {
        Route::post('course/add', [AdminController::class, 'addCourse']);
        // Route::post('cart/coupon', 'Carts\CartCouponController@addCoupon');
        // Route::delete('cart/coupon', 'Carts\CartCouponController@deleteCoupon');
        // Route::delete('cart/flyer', 'Carts\CartController@deleteFlyer');
    });

Route::controller(RegisterController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});