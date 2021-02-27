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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin','AdminController@login');
Route::get('/Dashboard','AdminController@Dashboard');
Route::match(['get','post'],'/Product','AdminController@Product');
Route::match(['get','post'],'/VendorReg','AdminController@VendorReg');
Route::match(['get','post'],'/EditProduct/{id}','AdminController@EditProduct');

Route::match(['get','post'],'/EditCategory/{id}','AdminController@EditCategory');

Route::match(['get','post'],'/DeleteCategory/{id}','AdminController@DeleteCategory');


Route::match(['get','post'],'/Edittype/{id}','AdminController@Edittype');

Route::match(['get','post'],'/DeleteType/{id}','AdminController@DeleteType');
Route::post('/UpdateType','AdminController@UpdateType');

Route::match(['get','post'],'/DeleteProduct/{id}','AdminController@DeleteProduct');
Route::match(['get','post'],'/DeleteNotification/{id}','AdminController@DeleteNotification');



Route::post('/UpdateCategory','AdminController@UpdateCategory');
Route::post('/viewdis','AdminController@viewdis');
Route::post('/viewcomment','AdminController@viewcomment');

Route::get('/AdminLogout','AdminController@AdminLogout');


Route::post('/UpdateProduct','AdminController@UpdateProduct');
Route::post('/UpdateProductOffer','AdminController@UpdateProductOffer');

Route::post('/UpdateProductcomment','AdminController@UpdateProductcomment');

Route::get('/ManageUser','AdminController@ManageUser');


Route::match(['get','post'],'/AddVendor','AdminController@CreateVendor');
Route::match(['get','post'],'/CreateNotification','AdminController@CreateNotification');
Route::get('/ManageNotification','AdminController@ManageNotification');

Route::get('/ManageProduct','AdminController@ManageProduct');
Route::get('/ManageOrder/{id}','AdminController@ManageOrder');

Route::match(['get','post'],'/CreateReturnReason','AdminController@CreateReturnReason');
Route::get('/ManageReturnReason','AdminController@ManageReturnReason');
Route::match(['get','post'],'/EditReturnres/{id}','AdminController@EditReturnres');
Route::match(['get','post'],'/DeleteReturnres/{id}','AdminController@DeleteReturnres');

Route::match(['get','post'],'/CreateCoupon','AdminController@CreateCoupon');
Route::get('/ManageCoupon','AdminController@ManageCoupon');
Route::match(['get','post'],'/EditCoupon/{id}','AdminController@EditCoupon');
Route::match(['get','post'],'/DeleteCoupon/{id}','AdminController@DeleteCoupon');

Route::match(['get','post'],'/CreateFilter','AdminController@CreateFilter');
Route::get('/ManageFilter','AdminController@ManageFilter');
Route::match(['get','post'],'/EditFilter/{id}','AdminController@EditFilter');
Route::match(['get','post'],'/DeleteFilter/{id}','AdminController@DeleteFilter');

Route::match(['get','post'],'/CreateCancelReason','AdminController@CreateCancelReason');
Route::get('/ManageCancelReason','AdminController@ManageCancelReason');
Route::match(['get','post'],'/EditCancelres/{id}','AdminController@EditCancelres');
Route::match(['get','post'],'/DeleteCancelres/{id}','AdminController@DeleteCancelres');

Route::get('/ManageSupport','AdminController@ManageSupport');
Route::get('/ManageGst','AdminController@ManageGst');

Route::get('/ManageSale','AdminController@ManageSale');
Route::get('/ManageReturn','AdminController@ManageReturn');
Route::get('/ManagePayment','AdminController@ManagePayment');
Route::get('/ManageOffers','AdminController@ManageOffers');
Route::get('/AddOffers','AdminController@AddOffers');
Route::post('/ProductCreate','AdminController@ProductCreate');

Route::match(['get','post'],'/Brand','AdminController@Brand');
Route::get('/ManageBrand','AdminController@ManageBrand');
Route::match(['get','post'],'/EditBrand/{id}','AdminController@EditBrand');
Route::match(['get','post'],'/DeleteBrand/{id}','AdminController@DeleteBrand');
Route::post('/UpdateBrand','AdminController@UpdateBrand');

Route::post('/UpdateCoupon','AdminController@UpdateCoupon');

Route::post('/viewcategory','AdminController@viewcategory');

Route::match(['get','post'],'/Region','AdminController@Region');
Route::match(['get','post'],'/brandstatus','AdminController@Brandstatus');
Route::match(['get','post'],'/productstatus','AdminController@productstatus');
Route::get('/ManageRegion','AdminController@ManageRegion');
Route::match(['get','post'],'/EditRegion/{id}','AdminController@EditRegion');

Route::match(['get','post'],'/Unit','AdminController@Unit');
Route::get('/ManageUnit','AdminController@ManageUnit');
Route::match(['get','post'],'/EditUnit/{id}','AdminController@EditUnit');
Route::post('/UpdateUnit','AdminController@UpdateUnit');

Route::match(['get','post'],'/TopSeller','AdminController@BestSellers');

Route::match(['get','post'],'/Addgst','AdminController@Addgst');
Route::match(['get','post'],'/updateminorder','AdminController@updateminorder');

Route::match(['get','post'],'/Slider','AdminController@Slider');
Route::get('/ManageSlider','AdminController@ManageSlider');
Route::match(['get','post'],'/DeleteSlider/{id}','AdminController@DeleteSlider');

Route::match(['get','post'],'/DeleteRegion/{id}','AdminController@DeleteRegion');
Route::post('/UpdateRegion','AdminController@UpdateRegion');


Route::match(['get','post'],'/Category','AdminController@Category');
Route::get('/ManageCategory','AdminController@ManageCategory');

Route::match(['get','post'],'/testType','AdminController@testType');
Route::get('/Managetesttype','AdminController@Managetesttype');

Route::match(['get','post'],'/CreateVendor','AdminController@CreateVendor');
Route::get('/ManageVendor','AdminController@ManageVendor');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* vender */
Route::get('/vender','VenderController@login');

Route::match(['get','post'],'/VendorProduct','VenderController@Product');
Route::match(['get','post'],'/VendorDeleteProduct/{id}','VenderController@DeleteProduct');
Route::match(['get','post'],'/vendorEditProduct/{id}','VenderController@EditProduct');
Route::post('/vendorviewdis','VenderController@viewdis');


Route::post('/viewVendor','AdminController@viewVendor');

Route::get('/VendorLogout','VenderController@VendorLogout');


// Route::get('/VendorDashboard','VenderController@Dashboard');
Route::match(['get','post'],'/VendorDashboard','VenderController@Dashboard');


Route::match(['get','post'],'/VendorProduct','VenderController@Product');
Route::get('/VendorManageProduct','VenderController@ManageProduct');
Route::get('/VendorManageOrder','VenderController@ManageOrder');
Route::get('/VendorManageSale','VenderController@ManageSale');
Route::get('/VendorManageReturn','VenderController@ManageReturn');
Route::get('/VendorManagePayment','VenderController@ManagePayment');




Route::post('/refresh','HomeController@refresh')->name('refresh');
