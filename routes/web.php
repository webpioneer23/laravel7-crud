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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('fix-bug','HomeController@fix');

Route::group(['middleware' => ['auth']], function(){
    Route::get('pdf-donwload/{id}', 'HomeController@pdf')->name('pdf-download');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('customer', 'CustomerController');
    Route::resource('product', 'ProductController');
    Route::get('sub-index', 'HomeController@sub_index')->name('sub.index');

    Route::group(['middleware' => ['super']], function(){
        Route::get('super-index', 'admin\HomeController@index')->name('super.index');
        Route::resource('admin-subsidiary', 'admin\SubsidiaryController');
        Route::resource('admin-customer', 'admin\CustomerController');
        Route::resource('admin-product', 'admin\ProductController');
    });
});
