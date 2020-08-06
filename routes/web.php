<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'NhanvienController@index')->name('dashboard.index');
    Route::get('/nhanvien', 'NhanvienController@quanlynv')->name('dashboard.nhanvien');
    Route::get('/apiNhanvien', 'NhanvienController@APINhanvien')->name('dashboard.getNV');
    Route::post('/apiNhanvien/dangki', 'NhanvienController@dangki')->name('dashboard.dangki');

});
