<?php

use Illuminate\Http\Request;
use \App\Http\Controllers\Api\UserController;
use \App\Http\Controllers\Api\FavoriteController;
use \App\Http\Controllers\Api\ProductController;
use \App\Http\Controllers\Api\AddressController;
use \App\Http\Controllers\Api\CategoryController;
use \App\Http\Controllers\Api\CartController;
use \App\Http\Controllers\Api\OrderController;
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

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/forgot-password', [UserController::class,'forgotPassword']);


Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/lang-loc',[FavoriteController::class,'addLang']);

    Route::post('/verify',[UserController::class,'verify']);
    Route::post('/logout',[UserController::class,'logout']);

    Route::get('/profile',[UserController::class,'profile']);

    Route::post('/favorites',[FavoriteController::class,'favorite']);
    Route::post('/favorite',[FavoriteController::class,'addFavorites']);

    Route::post('/product',[ProductController::class,'show']);
    Route::post('/product-detail',[ProductController::class,'store']);

    Route::post('/cart',[CartController::class,'show']);
    Route::post('/add-cart',[CartController::class,'addToCart']);

    Route::post('/order',[OrderController::class,'show']);
    Route::post('/order-detail',[OrderController::class,'store']);
    Route::post('/checkout',[OrderController::class,' CheckOut']);


    Route::post('/home',[CategoryController::class,'show']);

    Route::post('/addresses',[AddressController::class,'show']);
    Route::post('/address',[AddressController::class,'addAddress']);


//    Route::get('/home', [UserController::class, 'home']);
});
