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
    return view('index');
});

Auth::routes();

// Admin
Route::get('/dashboardadmin', 'App\Http\Controllers\HomeController@index')->name('dashboardadmin');
Route::get('/skripsimahasiswaAdmin', 'App\Http\Controllers\SkripsiController@index');
Route::get('/jadwalBimbinganAdmin', 'App\Http\Controllers\JadwalController@index');
Route::put('dosen/update/{id}','App\Http\Controllers\JadwalController@updatedosen');

// Dosen
Route::get('/dashboard', 'App\Http\Controllers\HomeController@indexdosen')->name('dashboarddosen');
Route::get('/jadwalku','App\Http\Controllers\JadwalController@indexdosen');
Route::put('telegram/update/{id}','App\Http\Controllers\JadwalController@updatetelegram');
Route::get('skripsiacc','App\Http\Controllers\SkripsiController@skripsiacc');
Route::get('/skripsimahasiswa','App\Http\Controllers\SkripsiController@indexdosen');
Route::put('catatan/tambah/{id}','App\Http\Controllers\SkripsiController@catatandosen');

// Mahasiswa
Route::get('/dashboardUser', 'App\Http\Controllers\HomeController@indexmahasiswa')->name('dashboardmahasiswa');
Route::get('/jadwalmahasiswa', 'App\Http\Controllers\JadwalController@jadwalmahasiswa');
Route::get('/skripsiku', 'App\Http\Controllers\SkripsiController@skripsimahasiswa');
Route::get('/skripsikuAcc', 'App\Http\Controllers\SkripsiController@skripsikuAcc');
Route::post('skripsiku/create','App\Http\Controllers\SkripsiController@create');



