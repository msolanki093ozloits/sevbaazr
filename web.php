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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();*/



Route::get('/clear-cache', function() {
	//dd(bcrypt('123456'));
    //Artisan::call('storage:link');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    return "Cache is cleared";
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/privacypolicy', function () {
    return view('privacypolicy');
});


Route::get('/support', function () {
    return view('support');
});

Route::match(['get','post'],'/Product','AdminController@Product');
Route::match(['get','post'],'/VendorReg','AdminController@VendorReg');

