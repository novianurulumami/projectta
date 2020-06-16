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
Route::get('/cari', 'DataSiswaController@cari')->name('cari');
Route::post('/tambahdata', 'TambahDataSiswaController@create')->name('tambahdata');
   

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
    

