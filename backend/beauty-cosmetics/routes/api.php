<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductManagement\ProductController;
use App\Http\Controllers\API\ProductManagement\CategoryController;
use App\Http\Controllers\API\CustomerCartManagement\CartController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']); 

Route::prefix('product_management')->group(function() {
    Route::resource('categories', App\Http\Controllers\API\ProductManagement\CategoryController::class);
    Route::get('categories/{id}/products', [ App\Http\Controllers\API\ProductManagement\CategoryController::class, 'products'])->name('categories.products');
    Route::resource('products', App\Http\Controllers\API\ProductManagement\ProductController::class);
    Route::get('products/{id}', [ App\Http\Controllers\API\ProductManagement\CategoryController::class, 'show'])->name('products.show');
    Route::get('featuredProducts',[App\Http\Controllers\API\ProductManagement\ProductController::class, 'getFeaturedProducts'])->name('products.getFeaturedProducts');
});

Route::group(['prefix'=> 'cart_management', 'middleware' => ['auth:sanctum']], function () {
    Route::get('cart', [CartController::class, 'index'])->name('index');
    Route::post('cart', [CartController::class, 'addItemToCart'])->name('addItemToCart');
    Route::put('cart', [CartController::class, 'updateItemInCart'])->name('updateItemInCart');
    Route::delete('cart', [CartController::class, 'removeItemFromCart'])->name('removeItemFromCart');
    Route::post('createNewCart', [CartController::class, 'createNewCart'])->name('createNewCart');
    Route::post('emptyCart', [CartController::class, 'emptyCart'])->name('emptyCart');
    Route::post('processCart', [CartController::class, 'processCart'])->name('processCart');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
