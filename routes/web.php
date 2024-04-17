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

Route::get('/', 'App\http\controllers\HomeController@index')->name('home.index');
Route::get('/about', 'App\http\controllers\HomeController@about')->name('home.about');

Route::get('/images', 'App\http\controllers\ImagesController@index')->name('images.index');
Route::get('/images/{id}', 'App\http\controllers\ImagesController@show')->name('images.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware("admin")->group(function() {

    Route::get('/admin', 'App\http\controllers\AdminController@index')->name('admin.home.index');
    Route::get('/admin/images', 'App\http\controllers\AdminImagesController@index')->name('admin.images.index');
    Route::post('/admin/images/store', 'App\http\controllers\AdminImagesController@store')->name('admin.images.store');
    Route::delete('/admin/images/{id}/delete', 'App\http\controllers\AdminImagesController@delete')->name('admin.images.delete');
    Route::get('/admin/images/{id}/edit', 'App\http\controllers\AdminImagesController@edit')->name('admin.images.edit');
    Route::put('/admin/images/{id}/update', 'App\http\controllers\AdminImagesController@update')->name('admin.images.update');
});

Route::get('/cart', 'App\http\controllers\CartController@index')->name('cart.index');

Route::middleware("auth")->group(function() {

    Route::get('/cart/purchase', 'App\http\controllers\CartController@purchase')->name('cart.purchase');
    Route::post('/cart/add/{id}', 'App\http\controllers\CartController@add')->name('cart.add');
    Route::delete('/cart/clear', 'App\http\controllers\CartController@clear')->name('cart.clear');
    Route::delete('/cart/delete/{id}', 'App\http\controllers\CartController@delete')->name('cart.delete');

    Route::get('/orders', 'App\http\controllers\MyAccountController@index')->name('myaccount.orders');
    Route::get('/balance', 'App\http\controllers\MyAccountController@balance')->name('myaccount.balance');
    Route::post('/update_balance', 'App\http\controllers\MyAccountController@update_balance')->name('myaccount.update_balance');
});
