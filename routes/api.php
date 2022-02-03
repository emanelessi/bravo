<?php

use Illuminate\Http\Request;
use \App\Http\Controllers\Api\UserController;
use \App\Http\Controllers\Api\FavoriteController;
use \App\Http\Controllers\Api\ProductController;
use \App\Http\Controllers\Api\AddressController;
use \App\Http\Controllers\Api\CategoryController;
use \App\Http\Controllers\Api\CartController;
use \App\Http\Controllers\Api\OrderController;
use \App\Http\Controllers\Api\LanguageController;
use \App\Http\Controllers\Api\RateController;
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
Route::post('forgot-password-code', [UserController::class,'forgotPasswordCode']);


Route::group(['middleware' => 'auth:api'], function () {

    Route::post('/verify',[UserController::class,'verify']);
    Route::post('/logout',[UserController::class,'logout']);

    Route::get('/profile',[UserController::class,'profile']);
    Route::put('/profile', [UserController::class, 'editProfile']);

    Route::post('/favorites',[FavoriteController::class,'favorite']);
    Route::post('/favorite',[FavoriteController::class,'addFavorites']);

    Route::post('/products',[ProductController::class,'show']);
    Route::get('/product/{id}',[ProductController::class,'store']);
//    Route::get('/product/{id}',[ProductController::class,'get']);

    Route::post('/carts',[CartController::class,'show']);
    Route::post('/add-cart',[CartController::class,'addToCart']);
    Route::delete('/cart/{id}',[CartController::class,'destroy']);


    Route::post('/orders',[OrderController::class,'show']);
    Route::get('/order/{id}',[OrderController::class,'store']);
    Route::post('/checkout',[OrderController::class,' CheckOut']);

    Route::post('/home',[CategoryController::class,'show']);

    Route::post('/addresses',[AddressController::class,'show']);
    Route::post('/address',[AddressController::class,'addAddress']);

    Route::post('/rate',[RateController::class,'rate']);


//    Route::get('/home', [UserController::class, 'home']);
});
