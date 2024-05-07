<?php

use App\Http\Controllers\Api\V1\PaymentApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->namespace('Api\V1')->group(function () {
    Route::post('send_sms', [\App\Http\Controllers\Api\V1\AuthApiController::class, 'sendSms']);
    Route::post('verify_sms_code', [\App\Http\Controllers\Api\V1\AuthApiController::class, 'verifySms']);

    Route::get('home', [\App\Http\Controllers\Api\V1\HomeApiController::class, 'home']);

    Route::get('most_sold_products', [\App\Http\Controllers\Api\V1\ProductsApiController::class, 'mostSoldProducts']);
    Route::get('most_viewed_products', [\App\Http\Controllers\Api\V1\ProductsApiController::class, 'mostViewedProducts']);
    Route::get('newest_products', [\App\Http\Controllers\Api\V1\ProductsApiController::class, 'newestProducts']);
    Route::get('cheapest_products', [\App\Http\Controllers\Api\V1\ProductsApiController::class, 'cheapestProducts']);
    Route::get('most_expensive_products', [\App\Http\Controllers\Api\V1\ProductsApiController::class, 'mostExpensiveProducts']);

    Route::get('products_by_category/{id}', [\App\Http\Controllers\Api\V1\ProductsApiController::class, 'productsByCategory']);
    Route::get('products_by_brand/{id}', [\App\Http\Controllers\Api\V1\ProductsApiController::class, 'productsByBrand']);

    Route::get('product_details/{product}', [\App\Http\Controllers\Api\V1\ProductsApiController::class, 'productDetail']);

    Route::post('search_product', [\App\Http\Controllers\Api\V1\ProductsApiController::class, 'searchProduct']);

    Route::get('payment/callback', [\App\Http\Controllers\Api\v1\PaymentApiController::class, 'callback']);
});

Route::prefix('v1')->namespace('Api\V1')->middleware('auth:sanctum')->group(function () {
    Route::post('register', [\App\Http\Controllers\Api\V1\UserApiController::class, 'register']);
    Route::post('save_product_comment', [\App\Http\Controllers\Api\V1\ProductsApiController::class, 'saveComment']);

    Route::post('payment', [\App\Http\Controllers\Api\V1\PaymentApiController::class, 'payment'])->name('payment');
});
