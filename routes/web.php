<?php

use App\Http\Controllers\bansController;
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

Route::get('/', 'FamilyController@index')->name('Family.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'NhanvienController@index')->name('dashboard.index');
    Route::get('/nhanvien', 'NhanvienController@quanlynv')->name('dashboard.nhanvien');
    Route::get('/apiNhanvien', 'NhanvienController@APINhanvien')->name('dashboard.getNV');
    Route::get('/apiNhanvien/{id}', 'NhanvienController@APINhanvienID')->name('dashboard.getNVID');
    Route::put('/apiNhanvien/{id}', 'NhanvienController@APIupdateID')->name('dashboard.updateNVID');
    Route::get('/apiNhanvien/{id}/del', 'NhanvienController@APIdelID')->name('dashboard.delNVID');
    Route::group(['prefix' => 'ban_an'], function () {
        Route::get('/', 'BansController@bans')->name('dashboard.bans');
        Route::get('/bans', 'BansController@APIKVbans')->name('dashboard.APIbans');
        Route::post('/createKV', 'BansController@createKVbans')->name('dashboard.createKVbans');
        Route::get('/getKV/{id}', 'BansController@APIgetKVbans')->name('dashboard.APIgetKVbans');
        Route::put('/editKV/{id}', 'BansController@editKVbans')->name('dashboard.editKVbans');
        Route::delete('/delKV/{id}', 'BansController@delKVbans')->name('dashboard.delKVbans');

        // bans
        Route::get('/bans/{idKV}', 'BansController@APIbans')->name('dashboard.APIbans');
        Route::get('/showBans', 'BansController@APIbansAll')->name('dashboard.APIbansAll');
        Route::post('/createBan', 'BansController@createBans')->name('dashboard.createKVbans');
        Route::get('/getBan/{id}', 'BansController@APIgetBans')->name('dashboard.APIgetBans');
        Route::put('/editBan/{id}', 'BansController@editBans')->name('dashboard.editBans');
        Route::delete('/delBan/{id}', 'BansController@delBans')->name('dashboard.delBans');
    });

    Route::group(['prefix' => 'mons'], function () {
        Route::get('/', 'MonController@monsIndex')->name('dashboard.monsIndex');
        Route::get('/monsAPI', 'MonController@monsAPI')->name('dashboard.monsAPI');
        Route::post('/create', 'MonController@createMon')->name('dashboard.createMon');
        Route::get('/monAPI/{id}', 'MonController@getMonAPI')->name('dashboard.getMon');
        Route::put('/editMon/{id}', 'MonController@editMon')->name('dashboard.editMon');
        Route::delete('/delMon/{id}', 'MonController@delMon')->name('dashboard.delMon');
    });

    Route::group(['prefix' => 'ctkm'], function () {
        Route::get('/', 'CTKMController@ctkmIndex')->name('dashboard.ctkmIndex');
        Route::get('/ctkmsAPI', 'CTKMController@ctkmsAPI')->name('dashboard.ctkmsAPI');
        Route::post('/create', 'CTKMController@createCTKM')->name('dashboard.createCTKM');
        Route::get('/ctkmAPI/{id}', 'CTKMController@getCTKMAPI')->name('dashboard.getCTKMAPI');
        Route::put('/editCTKM/{id}', 'CTKMController@editCTKM')->name('dashboard.editCTKM');
        Route::delete('/delCTKM/{id}', 'CTKMController@delCTKM')->name('dashboard.delCTKM');
    });

    Route::group(['prefix' => 'cupon'], function () {
        Route::get('/', 'CuponController@cuponIndex')->name('dashboard.cuponIndex');
        Route::get('/cuponAPI', 'CuponController@cuponAPI')->name('dashboard.cuponAPI');
        Route::post('/create', 'CuponController@createCupon')->name('dashboard.createCupon');
        Route::get('/cuponAPI/{id}', 'CuponController@getCuponAPI')->name('dashboard.getCuponAPI');
        Route::put('/editCupon/{id}', 'CuponController@editCupon')->name('dashboard.editCupon');
        Route::delete('/delCupon/{id}', 'CuponController@delCupon')->name('dashboard.delCupon');
    });

    Route::group(['prefix' => 'bills'], function () {
        Route::get('/', 'BillController@index')->name('dashboard.bill');
        Route::get('/billsAPI', 'BillController@billsAPI')->name('dashboard.billsAPI');
        Route::get('/getBillsAPI/{id}', 'BillController@getBillsAPI')->name('dashboard.getBillsAPI');
        Route::get('/getBillDay', 'BillController@getBillDay')->name('dashboard.getBillDay');
    });

});

Route::group(['prefix' => 'family'], function () {
    Route::get('/', 'FamilyController@index')->name('Family.index');
    Route::get('/order', 'FamilyController@order')->name('Family.order');
    Route::get('/hoaDonAPI/{id_bans}', 'FamilyController@hoaDonAPI')->name('Family.hoaDonAPI');
    Route::delete('/delCTHD/{id}', 'FamilyController@delCTHD')->name('Family.delCTHD');
    Route::put('/updateCTHD/{id}', 'FamilyController@updateCTHD')->name('Family.updateCTHD');
    Route::post('/addCTHD', 'FamilyController@addCTHD')->name('Family.addCTHD');
    Route::delete('/pay/{id}', 'FamilyController@thanhtoan')->name('Family.thanhtoan');
});
