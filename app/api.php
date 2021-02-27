<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->prefix('v1')->group(function(){

	Route::post('/profile','Api\v1\ApiController@profile')->name('api.profile');
	Route::post('/Category','Api\v1\ApiController@Category')->name('api.Category');
	Route::post('/Region','Api\v1\ApiController@Region')->name('api.Region');
	Route::post('/Brand','Api\v1\ApiController@Brand')->name('api.Brand');
	
	Route::post('/Weight','Api\v1\ApiController@Weight')->name('api.Weight');
	Route::post('/testType','Api\v1\ApiController@testType')->name('api.testType');
	Route::post('/filter','Api\v1\ApiController@filter')->name('api.filter');
	
	Route::post('/Coupon','Api\v1\ApiController@Coupon')->name('api.Coupon');
	
	Route::post('/Commondata','Api\v1\ApiController@Commondata')->name('api.Commondata');
	
	Route::post('/CancelReason','Api\v1\ApiController@CancelReason')->name('api.CancelReason');
	Route::post('/ReturnReason','Api\v1\ApiController@ReturnReason')->name('api.ReturnReason');
		Route::post('/CategoryLatestOffer','Api\v1\ApiController@CategoryLatestOffer')->name('api.CategoryLatestOffer');
	
		Route::post('/Favourites','Api\v1\ApiController@Favourites')->name('api.Favourites');
			Route::post('/OfferFavouritesList','Api\v1\ApiController@OfferFavouritesList')->name('api.OfferFavouritesList');
			Route::post('/Recentview','Api\v1\ApiController@Recentview')->name('api.Recentview');
		
		Route::post('/FavouritesList','Api\v1\ApiController@FavouritesList')->name('api.FavouritesList');
			Route::post('/DeleteAddress','Api\v1\ApiController@DeleteAddress')->name('api.DeleteAddress');
		
			Route::post('/UpdateProfile','Api\v1\ApiController@UpdateProfile')->name('api.UpdateProfile');
			
				Route::post('/Searchproduct','Api\v1\ApiController@Searchproduct')->name('api.Searchproduct');
			
	Route::post('/Userprofile','Api\v1\ApiController@Userprofile')->name('api.Userprofile');
		Route::post('/ReturnOrder','Api\v1\ApiController@ReturnOrder')->name('api.ReturnOrder');
	Route::post('/CancelOrder','Api\v1\ApiController@CancelOrder')->name('api.CancelOrder');
		Route::post('/OrderDetails','Api\v1\ApiController@OrderDetails')->name('api.OrderDetails');
	Route::post('/OrderHistory','Api\v1\ApiController@OrderHistory')->name('api.OrderHistory');
	
	Route::post('/Notification','Api\v1\ApiController@Notification')->name('api.Notification');
	Route::post('/Socialregister','Api\v1\ApiController@Socialregister')->name('api.Socialregister');
	
	Route::post('/LatestOffer','Api\v1\ApiController@LatestOffer')->name('api.LatestOffer');
	Route::post('/BestSellers','Api\v1\ApiController@BestSellers')->name('api.BestSellers');
	
	Route::post('/SimilarProduct','Api\v1\ApiController@SimilarProduct')->name('api.SimilarProduct');
	
		Route::post('/ProductDesc','Api\v1\ApiController@ProductDesc')->name('api.ProductDesc');
		
	Route::post('/AddToCart','Api\v1\ApiController@AddToCart')->name('api.AddToCart');
		Route::post('/UpdateCart','Api\v1\ApiController@UpdateCart')->name('api.UpdateCart');
		Route::post('/DeleteCart','Api\v1\ApiController@DeleteCart')->name('api.DeleteCart');
			Route::post('/CartDesc','Api\v1\ApiController@CartDesc')->name('api.CartDesc');
	
	Route::post('/ProductBrand','Api\v1\ApiController@ProductBrand')->name('api.ProductBrand');
	
 Route::post('/Signup','Api\v1\ApiController@Signup')->name('api.Signup');
  Route::post('/Login','Api\v1\ApiController@Login')->name('api.Login');
  
  Route::post('/Slider','Api\v1\ApiController@Slider')->name('api.Slider');
  
  	Route::post('/ProductCategory','Api\v1\ApiController@ProductCategory')->name('api.ProductCategory');
  	
  	Route::post('/ProductRegion','Api\v1\ApiController@ProductRegion')->name('api.ProductRegion');
  		Route::post('/Pincodecheck','Api\v1\ApiController@Pincodecheck')->name('api.Pincodecheck');
  		
  		Route::post('/AddAddress','Api\v1\ApiController@AddAddress')->name('api.AddAddress');
  			Route::post('/userAddress','Api\v1\ApiController@userAddress')->name('api.userAddress');
  			Route::post('/checkout','Api\v1\ApiController@checkout')->name('api.checkout');
  			
  			Route::post('/updatetxn','Api\v1\ApiController@updatetxn')->name('api.updatetxn');
  			Route::post('/genrateFcm_id','Api\v1\ApiController@genrateFcm_id')->name('api.genrateFcm_id');
  				Route::post('/AllOffer','Api\v1\ApiController@AllOffer')->name('api.AllOffer');
  				Route::post('/Support','Api\v1\ApiController@Support')->name('api.Support');
  				
  			
  	


});
