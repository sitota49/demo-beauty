<?php

use Illuminate\Support\Facades\Route;


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
    return view('welcome');
});

Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user_management')->group(function () {
   Route::resource('role', App\Http\Controllers\RoleController::class);
   Route::resource('user', App\Http\Controllers\UserController::class);
});

Route::prefix('data_management')->group(function () {
    Route::resource('category', App\Http\Controllers\CategoryController::class);
    Route::resource('product', App\Http\Controllers\ProductController::class);
});

Route::prefix('order_management')->group(function () {
    Route::resource('cart', App\Http\Controllers\CartController::class);
    Route::resource('transaction', App\Http\Controllers\TransactionController::class);
});

