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
Route::get('/',function(){
    return "hello";
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

Route::get('/login','AuthenticationController@login');
Route::get('/logout','AuthenticationController@logout');
Route::get('/register','AuthenticationController@register');
Route::post('/store','AuthenticationController@store');
Route::post('/auth','AuthenticationController@authenticate');
Route::get('/admin','AdminController@index');