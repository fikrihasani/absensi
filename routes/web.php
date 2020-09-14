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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/absensi', 'AbsensiController@index');
Route::get('/absensi/add/{id_kegiatan}', 'AbsensiController@add');
Route::get('/kegiatan/add', 'KegiatanController@add');
Route::get('/kegiatan', 'KegiatanController@index');
Route::get('/absensi/list/{id}', 'AbsensiController@list');
// Route::get('/')

// Post form data
Route::post('/absensi/store', 'AbsensiController@store');

Route::post('/kegiatan/add', [
    'uses' => 'KegiatanController@store',
    'as' => 'kegiatan.store'
]);
