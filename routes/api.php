<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/postlogin','Api\LoginController@postlogin')->name('postlogin');
Route::get('/logout','Api\LoginController@logout')->name('logout');

// Route::group(['middleware' => ['auth']], function(){
    Route::get('/master','Api\MasterController@index')->name('master.index');
    Route::get('/tambah','Api\MasterController@create')->name('tambah.create');
    Route::get('/read/{id_master}','Api\MasterController@read')->name('read');
    Route::post('/store','Api\MasterController@store')->name('store');
    Route::get('/show/{id}','Api\MasterController@show')->name('show');
    Route::post('/update/{id}','Api\MasterController@update')->name('update');
    Route::delete('delete/{id}', 'Api\MasterController@destroy')->name('delete.master');
    Route::get('yajra/Yajra', 'Api\MasterController@Yajra')->name('yajra');

    // transaksi
    Route::get('/trk','Api\TransaksiController@index')->name('trk.index');
    Route::get('/create','Api\TransaksiController@create')->name('trk.create');
    Route::post('/store','Api\TransaksiController@store')->name('store');
    Route::get('/edit/{id_ts}','Api\TransaksiController@show')->name('edit');
    Route::post('/update','Api\TransaksiController@update')->name('update');
    Route::delete('/delete/trx/{id_ts}','Api\TransaksiController@destroy')->name('delete.trx');

    //   user
    Route::get('/user', 'Api\PenggunaController@index')->name('user.index');
    Route::get('/user/read/{id}','Api\PenggunaController@read')->name('read.user');
    Route::get('/user/create','Api\PenggunaController@create')->name('create.user');
    Route::get('/user/editpas','Api\PenggunaController@editpas')->name('editpas.user');
    Route::patch('password', 'Api\PenggunaController@updateuser')->name('user.password.update');
    Route::post('/user/store','Api\PenggunaController@store')->name('store.user');
    Route::delete('delete/user/{id}', 'Api\PenggunaController@destroy')->name('delete.user');
// });