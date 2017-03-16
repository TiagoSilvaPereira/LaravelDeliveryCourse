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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth.check.role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
    
    Route::get('/', 'HomeController@index');

    // Categories
    Route::get('/categories', 'CategoriesController@index')->name('categories.index');
    Route::get('/categories/create', 'CategoriesController@create')->name('categories.create');
    Route::get('/categories/edit/{id}', 'CategoriesController@edit')->name('categories.edit');
    Route::post('/categories/store', 'CategoriesController@store')->name('categories.store');
    Route::post('/categories/update/{id}', 'CategoriesController@update')->name('categories.update');

    // Products
    Route::get('/products', 'ProductsController@index')->name('products.index');
    Route::get('/products/create', 'ProductsController@create')->name('products.create');
    Route::get('/products/edit/{id}', 'ProductsController@edit')->name('products.edit');
    Route::post('/products/store', 'ProductsController@store')->name('products.store');
    Route::post('/products/update/{id}', 'ProductsController@update')->name('products.update');
    Route::get('/products/delete/{id}', 'ProductsController@delete')->name('products.delete');

    // Clients
    Route::get('/clients', 'ClientsController@index')->name('clients.index');
    Route::get('/clients/create', 'ClientsController@create')->name('clients.create');
    Route::get('/clients/edit/{id}', 'ClientsController@edit')->name('clients.edit');
    Route::post('/clients/store', 'ClientsController@store')->name('clients.store');
    Route::post('/clients/update/{id}', 'ClientsController@update')->name('clients.update');
    Route::get('/clients/delete/{id}', 'ClientsController@delete')->name('clients.delete');

    // Orders
    Route::get('/orders', 'OrdersController@index')->name('orders.index');
    Route::get('/orders/edit/{id}', 'OrdersController@edit')->name('orders.edit');
    Route::post('/orders/update/{id}', 'OrdersController@update')->name('orders.update');

    // Cupoms
    Route::get('/cupoms', 'CupomsController@index')->name('cupoms.index');
    Route::get('/cupoms/create', 'CupomsController@create')->name('cupoms.create');
    Route::get('/cupoms/edit/{id}', 'CupomsController@edit')->name('cupoms.edit');
    Route::post('/cupoms/store', 'CupomsController@store')->name('cupoms.store');
    Route::post('/cupoms/update/{id}', 'CupomsController@update')->name('cupoms.update');
    Route::get('/cupoms/delete/{id}', 'CupomsController@delete')->name('cupoms.delete');

});

Route::group(['middleware' => 'auth.check.role:client', 'prefix' => 'customer', 'as' => 'customer.'], function() {

    // Checkout
    Route::get('/orders', 'CheckoutController@index')->name('orders.index');
    Route::get('/orders/create', 'CheckoutController@create')->name('orders.create');
    Route::post('/orders/store', 'CheckoutController@store')->name('orders.store');

});