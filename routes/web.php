<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/login', 'Auth\UserAuthController@getLogin')->name('user.login');
Route::post('user/login', 'Auth\UserAuthController@postLogin');

Route::middleware('auth:user')->group(function(){

    Route::get('/', function () {
        return view('layout/template');
    });
    
    // master
    Route::get('/master','Api\MasterController@index')->name('master.index');
    Route::get('/tambah','Api\MasterController@create')->name('tambah.create');
    Route::get('/read/{id_master}','Api\MasterController@read')->name('read');
    Route::get('/store','Api\MasterController@store')->name('store');
    Route::get('/show/{id}','Api\MasterController@show')->name('show');
    Route::get('/update/{id}','Api\MasterController@update')->name('update');
    Route::delete('delete/{id}', 'Api\MasterController@destroy')->name('delete.master');
    // transaksi
    Route::get('/trk','Api\TransaksiController@index')->name('trk.index');
    Route::get('/create','Api\TransaksiController@create')->name('trk.create');
    Route::post('/store','Api\TransaksiController@store')->name('store');
    Route::get('/edit/{id_ts}','Api\TransaksiController@show')->name('edit');
    Route::post('/update','Api\TransaksiController@update')->name('update');
    
});


Auth::routes();


