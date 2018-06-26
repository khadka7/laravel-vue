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
    Route::get('/products','\App\Admin\Product\Controllers\ProductController@index')->name('vl_products');
    Route::get('/product/form','\App\Admin\Product\Controllers\ProductController@form')->name('vl_product_form');
    Route::get('/product/{id}/edit','\App\Admin\Product\Controllers\ProductController@form')->name('vl_product_edit');

    Route::post('/products','\App\Admin\Product\Controllers\ProductController@create')->name('vl_product_add');
    Route::post('/product/{id}/update','\App\Admin\Product\Controllers\ProductController@update')->name('vl_product_update');
    Route::get('/product/{id}/delete','\App\Admin\Product\Controllers\ProductController@delete')->name('vl_product_delete');
});
Route::get('register/confirm/{token}','Auth\RegisterController@confirmEmail');
//Route::get('/{vue_capture?}', function () { return view('app'); })->where('vue_capture', '[\/\w\.-]*');
//Route::get('/',function (){
//   return view('app');
//});
Route::get('{path}', function() {
    return view('app');
})->where('path', '.*');
//
