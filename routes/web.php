<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;



Route::resource('posts', PostController::class);
Route::resource('dts', ProductController::class);
Route::resource('suppliers', SupplierController::class);
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

Route::resources([
    'posts' => PostController::class,
    'dts' => ProductController::class,
    'suppliers' => SupplierController::class,
]);