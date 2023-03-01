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
Route::get('/', function () {
  return view('auth.login');})->name('login');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/postlogin','Web\LoginController@postlogin')->name('postlogin');
Route::get('/logout','Web\LoginController@logout')->name('logout');

// Route::middleware('auth:user')->group(function(){
Route::group(['middleware' => ['auth']], function(){
    Auth::routes();
      // master
      Route::get('/master','Web\MasterController@index')->name('master.index');
      Route::get('/tambah','Web\MasterController@create')->name('tambah.create');
      Route::get('/read/{id_master}','Web\MasterController@read')->name('read');
      Route::get('/store','Web\MasterController@store')->name('store');
      Route::get('/show/{id}','Web\MasterController@show')->name('show');
      Route::get('/update/{id}','Web\MasterController@update')->name('update');
      Route::delete('delete/master/{id}', 'Web\MasterController@destroy')->name('delete.master');
      Route::get('pencarian/json', 'Web\MasterController@json')->name('pencarian/json');

      // transaksi
      Route::get('/trk','Web\TransaksiController@index')->name('trk.index');
      Route::get('/create','Web\TransaksiController@create')->name('trk.create');
      Route::post('/store','Web\TransaksiController@store')->name('store');
      Route::get('/edit/{id_ts}','Web\TransaksiController@show')->name('edit');
      Route::post('/update','Web\TransaksiController@update')->name('update');
      Route::delete('/delete/trx/{id_ts}','Web\TransaksiController@destroy')->name('delete.trx');
    
      //   user
    Route::get('/user', 'Web\PenggunaController@index')->name('user.index');
    Route::get('/user/read/{id}','Web\PenggunaController@read')->name('read.user');
    Route::get('/user/create','Web\PenggunaController@create')->name('create.user');
    Route::get('/user/editpas','Web\PenggunaController@editpas')->name('editpas.user');
    Route::patch('password', 'Web\PenggunaController@updateuser')->name('user.password.update');
    Route::get('/user/store','Web\PenggunaController@store')->name('store.user');
    Route::delete('delete/user/{id}', 'Web\PenggunaController@destroy')->name('delete.user');

});




