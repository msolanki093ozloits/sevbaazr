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
Route::get('/rocketshipit-test', function () {
    $rs = new \RocketShipIt\RocketShipIt();
    $rs->apiKey = 'YOUR RocketShipIt API KEY HERE';
    $response = $rs->request(
    array(
      'carrier' => 'UPS',
      'action' => 'Track',
      'params' => 
      array(
        'username' => 'YOUR UPS USERNAME',
        'password' => 'YOUR UPS PASSWORD',
        'key' => 'YOUR UPS API KEY',
        'tracking_number' => '1Z12345E0205271688', // this is a test tracking number
        'test' => true // set to false to use production UPS servers
      ),
    ));
    echo '<pre>'. print_r($response, true). '</pre>';
});
Route::get('/calculateDeliveryCharge','Api\v1\ApiController@calculateDeliveryCharge')->name('api.calculateDeliveryCharge');
Route::post('/OrderDetails','Api\v1\ApiController@OrderDetails')->name('api.OrderDetails');
Route::post('/CartDesc','Api\v1\ApiController@CartDesc')->name('api.CartDesc');
Route::any('/webhook/order-tracking', 'Api\v1\ApiController@webHookStatus');

Route::post('/v1/check-service-ability','Api\v1\ApiController@getCheckServiceability');
Route::post('/v1/send-request-ship-rocket','Api\v1\ApiController@canAbleToGetThePickupLocations');
//Route::post('/v1/shiprocket','Api\v1\ApiController@getShiprocket');
Route::middleware('auth:api')->prefix('v1')->group(function(){

	Route::post('/profile','Api\v1\ApiController@profile')->name('api.profile');
Route::post('/RemoveNotification','Api\v1\ApiController@RemoveNotification')->name('api.RemoveNotification');
	Route::post('/Category','Api\v1\ApiController@Category')->name('api.Category');
	Route::post('/Region','Api\v1\ApiController@Region')->name('api.Region');
	Route::post('/Brand','Api\v1\ApiController@Brand')->name('api.Brand');
	Route::post('/RatingProduct','Api\v1\ApiController@RatingProduct')->name('api.RatingProduct');
Route::post('/BannerRegion','Api\v1\ApiController@BannerRegion')->name('api.BannerRegion');
Route::post('/Banneroffers','Api\v1\ApiController@Banneroffers')->name('api.Banneroffers');	
	Route::post('/AddToCartcount','Api\v1\ApiController@AddToCartcount')->name('api.AddToCartcount');
	
	Route::post('/Weight','Api\v1\ApiController@Weight')->name('api.Weight');
	Route::post('/testType','Api\v1\ApiController@testType')->name('api.testType');
	Route::post('/filter','Api\v1\ApiController@filter')->name('api.filter');
      Route::post('/Changeaddress','Api\v1\ApiController@Changeaddress')->name('api.Changeaddress');
	
	Route::post('/Coupon','Api\v1\ApiController@Coupon')->name('api.Coupon');
		Route::post('/Productnew','Api\v1\ApiController@Productnew')->name('api.Productnew');
			Route::post('/ProductAll','Api\v1\ApiController@ProductAll')->name('api.ProductAll');
			
			Route::post('/TopratedAll','Api\v1\ApiController@TopratedAll')->name('api.TopratedAll');
			
				Route::post('/Updatetorder','Api\v1\ApiController@Updatetorder')->name('api.Updatetorder');
				Route::post('/couponcodechek','Api\v1\ApiController@couponcodechek')->name('api.couponcodechek');
	
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
		Route::post('/Buynow','Api\v1\ApiController@Buynow')->name('api.Buynow');
		
		Route::post('/Updatebuynow','Api\v1\ApiController@Updatebuynow')->name('api.Updatebuynow');
		
			Route::post('/checkoutBuynow','Api\v1\ApiController@checkoutBuynow')->name('api.checkoutBuynow');
	
		Route::post('/UpdateCart','Api\v1\ApiController@UpdateCart')->name('api.UpdateCart');
		Route::post('/DeleteCart','Api\v1\ApiController@DeleteCart')->name('api.DeleteCart');
			Route::post('/CartDesc','Api\v1\ApiController@CartDesc')->name('api.CartDesc');
	
	Route::post('/ProductBrand','Api\v1\ApiController@ProductBrand')->name('api.ProductBrand');
	
 Route::post('/Signup','Api\v1\ApiController@Signup')->name('api.Signup');
  Route::post('/Login','Api\v1\ApiController@Login')->name('api.Login');
  
  Route::post('/Slider','Api\v1\ApiController@Slider')->name('api.Slider');
  
  	Route::post('/ProductCategory','Api\v1\ApiController@ProductCategory')->name('api.ProductCategory');
  	
  	Route::post('/ProductRegion','Api\v1\ApiController@ProductRegion')->name('api.ProductRegion');
  		//Route::post('/Pincodecheck','Api\v1\ApiController@Pincodecheck')->name('api.Pincodecheck');
  		Route::post('/Pincodecheck','Api\v1\ApiController@getCheckServiceability')->name('api.Pincodecheck');
  		
  		
  		Route::post('/trackorder','Api\v1\ApiController@trackorder')->name('api.trackorder');
  		
  		Route::post('/Createorder','Api\v1\ApiController@Createorder')->name('api.Createorder');
  		
  		Route::post('/AddAddress','Api\v1\ApiController@AddAddress')->name('api.AddAddress');
  			Route::post('/userAddress','Api\v1\ApiController@userAddress')->name('api.userAddress');
  			Route::post('/checkout','Api\v1\ApiController@checkout')->name('api.checkout');
  			
  			Route::post('/updatetxn','Api\v1\ApiController@updatetxn')->name('api.updatetxn');
  			Route::post('/genrateFcm_id','Api\v1\ApiController@genrateFcm_id')->name('api.genrateFcm_id');
  				Route::post('/AllOffer','Api\v1\ApiController@AllOffer')->name('api.AllOffer');
  				Route::post('/Support','Api\v1\ApiController@Support')->name('api.Support');
  				
  			
  	


});
