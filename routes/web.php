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
    return view('frontend.index');
});



Route::get('/object','FrontendController@object')->name('object');
Route::get('/adminHome','FrontendController@adminHome')->name('adminHome');
Route::get('/roomSearch','FrontendController@roomSearch')->name('roomSearch');
