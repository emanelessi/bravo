<?php

use Illuminate\Http\Request;
use \App\Http\Controllers\Api\UserController;
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


Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/verify',[UserController::class,'verify']);

    Route::get('home/{id?}', [UserController::class, 'home']);
});
