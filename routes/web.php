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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

//index
Route::get('/', 'HomeController@index')->name('home');
Route::get('/customer', 'CustomerController@index')->name('customer');
Route::get('/sn', 'SNController@index')->name('sn');
Route::get('/snAktif', 'SNController@indexAktif')->name('sn_aktif');
Route::get('/rwt', 'RwtSNController@index')->name('rwtsn');

//create
Route::get('/create_sn', 'SNController@create')->name('create_sn');
Route::post('/simpan_sn', 'SNController@simpan')->name('simpan_sn');
Route::get('/create_us', 'CustomerController@create')->name('create_us');
Route::post('/simpan_us', 'CustomerController@simpan')->name('simpan_us');
Route::get('/create_riw', 'RWTSNController@create')->name('create_riw');
Route::post('/simpan_riw', 'RWTSNController@simpan')->name('simpan_riw');

//export
Route::post('/import', 'SNController@store')->name('import_sn');

//edit
Route::get('/edit_sn/{id}', 'SNController@edit')->name('edit_sn');
Route::post('/update_sn/{id}','SNController@update')->name('update_sn');
Route::get('/edit_riw/{id_rwsn}','RWTSNController@edit')->name('edit_riw');
Route::post('/update_riw/{id}','RWTSNController@update')->name('update_riw');
Route::get('/edit_user/{id}','CustomerController@edit')->name('edit_user');
Route::post('/update_user/{id}','CustomerController@update')->name('update_user');

//rubah status
Route::get('/ubahstatus/{id_rwsn}', 'RWTSNController@UpdateSelesai')->name('update_status');

//delete
Route::get('/deleteSn/{id}', 'SNController@softDelete')->name('delete_sn');
Route::get('/deleteRiw/{id_rwsn}', 'RWTSNController@softDelete')->name('delete_riw');
Route::get('/deleteUsr/{id}', 'CustomerController@softDelete')->name('delete_user');
Route::get('/HdeleteUsr/{id}', 'CustomerController@hardDelete')->name('Hdelete_user');
Route::get('/HdeleteSn/{id}','SNController@hardDelete')->name('Hdelete_sn');

//search
Route::get('/cari_sn','SNController@cariSN')->name('cari_sn');
Route::get('/cari_user','CustomerController@cariSN')->name('cari_user');


// Route::post('/cari_sn','SNController@cariSN')->name('cari_sn');

Route::resource('/hadiah', 'HadiahController');
Route::resource('/redeemPoin', 'RedeemPoinController');

Route::get('/HdeleteHadiah/{id}','HadiahController@Hdelete')->name('Hdelete_hadiah');
Route::get('/PoinCust', 'HadiahController@viewPoinCust')->name('PoinUser');