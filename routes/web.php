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

Auth::routes();

Route::get('/home', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/home', 'HomeController@index');
    Route::resource('categories', 'CategoryController');
    Route::resource('items', 'ItemController');
    Route::resource('suppliers', 'SupplierController');
    Route::resource('purchases', 'PurchaseController');
    Route::resource('customers', 'CustomerController');
    Route::resource('sales', 'SaleController');
    Route::resource('users', 'UserController');
    Route::get('item/{id}','ItemController@search');
    Route::get('customer/{id}','CustomerController@search');
    Route::get('purchases/{id}/cetak_pdf','PurchaseController@cetak_pdf');
    Route::get('sales/{id}/cetak_pdf','SaleController@cetak_pdf');
    Route::get('categories/destroy/{id}','SaleController@destroy');
});
