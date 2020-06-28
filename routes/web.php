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

Route::get('/home', 'AdminUsersController@index')->name('home');
Route::get('/tambah', 'TambahDataSiswaController@index')->name('tambah');
Route::get('/tambahjurusan', 'TambahDataKelasController@index')->name('tambahjurusan');
Route::get('/tambahkelas', 'TambahDataKelasController@index')->name('tambahkelas');
Route::get('/cari', 'DataSiswaController@cari')->name('cari');
Route::get('/editdata/{id}/edit', 'TambahDataSiswaController@edit')->name('editdata');
Route::get('/hapusdata/{id}/delete', 'TambahDataSiswaController@delete')->name('hapusdata');
Route::get('/detaildatasiswa/{id}/detail', 'TambahDataSiswaController@show')->name('detaildatasiswa');
Route::get('/editnilai/{id}/edit', 'KeterampilanController@edit')->name('editnilai');
Route::get('/updatenilaiketerampilan', 'KeterampilanController@index')->name('updatenilaiketerampilan');
Route::get('/hapusnilai/{id}/delete', 'KeterampilanController@delete')->name('hapusnilai');


Route::post('/tambahdata', 'TambahDataSiswaController@create')->name('tambahdata');
Route::post('/tambahdatajurusan', 'TambahDataKelasController@create')->name('tambahdatajurusan');
Route::post('/tambahdataangka', 'TambahDataKelasController@create1')->name('tambahdataangka');
Route::post('/updatedata/{id}/update', 'TambahDataSiswaController@update')->name('updatedata');
Route::post('/updatenilai/{id}/update', 'KeterampilanController@update')->name('updatenilai');


    Route::resource('dashboard', 'DashboardController');
    Route::resource('datasiswa', 'DataSiswaController');
    Route::resource('laporan', 'LaporanController');
    Route::resource('jurnalumum', 'JurnalUmumController');
    Route::resource('keterampilan', 'KeterampilanController');
    Route::resource('keluar', 'KeluarController');
    Route::resource('datakelas', 'EditDataKelasController');
    Route::resource('import', 'ImportController');
    Route::resource('export', 'ExportController');
    Route::resource('setoran', 'SetoranController');
    Route::resource('penarikan', 'PenarikanController');
    Route::resource('setorancetak', 'SetoranCetakController');
    Route::resource('penarikancetak', 'PenarikanCetakController');
    

