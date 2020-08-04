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
Route::get('/tambahharian', 'LaporanHarianController@index')->name('tambahharian');
Route::get('/importberhasil', 'ImportController@index')->name('importberhasil');
Route::get('/tambahjurusan', 'TambahDataKelasController@index')->name('tambahjurusan');
Route::get('/tambahkelas', 'TambahDataKelasController@index')->name('tambahkelas');
Route::get('/caridatakelas', 'EditDataKelasController@index')->name('caridatakelas');
Route::get('/cariketerampilan', 'KeterampilanController@index')->name('cariketerampilan');
Route::get('/cari', 'DataSiswaController@cari')->name('cari');
Route::get('/editdata/{id}/edit', 'TambahDataSiswaController@edit')->name('editdata');
Route::get('/hapusdata/{id}/delete', 'TambahDataSiswaController@delete')->name('hapusdata');
Route::get('/detaildatasiswa/{id}/detail', 'TambahDataSiswaController@show')->name('detaildatasiswa');
Route::get('/editnilai/{id}/edit', 'KeterampilanController@edit')->name('editnilai');
Route::get('/updatenilaiketerampilan', 'KeterampilanController@index')->name('updatenilaiketerampilan');
Route::get('/hapusnilai/{id}/delete', 'KeterampilanController@delete')->name('hapusnilai');
Route::get('exportdata', 'ExportController@export_excel')->name('exportdata');
Route::get('cetakketerampilan', 'KeterampilanController@cetak_pdf')->name('cetakketerampilan');
Route::get('cetakdetailsaldo/{id}/cetakdetailsaldo', 'DataSiswaController@cetak_pdfsaldo')->name('cetakdetailsaldo');

Route::get('/setoraninput', 'SetoranController@index')->name('setoraninput');
Route::get('/filter', 'DataSiswaController@datatables')->name('filter');
Route::get('/transaksicetak', 'SetoranController@create')->name('transaksicetak');
Route::get('/carilaporan', 'LaporanController@index')->name('carilaporan');
Route::get('/carilaporanharian', 'LaporanHarianController@index')->name('carilaporanharian');
Route::get('/carilaporanseluruh', 'LaporanSeluruhController@index')->name('carilaporanseluruh');
Route::get('/caridatajurnal', 'JurnalUmumController@index')->name('caridatajurnal');
Route::get('/detailsaldosiswa/{id}/detailsaldo', 'DataSiswaController@show')->name('detailsaldosiswa');
Route::get('/detailtransaksisiswa/{id}/detailtransaksi', 'DetailTransaksiController@show')->name('detailtransaksi');

Route::post('cetaklaporan', 'LaporanController@cetak_pdflaporan')->name('cetaklaporan');
Route::post('cetakjurnal', 'JurnalUmumController@cetak_pdflaporan')->name('cetakjurnal');
Route::post('/tambahdata', 'TambahDataSiswaController@create')->name('tambahdata');
Route::post('/tambahsaldoharian', 'LaporanHarianController@create')->name('tambahsaldoharian');
Route::post('/importdatasiswa', 'ImportController@import_excel')->name('importdatasiswa');
Route::post('/tambahdatajurusan', 'TambahDataKelasController@create')->name('tambahdatajurusan');
Route::post('/tambahdataangka', 'TambahDataKelasController@create1')->name('tambahdataangka');
Route::post('/tambahdatatahun', 'TambahDataKelasController@create2')->name('tambahdatatahun');
Route::post('/updatedata/{id}/update', 'TambahDataSiswaController@update')->name('updatedata');
Route::post('/updatenilai/{id}/update', 'KeterampilanController@update')->name('updatenilai');
Route::post('datakelasUpdate', 'EditDataKelasController@updateKelas')->name('datakelasUpdate');



    Route::resource('dashboard', 'DashboardController');
    Route::resource('tambahdatasiswa', 'TambahDataSiswaController');
    Route::resource('datasiswa', 'DataSiswaController');
    Route::resource('laporanharian', 'LaporanHarianController');
    Route::resource('laporanseluruh', 'LaporanSeluruhController');
    Route::resource('laporan', 'LaporanController');
    Route::resource('jurnalumum', 'JurnalUmumController');
    Route::resource('keterampilan', 'KeterampilanController');
    Route::resource('keluar', 'KeluarController');
    Route::resource('datakelas', 'EditDataKelasController');
    Route::resource('import', 'ImportController');
    Route::resource('export', 'ExportController');
    Route::resource('setoran', 'SetoranController');
    Route::resource('detailtransaksisiswa', 'DetailTransaksiController');
    Route::resource('penarikan', 'PenarikanController');
    Route::resource('cetak', 'SetoranCetakController');
    Route::resource('restore', 'RestoreDataController');
    Route::resource('backup', 'BackupDataController');
    Route::resource('penarikancetak', 'PenarikanCetakController');
    

