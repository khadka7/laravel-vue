<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/products','\App\Api\Product\Controllers\ProductController');

Route::group(['prefix'=>'products'],function (){
    Route::apiResource('/{product}/reviews','\App\Api\Review\Controllers\ReviewController');
});

Route::post('register','\App\Api\User\Controllers\UserController@register')->name('api_register');
Route::post('/{id}/update','\App\Api\User\Controllers\UserController@update')->name('api_user_update');