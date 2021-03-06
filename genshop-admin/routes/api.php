<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StoreController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\AddressController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\OrderProductController;
use App\Http\Controllers\UserController;

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

//Mudar redirect do middleware para redirect com rota que retornar json informando que nao esta logado.
Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('/product', [ProductController::class, 'index']);
});

Route::get('/product', [ProductController::class, 'index']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/logintoken', [UserController::class, 'loginToken']);

Route::post('/store', [StoreController::class, 'store']);
Route::get('/store', [StoreController::class, 'index']);
Route::get('/store/image/{store}', [StoreController::class, 'show_image']);
Route::post('/store/search', [StoreController::class, 'search']);
Route::post('/store/search_category', [StoreController::class, 'search_category']);
Route::get('/store/{store}', [StoreController::class, 'show']);
Route::get('/store/products/{store}', [StoreController::class, 'products']);
Route::put('/store/{store}', [StoreController::class, 'update']);
Route::delete('/store/{store}', [StoreController::class, 'destroy']);

Route::post('/product', [ProductController::class, 'store']);
Route::post('/product/search', [ProductController::class, 'search']);
Route::post('/product/search_category', [ProductController::class, 'search_category']);
Route::get('/product/image/{product}', [ProductController::class, 'show_image']);
Route::get('/product/{product}', [ProductController::class, 'show']);
Route::put('/product/{product}', [ProductController::class, 'update']);
Route::delete('/product/{product}', [ProductController::class, 'destroy']);

Route::post('/customer', [CustomerController::class, 'store']);
Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/{customer}', [CustomerController::class, 'show']);
Route::put('/customer/{customer}', [CustomerController::class, 'update']);
Route::delete('/customer/{customer}', [CustomerController::class, 'destroy']);

Route::post('/address', [AddressController::class, 'store']);
Route::get('/address', [AddressController::class, 'index']);
Route::get('/address/{address}', [AddressController::class, 'show']);
Route::put('/address/{address}', [AddressController::class, 'update']);
Route::put('/address/main/{address}', [AddressController::class, 'changemain']);
Route::post('/address/main', [AddressController::class, 'showmain']);
Route::delete('/address/{address}', [AddressController::class, 'destroy']);

Route::post('/cart/{cart}', [CartController::class, 'add']);
Route::get('/cart/{cart}', [CartController::class, 'show']);
Route::put('/cart/remove', [CartController::class, 'remove']);
Route::delete('/cart/{cart}', [CartController::class, 'destroy']);

Route::post('/order', [OrderController::class, 'store']);
Route::get('/order', [OrderController::class, 'index']);
Route::put('/order/products', [OrderController::class, 'products']);
Route::post('/order/finish_order', [OrderController::class, 'finish_order']);
Route::get('/order/{order}', [OrderController::class, 'show']);
Route::put('/order/{order}', [OrderController::class, 'update']);
Route::delete('/order/{order}', [OrderController::class, 'destroy']);

Route::post('/category', [CategoryController::class, 'index']);
Route::get('/category/{category}', [CategoryController::class, 'show']);
