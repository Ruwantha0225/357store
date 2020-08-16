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

Route::get('/', 'PagesController@index');

Route::get('/shop', 'PagesController@shop');

Route::get('/cart','PagesController@cart' );

Route::get('/checkout', 'PagesController@checkout');

Route::get('/admin', 'PagesController@admin');

Route::get('/login', 'PagesController@login');

Route::get('/register', 'PagesController@register');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('product')->group(function() {
    Route::get('all', 'ProductController@list')->name('product.all');
    Route::get('list', 'ProductController@index')->name('product.list');
    Route::get('create', 'ProductController@create')->name('product.create');
    Route::post('store', 'ProductController@store')->name('product.store');
    Route::get('show/{id}', 'ProductController@show')->name('product.show');
    Route::get('edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::post('edit/{id}', 'ProductController@update')->name('product.update');
    Route::get('delete/{id}', 'ProductController@destroy')->name('product.delete');
    Route::post('addtocart', 'CartController@addToCart')->name('addtocart');
    Route::get('addtocart', 'CartController@addToCart')->name('addtocart');
});

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::post('checkout', 'CartController@checkout')->name('checkout');

Route::get('search', 'ProductController@list')->name('search');