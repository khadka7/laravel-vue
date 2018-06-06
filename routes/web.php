<?php

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



Route::group(['prefix'=>'admin'],function (){
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/logout','\App\Http\Controllers\Auth\LoginController@logout');
});
Route::get('register/confirm/{token}','Auth\RegisterController@confirmEmail');

Route::get('{path}', function() {
    return view('app');
})->where('path', '.*');

