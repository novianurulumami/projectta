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

Route::get('/home1', function(){
    return view('admin.index');
    }); 

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/datasiswa', 'DataSiswaController@index')->name('datasiswa');
Route::get('/jurnalumum', 'JurnalUmumController@index')->name('jurnalumum');
Route::get('/laporan', 'LaporanController@index')->name('laporan');
Route::get('/keterampilan', 'KeterampilanController@index')->name('keterampilan');
Route::get('/keluar', 'KeluarController@index')->name('keluar');
