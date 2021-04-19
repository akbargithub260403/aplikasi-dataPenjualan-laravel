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

Auth::routes();
Route::get('/','PagesController@login');

Route::group(['middleware' => 'auth'],function(){
    Route::get('/home','HomeController@index')->name('home');

    Route::get('/data_barang','BarangController@index');
    Route::get('/data_supplier','SupplierController@index');
    Route::get('/data_transaksi','TransaksiController@index');

    Route::get('/barang/add','BarangController@create');
    Route::get('/supplier/add','SupplierController@create');
    Route::get('/transaksi/add/{data}','TransaksiController@create');

    Route::delete('/barang/{barang}/hapus','BarangController@destroy');
    Route::delete('/supplier/{supplier}/hapus','SupplierController@destroy');
    Route::delete('/transaksi/{transaksi}/hapus','TransaksiController@destroy');

    Route::post('/barang/postdata','BarangController@store');
    Route::post('/supplier/postdata','SupplierController@store');
    Route::post('/transaksi/postdata','TransaksiController@store');

    Route::get('/show/barang/{barang}','BarangController@show');
    Route::get('/show/supplier/{supplier}','SupplierController@show');
    Route::get('/show/transaksi/{transaksi}','TransaksiController@show');

    Route::get('/barang/{barang}/update','BarangController@edit');
    Route::get('/supplier/{supplier}/update','SupplierController@edit');

    Route::patch('/barang/{barang}/postupdate','BarangController@update');
    Route::patch('/supplier/{supplier}/postupdate','SupplierController@update');

    Route::get('/export/{data}','BarangController@export');

    Route::post('/barang/import_excel','BarangController@import_excel');
    Route::post('/supplier/import_excel','SupplierController@import_excel');

    Route::get('/create/barcode/{transaksi}','TransaksiController@barcode');

    Route::post('/search/barang','BarangController@search');
    Route::post('/search/supplier','SupplierController@search');
    Route::post('/search/transaksi','TransaksiController@search');


    
});