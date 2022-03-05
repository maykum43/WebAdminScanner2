<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('login','Api\UserController@login');
Route::get('register','Api\UserController@register');
Route::get('rwt_sn','Api\UserController@rwtsn');

Route::get('sn','Api\SnController@index');
Route::get('cari_sn','Api\SnController@cari_sn');
Route::get('create_his','Api\RiwayatController@create_his');
Route::get('update/{id}','Api\CustomerController@update');

Route::post('login','Api\UserController@login');
Route::post('register','Api\UserController@register');
Route::post('cari_sn','Api\SnController@cari_sn');
Route::post('rwt_sn','Api\RiwayatController@his_sn');
Route::post('create_his','Api\RiwayatController@create_his');
Route::post('update/{id}','Api\CustomerController@update');
