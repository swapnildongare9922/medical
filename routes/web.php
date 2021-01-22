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

Route::get('/admin/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
    Route::get('/countries','Admin\CountryController@index')->name('countries');
    Route::post('/countries','Admin\CountryController@storeCountry');
    Route::get('/home/country/update/{slug}','Admin\CountryController@getUpdateCountry');
    Route::post('/home/country/update/{slug}','Admin\CountryController@updateCountry');
    Route::get('/home/country/delete/{slug}','Admin\CountryController@deleteCountry');
});

Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
    Route::get('/home/states','Admin\StateController@index')->name('states');
    Route::post('/home/states','Admin\StateController@insertState');
    Route::get('/home/state/update/{slug}','Admin\StateController@getUpdatetState');
    Route::post('/home/state/update/{slug}','Admin\StateController@updateState');
    Route::get('/home/state/delete/{slug}','Admin\StateController@deletetState');
});

Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
    Route::get('/home/districts','Admin\DistrictController@index')->name('districts');
    Route::post('/home/districts','Admin\DistrictController@insertDistrict');
    Route::get('/home/district/update/{slug}','Admin\DistrictController@getUpdateDistrict');
    Route::post('/home/district/update/{slug}','Admin\DistrictController@updateDistrict');
    Route::get('/home/district/delete/{slug}','Admin\DistrictController@deletetDistrict');
});

Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
    Route::get('/home/areas','Admin\AreaController@index')->name('areas');
    Route::post('/home/areas','Admin\AreaController@insertArea');
    Route::get('/home/area/update/{slug}','Admin\AreaController@getUpdateArea');
    Route::post('/home/area/update/{slug}','Admin\AreaController@updateArea');
    Route::get('/home/area/delete/{slug}','Admin\AreaController@deleteArea');
});

Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
    Route::get('/home/users','Admin\UserController@getUsers')->name('users');
    Route::get('/home/user/active/{id}','Admin\UserController@activeUser');
    Route::get('/home/user/inactive/{id}','Admin\UserController@inactiveUser');
    Route::get('/home/email',function(){
        return view('email.activateUser');
    });
});
