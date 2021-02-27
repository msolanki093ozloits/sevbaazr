<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\User;
use App\Brands;
use App\Regions;
use App\Product_category;
use App\Product;
use App\Slider;
use App\Banner;
use App\Banneroffer;
use App\Vendors;
use App\Carts;
use App\Useraddress;
use App\Order;
use App\Gstrate;
use App\Allfcm;
use App\Support;
use App\Notification;
use App\Cancelreason;
use App\Returnreason;
use App\Favourite;
use DB;
use App\Unit;
use App\Tst_type;
use App\Coupon;
use App\Defaultamount;
use Seshac\Shiprocket\Shiprocket;

class ApiController extends Controller
{
    protected $locations;
	
	public function checkdelhiverychargeexp($weight,$ocpin,$pin){
         $url = 'https://track.delhivery.com/api/kinko/v1/invoice/charges/.json?ss=Delivered&md=E&pt=prepaid&o_pin='.$ocpin.'&cgm='.$weight.'&d_pin='.$pin;
	    $method = 'GET';
	    $headers = array(
	        "content-type: application/json",
	        "Authorization: Token 68b28da459650e6d18c17b4d8ae7db874cd83e95"
	    );
	    $curl = curl_init();
	    curl_setopt_array($curl, array(
	        CURLOPT_RETURNTRANSFER => true,
	        CURLOPT_URL => $url,
	        CURLOPT_CUSTOMREQUEST => $method,
	        CURLOPT_HTTPHEADER => $headers,
	    ));
	    $response = curl_exec($curl);
	    $err = curl_error($curl);
	    curl_close($curl);
	    if ($err) {
	    	echo "cURL Error #:" . $err;
	    } else {
	        $result = json_decode($response, true);
	       // print_r($result);
	       // die;
	    }
	    return round($result['0']['total_amount']);
    }
	 public function checkdelhiverycharge($weight,$ocpin,$pin){
         $url = 'https://track.delhivery.com/api/kinko/v1/invoice/charges/.json?ss=Delivered&md=S&pt=prepaid&o_pin='.$ocpin.'&cgm='.$weight.'&d_pin='.$pin;
	    $method = 'GET';
	    $headers = array(
	        "content-type: application/json",
	        "Authorization: Token 8e366d78467cd8b275c102db448e6baa14156462"
	    );
	    $curl = curl_init();
	    curl_setopt_array($curl, array(
	        CURLOPT_RETURNTRANSFER => true,
	        CURLOPT_URL => $url,
	        CURLOPT_CUSTOMREQUEST => $method,
	        CURLOPT_HTTPHEADER => $headers,
	    ));
	    $response = curl_exec($curl);
	    $err = curl_error($curl);
	    curl_close($curl);
	    if ($err) {
	    	echo "cURL Error #:" . $err;
	    } else {
	        $result = json_decode($response, true);
	       // print_r($result);
	       // die;
	    }
	    return round($result['0']['total_amount']);
    }
	
	public function Category(Request $request){
$product=Product_category::get();
     return response()->json(['Status' => '1', 'data' => $product]);
    }
	
   public function Region(Request $request){
$product=Regions::orderBy('region_name', 'asc')->get();
     return response()->json(['Status' => '1', 'data' => $product]);
    }
	 public function Login(Request $request){
        
       
        
        $user = User::where(['Phone'=>$request->Phone,'otp'=>$request->otp])->first();
if ($user === null) {
    
       
           return response()->json(['Status' => '0', 'message' => 'phone or password wrong']);
}else{
      User::where(['id'=>$user['id']])->update(['otp'=>'expire']);
    
    	$product=User::where(['Phone'=>$request->Phone])->first();
    return response()->json(['Status' => '1', 'data' => $product]);
}
      
         
    }
		
  public function Slider(Request $request){
    	$product=Slider::get();
    if (count($product)>0) {
       return response()->json(['Status' => '1', 'data' => $product]);
}else{	
    	return response()->json(['Status' => '0', 'message' => 'No data found']);
}
    }
	
	public function Brand(Request $request){
$product=Brands::where('Brand_status', '=', 1)->orderBy('Brand_lavel', 'asc')->get();
     return response()->json(['Status' => '1', 'data' => $product]);
    
    }
	
	
	 public function Socialregister(Request $request){
        // $productDetails=User::where(['email'=>$request->email])->first();
        // print_r($productDetails);
        // die;
        $user = User::where('Social_id', '=', $request->Social_id)->first();
if ($user === null) {
    $product= new User;
            $data=$request->all();
        $product->name = $request->name;
            $product->email = $request->email;
            $product->Social_id = $request->Social_id;
          $product->save();
           return response()->json(['Status' => '1', 'message'=> 'Successful','data' => $data]);
}else{
   return response()->json(['Status' => '1', 'message'=> 'Successful','data' => $user]);
}
    }
	
	 public function ProductRegion(Request $request){
$product = Brands::where('Brand_city', '=', $request->region_id)->get();
if ($product === null) {
    return response()->json(['Status' => '0', 'message' =>'No Product Found']);
}else{
     $newarry=array();
    	foreach($product as $itm){
    	    $data = array(
                            "Brand_id" => $itm['Brand_id'],
                            "Brand_name" => $itm['Brand_name'],
                            "main_img"    => $itm['main_img'],
                            "Brand_desc"    => $itm['Brand_desc'],
                            "Brand_lavel"    => $itm['Brand_lavel'],
                            "Rating"    => 4,
                        );
    	    array_push($newarry,$data);
    	}
     return response()->json(['Status' => '1', 'data' => $newarry]);
}
     //return UserResource::Collection(Product::find($request->Product()));
    }
	
	public function Userprofile(Request $request){
    if ($product=User::where(['id'=>$request->user_id])->exists()) {
$product=User::where(['id'=>$request->user_id])->first();
       return response()->json(['Status' => '1', 'data' => $product]);
}else{	
    	return response()->json(['Status' => '0', 'message' => 'No data found']);
}
    }
	
	
	public function ProductBrand(Request $request){
$product = Product::where(['Brand_name'=>$request->Brand_id,'product_status'=>1])->orderBy('product_title', 'asc')->get();
if (count($product)==0) {
    return response()->json(['Status' => '0', 'message' =>'No Product Found']);
}else{
	$newarry1=$this->Productdesccom($product,$request->user_id);
     return response()->json(['Status' => '1', 'data' => $newarry1]);
}
    }
	
	public function ProductAll(Request $request){
$product=Product::where(['product_status'=>1])->orderBy('product_id', 'desc')->get();
if (count($product)==0) {
    return response()->json(['Status' => '0', 'message' =>'No Product Found']);
}else{
	$newarry1=$this->Productdesccom($product,$request->user_id);
     return response()->json(['Status' => '1', 'data' => $newarry1]);
}
    }
	
	public function TopratedAll(Request $request){
$product=Product::where(['product_status'=>1])->orderBy('product_rating', 'desc')->get();
if (count($product)==0) {
    return response()->json(['Status' => '0', 'message' =>'No Product Found']);
}else{
	$newarry1=$this->Productdesccom($product,$request->user_id);
     return response()->json(['Status' => '1', 'data' => $newarry1]);
}
    }
	
	public function BestSellers(Request $request){
$product=Brands::orderBy('Brand_lavel', 'asc')->take(6)->get();
    $newarry=array();
    	foreach($product as $itm){
    	    $data = array(
                            "Brand_id" => $itm['Brand_id'],
                            "Brand_name" => $itm['Brand_name'],
                            "main_img"    => $itm['main_img'],
                            "Brand_desc"    => $itm['Brand_desc'],
                            "Brand_lavel"    => $itm['Brand_lavel'],
                            "Rating"    => 4,
                        );
    	    array_push($newarry,$data);
    	}
     return response()->json(['Status' => '1', 'data' => $newarry]);
    
    }
	public function checkout(Request $request){
        $product1= new Order;
       $product=Order::orderBy('ord_id', 'DESC')->first();
    
       $order_nr=$product['ord_id'] + 1;
       	Carts::where(['user_id'=>$request->user_id,'payment_order'=>0,'order_id'=>0])->update(['order_id'=>$order_nr]);
        
       	$cart=Carts::where(['user_id'=>$request->user_id,'payment_order'=>0,'order_id'=>$order_nr])->get();
       	$adrresspin=Useraddress::where(['address_id'=>$request->address_id])->first();
       	$totalamount=Carts::where(['user_id'=>$request->user_id,'payment_order'=>0,'order_id'=>$order_nr])->sum('total_amt');
       	$totalweight=Carts::where(['user_id'=>$request->user_id,'payment_order'=>0,'order_id'=>$order_nr])->sum('product_weight');
       	$totalgst=Carts::where(['user_id'=>$request->user_id,'payment_order'=>0,'order_id'=>$order_nr])->sum('product_deliverych');
       		$gstrate=Gstrate::first();
       
       	$delivery_charge=$totalgst;
       	$product_price=100;
       	$ttlgst=(($totalamount+$delivery_charge)*$gstrate['gstrate'])/100;
       	$grandttl=$totalamount+$delivery_charge+$ttlgst;
       	if($grandttl>=$gstrate['Min_order']){
         $product1->address_id = $request->address_id;
            $product1->order_id = $order_nr;
            $product1->totalamount = $totalamount;
            //$product1->product_price = $product_price;
            $product1->delivery_charge = $delivery_charge;
            $product1->gst_charge = round($ttlgst);
            $product1->user_id = $request->user_id;
            $product1->weight = $totalweight;
            $product1->grandttl = round($grandttl);
            $product1->save();
        return response()->json(['Status' => '1', 'data' => $product1]);
       	}else{
       	    return response()->json(['Status' => '0', 'message' => 'Min amount should be', 'order_min_amount' => $gstrate['Min_order']]);
       	}
   }
   
   public function couponcodechek(Request $request){
    	 $user = Carts::where('cart_id', '=', $request->cart_id)->first();
        $productdetails = Product::where('product_id', '=', $request->product_id)->first();
	     $coupon=Coupon::where(['coupon_code'=>$request->couponcode,'product_id'=>$request->product_id])->first();
	     if (!empty($coupon)) {
	         if(strtotime(date('Y-m-d'))>=strtotime($coupon['start_date']) && strtotime(date('Y-m-d'))<=strtotime($coupon['end_date']) ){
	             $unit=json_decode($productdetails['unit']);
    	    $price=json_decode($productdetails['unitprice']);
    	    $count=0;
    	    foreach($price as $pricitm){
    	        if(!empty($pricitm)){
    	            if($user['Unit']==$unit[$count]){
    	            $unitdet = Unit::where('unit_id', '=', $unit[$count])->First();
    	           $price1= $pricitm;
    	        break;
    	            }
    	          $count++;  
    	        }
    	    }
    	    $disp=($price1*$coupon['dis_percent'])/100;
	             	Carts::where(['cart_id'=>$request->cart_id])->update(['apply_code'=>$request->couponcode,'coupon_price'=>$disp,'price'=>$price1,'dis_price'=>$price1-$price1]);
	             return response()->json(['Status' => '1', 'message' =>'Successful']);
	         }else{
	             return response()->json(['Status' => '0', 'message' =>'Coupon expired']);
	         }
}else{
     return response()->json(['Status' => '0', 'message' =>'No Data Found']);
}
	}
	
	public function OrderHistory(Request $request){
    	$product=Carts::select('order_id')->orderBy('order_id', 'DESC')->where(['user_id'=>$request->user_id])->get();
    if (count($product)>0) {
        $newarry=array();
        foreach($product as $itm){
            if($itm['order_id'] !=0){
            $orderst=Order::where(['order_id'=>$itm['order_id']])->first();
             $totalamount=Carts::where(['order_id'=>$itm['order_id']])->sum('total_amt');
             $deai =Carts::where(['order_id'=>$itm['order_id']])->first();
            
             if($orderst['order_status']==1){
                 $finalst='Booked';
             }
             elseif($orderst['order_status']==2){
                 $finalst='Complete';
             }
             elseif($orderst['order_status']==3){
                 $finalst='Cancel';
             }
             elseif($orderst['order_status']==4){
                 $finalst='Ongoing';
             }
             elseif($orderst['order_status']==5){
                 $finalst='Return';
             }
            	
           $data = array(
                            "order_id" => $itm['order_id'],
                            "waybill" => $orderst['waybill'],
                            "date" => $deai['created_at'],
                            "total_amt"    =>$orderst['grandttl'],
                            "order_status"    =>$finalst,
                        );
    	    array_push($newarry,$data);
        }
        }
       return response()->json(['Status' => '1', 'data' => $newarry]);
}else{	
    	return response()->json(['Status' => '0', 'message' => 'No data found']);
}
    }
	
	public function Searchproduct(Request $request){
$product=Product::orWhere('product_title', 'like', '%' . $request->name . '%')->get();
if (count($product)==0) {
    return response()->json(['Status' => '0', 'message' =>'No Product Found']);
}else{
	$newarry1=$this->Productdesccom($product,$request->user_id);
     return response()->json(['Status' => '1', 'data' => $newarry1]);
}
    }
	
	public function BannerRegion(Request $request){
$product = Banner::where('region_id', '=', $request->region_id)->get();
if (count($product)>0) {
    $newarry=array();
    	    foreach($product as $itm){
    	    $data = array(
                            "banner_id" => $itm['banner_id'],
                            "banner_img" => $itm['banner_img'],
                        );
    	    array_push($newarry,$data);
    	}
     return response()->json(['Status' => '1', 'data' => $newarry]);
}else{
	return response()->json(['Status' => '0', 'message' =>'No Product Found']);
}
    
    }
	
	public function Banneroffers(Request $request){
$product = Banneroffer::get();
if (count($product)>0) {
	 $newarry=array();
    	foreach($product as $itm){
    	    $data = array(
                            "banner_id" => $itm['BannerOffers_id'],
                            "banner_img" => $itm['banner_img'],
                        );
    	    array_push($newarry,$data);
    	}
     return response()->json(['Status' => '1', 'data' => $newarry]);
}else{
	return response()->json(['Status' => '0', 'message' =>'No Product Found']);
}
     
    }
	
	
	public function CategoryLatestOffer(Request $request){
  if($request->category_id!=0){
$product=Product::where(['product_catgory'=>$request->category_id,'product_Offer_status'=>1])->orderBy('product_offerpercent', 'desc')->take(10)->get();
}else{
    $product=Product::where(['product_Offer_status'=>1])->orderBy('product_offerpercent', 'desc')->take(10)->get();
}
if (count($product)==0) {
    return response()->json(['Status' => '0', 'message' =>'No Product Found']);
}else{
	$newarry1=$this->Productdesccom($product,$request->user_id);
     return response()->json(['Status' => '1', 'data' => $newarry1]);
}
    }
	
	public function SimilarProduct(Request $request){
$product1=Product::where('product_id', '=',$request->product_id)->first();
$product=Product::where('product_catgory', '=',$product1['product_catgory'])->orderBy('product_id', 'desc')->take(10)->get();
if (count($product)==0) {
    return response()->json(['Status' => '0', 'message' =>'No Product Found']);
}else{
	$newarry1=$this->Productdesccom($product,$request->user_id);
     return response()->json(['Status' => '1', 'data' => $newarry1]);
}
    }
	
	public function ProductCategory(Request $request){
		if($request->category_id !=0){
$product = Product::where(['product_catgory'=>$request->category_id,'Brand_name'=>$request->Brand_id,'product_status'=>1])->get();
}else{
    $product = Product::where(['product_status'=>1])->get();
}
		
if (count($product)==0) {
    return response()->json(['Status' => '0', 'message' =>'No Product Found']);
}else{
	$newarry1=$this->Productdesccom($product,$request->user_id);
     return response()->json(['Status' => '1', 'data' => $newarry1]);
}
    }
	
	
	
	 public function Signup(Request $request){
        $user = User::where(['Phone'=>$request->Phone])->first();
if ($user === null) {
    $otp=rand(1000,9999);
       $product= new User;
        $product->Phone = $request->Phone;
         $product->otp = $otp;
          $product->save();
          
           $this->sendotp($otp,$request->Phone);
        $product=User::where(['Phone'=>$request->Phone])->first();
           return response()->json(['Status' => '1', 'data' => $product]);
}else{
    $otp=rand(1000,9999);
    User::where(['id'=>$user['id']])->update(['otp'=>$otp]);
    
 $this->sendotp($otp,$user['Phone']);
    	$product=User::where(['Phone'=>$request->Phone])->first();
    return response()->json(['Status' => '1', 'data' => $product]);
}
    }
	
	
	public function sendotp($otp,$Mbl){
		$fotp='your verification code is '.$otp;
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://control.msg91.com/api/sendotp.php?template=1&otp_length=4&authkey=279915Aa6YHmK85cf91065&message=$fotp&sender=SEVBAZ&mobile=$Mbl&otp=$otp&otp_expiry=12",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
	}
	
	
	public function ProductDesc(Request $request){
$product = Product::where('product_id', '=', $request->product_id)->first();
if ($product === null) {
    return response()->json(['Status' => '0', 'message' =>'No Product Found']);
}else{
      $newarry=array();
    	    $newarrywet=array();
    	   $unit=json_decode($product['unit']);
    	    $price=json_decode($product['unitprice']);
    	   
    	     if(!empty($product['product_offerpercent'])){
    	    $pesrce=json_decode($product['product_offerpercent']);
    	    }else{
    	       $pesrce=array(0); 
    	    }
    	  
    	     if(!empty($product['product_priceOffer'])){
    	    $offerst=json_decode($product['product_priceOffer']);
    	    }else{
    	       $offerst=array(""); 
    	    }
    	    $count=0;
    	    foreach($price as $pricitm){
    	        if(!empty($pricitm)){
    	            $unitdet = Unit::where('unit_id', '=', $unit[$count])->First();
    	           
    	            if(in_array($unit[$count], $offerst)){
    	                $b= array_keys($offerst, $unit[$count]);
    	               
    	                $offerpercent=$pesrce[0];
    	                $offerproduct= 1;
    	            }else{
    	                $offerpercent=0;
    	                $offerproduct= 0;
    	            }
    	            if(empty($product['admincoupon'])){
    	                if($offerst['0'] !=0){
    	            $datanew = array(
                            "weight" => $unitdet['Unit'].$unitdet['UnitType'],
                            "price" => round($pricitm),
                            "Disprice" => round($pricitm-(($pricitm*$offerpercent)/100)),
                            "Unit" => $unit[$count],
                            "offerstatus" => 0,
                            "offerproduct" => $offerproduct,
                            "couponcode" => 0,
                            "offerpercent" => $offerpercent,
                        );
    	                }else{
    	                   $datanew = array(
                            "weight" => $unitdet['Unit'].$unitdet['UnitType'],
                            "price" => round($pricitm),
                            "Disprice" => round($pricitm-(($pricitm*$pesrce['0'])/100)),
                            "Unit" => $unit[$count],
                            "offerstatus" => 0,
                            "couponcode" => 0,
                             "offerproduct" => $offerproduct,
                            "offerpercent" => $pesrce['0'],
                        ); 
    	                }
    	            }else{
    	                 $datanew = array(
                            "weight" => $unitdet['Unit'].$unitdet['UnitType'],
                            "price" => round($pricitm),
                            "Disprice" => round($pricitm-(($pricitm*$pesrce['0'])/100)),
                            "Unit" => $unit[$count],
                             "offerproduct" => $offerproduct,
                            "offerstatus" => 1,
                            "couponcode" => $product['admincoupon'],
                            "offerpercent" => $pesrce['0'],
                        );
    	            }
    	             array_push($newarrywet,$datanew);
    	        $count++;
    	        }
    	    }
    	    $productbrand=Brands::where('Brand_id', '=', $product['Brand_name'])->first();
    	    $productfav =Favourite::where(['product_id'=>$product['product_id'],'user_id'=>$request->user_id])->get();
    	      //echo count($productfav);
    	      if (count($productfav)==0) {
    	           $fav_status=0;  
    	      }else{
    	        $fav_status=1;   
    	      }
    	    $productcarts =Carts::where(['product_id'=>$product['product_id'],'user_id'=>$request->user_id,'order_id'=>0])->first();
    	    if(empty($productcarts)){
    	    $cart_status=0;
    	    }else{
    	        $cart_status=1;
    	    }
    	    $data = array(
                            "product_id" => $product['product_id'],
                            "Brand_name" => $productbrand['Brand_name'],
                            "product_ingredients" => $product['product_ingredients'],
                            "product_title"    => $product['product_title'],
                            "weight_price"  => $newarrywet,
                            "product_offerpercent"     => $pesrce['0'],
                            "product_Offer_status"    => $product['product_Offer_status'],
                            "product_about"    => $product['product_about'],
                            "about_seller"    => $product['product_about'],
                            "main_img"    => $product['main_img'],
                            "optional_img"    => $product['optional_img'],
                            "Shelf_Life"    => $product['Shelf_Life'],
                            "product_type"    => $product['product_type'],
                            "Organic"    => $product['Organic'],
                            "Gluten"    => $product['Gluten'],
                            "Peanut"    => $product['Peanut'],
                            "Licence"    => $product['Licence'],
                            "Lactose"    => $product['Lactose'],
                            "Nutritional"    => $product['Nutritional'],
                            "Temperature"    => $product['Temperature'],
                            "product_date"    => $product['product_date'],
                            "product_month"    => $product['product_month'],
                            "product_year"    => $product['product_year'],
                            "fav_status"    => $fav_status,
                            "cart_status"    => $cart_status,
                        );
    	    array_push($newarry,$data);
    	 return response()->json(['Status' => '1', 'data' => $newarry]);
}
    }
	
	
	public function Productdesccom($product,$user_id){
		$newarry=array();
    	foreach($product as $itm){
    	      
    	    $newarrywet=array();
    	   $unit=json_decode($itm['unit']);
    	    $price=json_decode($itm['unitprice']);
    	    if(!empty($itm['product_offerpercent'])){
    	    $pesrce=json_decode($itm['product_offerpercent']);
    	    }else{
    	       $pesrce=array(0); 
    	    }
    	   
    	     if(!empty($itm['product_priceOffer'])){
    	    $offerst=json_decode($itm['product_priceOffer']);
    	    }else{
    	       $offerst=array(""); 
    	    }
    	   
    	    $count=0;
    	    foreach($price as $pricitm){
    	        if(!empty($pricitm)){
    	            $unitdet = Unit::where('unit_id', '=', $unit[$count])->First();
    	           
    	            if(in_array($unit[$count], $offerst)){
    	                $b= array_keys($offerst, $unit[$count]);
    	               
    	                $offerpercent=$pesrce[0];
    	                $offerproduct= 1;
    	            }else{
    	                $offerpercent=0;
    	                $offerproduct= 0;
    	            }
    	            if(empty($product['admincoupon'])){
    	                if($offerst['0'] !=0){
    	            $datanew = array(
                            "weight" => $unitdet['Unit'].$unitdet['UnitType'],
                            "price" => $pricitm,
                            "Unit" => $unit[$count],
                            "offerstatus" => 0,
                            "offerproduct" => $offerproduct,
                            "couponcode" => 0,
                            "offerpercent" => $offerpercent,
                        );
    	                }else{
    	                   $datanew = array(
                            "weight" => $unitdet['Unit'].$unitdet['UnitType'],
                            "price" => $pricitm,
                            "Unit" => $unit[$count],
                            "offerstatus" => 0,
                            "couponcode" => 0,
                             "offerproduct" => $offerproduct,
                            "offerpercent" => $pesrce['0'],
                        ); 
    	                }
    	            }else{
    	                 $datanew = array(
                            "weight" => $unitdet['Unit'].$unitdet['UnitType'],
                            "price" => $pricitm,
                            "Unit" => $unit[$count],
                             "offerproduct" => $offerproduct,
                            "offerstatus" => 1,
                            "couponcode" => $product['admincoupon'],
                            "offerpercent" => 0,
                        );
    	            }
    	             array_push($newarrywet,$datanew);
    	        $count++;
    	        }
    	    }
    	    $productbrand=Brands::where('Brand_id', '=', $itm['Brand_name'])->first();
    	    if(isset($user_id)){
    	      $productfav =Favourite::where(['product_id'=>$itm['product_id'],'user_id'=>$user_id])->get();
    	      //echo count($productfav);
    	      if (count($productfav)==0) {
    	           $fav_status=0;  
    	      }else{
    	        $fav_status=1;   
    	      }
    	     }else{
    	          $fav_status=2; 
    	     }
    	    $productcarts =Carts::where(['product_id'=>$itm['product_id'],'user_id'=>$user_id,'order_id'=>0])->first();
    	    if(empty($productcarts)){
    	    $cart_status=0;
    	    }else{
    	        $cart_status=1;
    	    }
    	    $data = array(
                            "product_id" => $itm['product_id'],
                            "Brand_name" => $productbrand['Brand_name'],
                            "product_ingredients" => $itm['product_ingredients'],
                            "product_title"    => $itm['product_title'],
                            "weight_price"  => $newarrywet,
                            "product_offerpercent"     => $pesrce['0'],
                            "product_Offer_status"    => $itm['product_Offer_status'],
                            "product_about"    => $itm['product_about'],
                            "main_img"    => $itm['main_img'],
                            "optional_img"    => $itm['optional_img'],
                             "fav_status"    => $fav_status,
                             "cart_status"    => $cart_status,
                        );
    	    array_push($newarry,$data);
			
			
    	}
		return $newarry;
	}
	
	
	 public function Commondata(Request $request){
         $productbrand=Brands::inRandomOrder()->take(4)->get();
         $alldatadetals=array();
         $newarrywetbrand=array();
         foreach($productbrand as $itm){
         $brand = array(
                            "Brand_id" => $itm['Brand_id'],
                            "Brand_name" => $itm['Brand_name'],
                            "Brand_desc" => $itm['Brand_desc'],
                            "Brand_lavel"    => $itm['Brand_lavel'],
                            "main_img"    => $itm['main_img'],
                            "Rating"    => $itm['Brand_rating'],
                        );
                        array_push($newarrywetbrand,$brand);
         }
            //     $alldata=array(
            //  "Top_rated_seller" => $newarrywet,
            //  );        
                    // array_push($alldatadetals,$alldata);    
             $productdetasil=Product::take(4)->get();            
                        $newarrywet2=array();
             foreach($productdetasil as $itm1){           
    	   $unit=json_decode($itm1['unit']);
    	    $price=json_decode($itm1['unitprice']);
    	    $count=0;
    	    $newarrywet1=array();
    	    foreach($price as $pricitm){
    	        if(!empty($pricitm)){
    	            $unitdet = Unit::where('unit_id', '=', $unit[$count])->First();
    	            $datanew = array(
                            "weight" => $unitdet['Unit'].$unitdet['UnitType'],
                            "price" => $pricitm,
                            "Unit" => $unit[$count],
                        );
    	             array_push($newarrywet1,$datanew);
    	        $count++; }
    	    }
          $productbrand=Brands::where('Brand_id', '=', $itm1['Brand_name'])->first();
          $productcarts =Carts::where(['product_id'=>$itm1['product_id'],'user_id'=>$request->user_id,'order_id'=>0])->first();
    	    if(empty($productcarts)){
    	    $cart_status=0;
    	    }else{
    	        $cart_status=1;
    	    }
           $data = array(
                            "product_id" => $itm1['product_id'],
                            "Brand_name" => $productbrand['Brand_name'],
                            "product_ingredients" => $itm1['product_ingredients'],
                            "product_title"    => $itm1['product_title'],
                            "weight_price"  => $newarrywet1,
                            "product_offerpercent"     => $itm1['product_offerpercent'],
                            "product_Offer_status"    => $itm1['product_Offer_status'],
                            "product_about"    => $itm1['product_about'],
                            "main_img"    => $itm1['main_img'],
                            "optional_img"    => $itm1['optional_img'],
                            "cart_status"    => $cart_status,
                        );
                         array_push($newarrywet2,$data);
             }
            //  $alldata1=array(
            //  "Top_rated_products" => $newarrywet2,
            //  );        
                    // array_push($alldatadetals,$alldata1);
                    $productSlider=Slider::get();
         $newarryslider=array();
         foreach($productSlider as $itm){
         $slider = array(
                            "Slider_id" => $itm['Slider_id'],
                            "Slider_img" => $itm['Slider_img'],
                            "Slider_status" => $itm['Slider_status'],
                            "updated_at"    => $itm['updated_at'],
                            "created_at"    => $itm['created_at'],
                        );
                        array_push($newarryslider,$slider);
         }
         $productcount=Product::where(['product_status'=>1])->get();
        $dty= rand(0, count($productcount)-4);
         $product=Product::where(['product_status'=>1])->skip($dty)->take(4)->get();
    $newarry=array();
    	foreach($product as $itm){
    	      //$productone=Product::where('product_id', '=', $itm['product_id'])->first();
    	    $newarrywet=array();
    	   $unit=json_decode($itm['unit']);
    	    $price=json_decode($itm['unitprice']);
    	    if(!empty($itm['product_offerpercent'])){
    	    $pesrce=json_decode($itm['product_offerpercent']);
    	    }else{
    	       $pesrce=array("0"); 
    	    }
    	   // echo $itm['product_id'];
    	   // echo "<br>";
    	     if(!empty($itm['product_priceOffer'])){
    	    $offerst=json_decode($itm['product_priceOffer']);
    	    }else{
    	       $offerst=array(""); 
    	    }
    	    // print_r($offerst);
    	   // die;
    	    $count=0;
    	    foreach($price as $pricitm){
    	        if(!empty($pricitm)){
    	            $unitdet = Unit::where('unit_id', '=', $unit[$count])->First();
    	            //$avlof = Product::where('product_priceOffer1', '=', $unit[$count])->first();
    	            if(in_array($unit[$count], $offerst)){
    	                $b= array_keys($offerst, $unit[$count]);
    	               // echo $b[0];
    	               // die;
    	                $offerpercent=$pesrce[0];
    	                $offerproduct= 1;
    	            }else{
    	                $offerpercent=0;
    	                $offerproduct= 0;
    	            }
    	            if(empty($product['admincoupon'])){
    	                if($offerst['0'] !=0){
    	            $datanew = array(
                            "weight" => $unitdet['Unit'].$unitdet['UnitType'],
                            "price" => $pricitm,
                            "Unit" => $unit[$count],
                            "offerstatus" => 0,
                            "offerproduct" => $offerproduct,
                            "couponcode" => 0,
                            "offerpercent" => $offerpercent,
                        );
    	                }else{
    	                   $datanew = array(
                            "weight" => $unitdet['Unit'].$unitdet['UnitType'],
                            "price" => $pricitm,
                            "Unit" => $unit[$count],
                            "offerstatus" => 0,
                            "couponcode" => 0,
                             "offerproduct" => $offerproduct,
                            "offerpercent" => $pesrce['0'],
                        ); 
    	                }
    	            }else{
    	                 $datanew = array(
                            "weight" => $unitdet['Unit'].$unitdet['UnitType'],
                            "price" => $pricitm,
                            "Unit" => $unit[$count],
                             "offerproduct" => $offerproduct,
                            "offerstatus" => 1,
                            "couponcode" => $product['admincoupon'],
                            "offerpercent" => 0,
                        );
    	            }
    	             array_push($newarrywet,$datanew);
    	        $count++;
    	        }
    	    }
    	    $productbrand=Brands::where('Brand_id', '=', $itm['Brand_name'])->first();
    	    if(isset($request->user_id)){
    	      $productfav =Favourite::where(['product_id'=>$itm['product_id'],'user_id'=>$request->user_id])->get();
    	      //echo count($productfav);
    	      if (count($productfav)==0) {
    	           $fav_status=0;  
    	      }else{
    	        $fav_status=1;   
    	      }
    	     }else{
    	          $fav_status=2; 
    	     }
    	    $productcarts =Carts::where(['product_id'=>$itm['product_id'],'user_id'=>$request->user_id,'order_id'=>0])->first();
    	    if(empty($productcarts)){
    	    $cart_status=0;
    	    }else{
    	        $cart_status=1;
    	    }
    	    $data = array(
                            "product_id" => $itm['product_id'],
                            "Brand_name" => $productbrand['Brand_name'],
                            "product_ingredients" => $itm['product_ingredients'],
                            "product_title"    => $itm['product_title'],
                            "weight_price"  => $newarrywet,
                            "product_offerpercent"     => $pesrce['0'],
                            "product_Offer_status"    => $itm['product_Offer_status'],
                            "product_about"    => $itm['product_about'],
                            "main_img"    => $itm['main_img'],
                            "optional_img"    => $itm['optional_img'],
                             "fav_status"    => $fav_status,
                             "cart_status"    => $cart_status,
                        );
    	    array_push($newarry,$data);
    	}
               
     return response()->json(['Status' => '1', 'Slider' => $newarryslider, 'Top_rated_products' => $newarrywet2, 'Top_rated_seller' => $newarrywetbrand,'new_arrival' => $newarry]);
    }
	
	
	public function LatestOffer(Request $request){
		    $product=Product::where(['product_Offer_status'=>1,'product_status'=>1])->orderBy('product_offerpercent', 'desc')->take(10)->get();
if (count($product)==0) {
    return response()->json(['Status' => '0', 'message' =>'No Product Found']);
}else{
    $newarry1=$this->Productdesccom($product,$request->user_id);
     return response()->json(['Status' => '1', 'data' => $newarry1]);
}
    }
	
	 public function AddToCartcount(Request $request){
          $user =Carts::where(['user_id'=>$request->user_id,'payment_order'=>0,'order_id'=>0])->get();
if (count($user)>0) {
return response()->json(['Status' => '1', 'data' => count($user)]);
}else{
          return response()->json(['Status' => '0', 'message' => 'No data found']);
}
    }
	
	
	public function AddToCart(Request $request){
        
        $user =Carts::where(['product_id'=>$request->product_id,'product_weight'=>$request->weight,'user_id'=>$request->user_id,'payment_order'=>0,'order_id'=>0])->first();
if (Carts::where(['product_id'=>$request->product_id,'product_weight'=>$request->weight,'user_id'=>$request->user_id,'payment_order'=>0,'order_id'=>0])->exists()) {
    return response()->json(['Status' => '0', 'message' => 'Product already exists']);
}else{
    $productdetails = Product::where('product_id', '=', $request->product_id)->first();
    $unitdet = Unit::where('unit_id', '=', $request->Unit)->First();
    
    $product= new Carts;
            $data=$request->all();
        $product->product_id = $request->product_id;
            $product->user_id = $request->user_id;
             $product->Unit = $request->Unit;
            $product->total_weight = $request->weight;
            $product->price = $request->price;
            $product->product_weight = $request->weight;
            $product->vender_id = $productdetails['vender_id'];
            $product->qty = 1;
            $product->price_type = $request->price;
            $product->total_amt = $request->price;
          $product->save();
          $user1 =Carts::where(['user_id'=>$request->user_id,'payment_order'=>0,'order_id'=>0])->get();
          return response()->json(['Status' => '1', 'message'=> 'Successful', 'data' => count($user1)]);
}
    }
	
	
	
	public function Deliverychargecal($opin,$dpin,$type,$weight){
		
		if($type==0){
       	$prodelivery_charge=$this->checkdelhiverycharge($weight,$opin,dpin);
       	 }else{
       	    $prodelivery_charge=$this->checkdelhiverychargeexp($weight,$opin,dpin); 
       	 }
		return $prodelivery_charge;
		
	}
	
	public function Pincodecheck(Request $request){
	     $data=$request->all();
	    $url = 'https://staging-express.delhivery.com/c/api/pin-codes/json/?token=337ab80799ee282bf0b85539746ada125b3170af&filter_codes='.$data['Pincode'];
	    $method = 'GET';
	    $headers = array(
	        "content-type: application/json",
	        "Authorization: 337ab80799ee282bf0b85539746ada125b3170af"
	    );
	    $curl = curl_init();
	    curl_setopt_array($curl, array(
	        CURLOPT_RETURNTRANSFER => true,
	        CURLOPT_URL => $url,
	        CURLOPT_CUSTOMREQUEST => $method,
	        CURLOPT_HTTPHEADER => $headers,
	    ));
	    $response = curl_exec($curl);
	    $err = curl_error($curl);
	    curl_close($curl);
	    if ($err) {
	    	echo "cURL Error #:" . $err;
	    } else {
	    	//echo $response;
	    	//echo count($response);
	    	//$data=json_decode($response);
	    	//print_r($data);
	    	//echo count($data['delivery_codes']);
	    	$result = json_decode($response, true);
	    	//print_r(count($result['delivery_codes']));
	    	if (count($result['delivery_codes'])>0) {
    return response()->json(['Status' => '1', 'message' =>'Available ']);
}else{
     return response()->json(['Status' => '0','message' =>'Not Available ']);
}
	    }
	}
	
	public function CartDesc(Request $request){
           $user = Carts::where(['order_id'=>0,'user_id'=>$request->user_id])->get();
if (count($user)>0)  {
    //$totalamount=Carts::where(['user_id'=>$request->user_id,'payment_order'=>0,'order_id'=>0])->sum('total_amt');
	//$shiping_amt=0;
      // $totalweight=Carts::where(['user_id'=>$request->user_id,'payment_order'=>0])->sum('product_weight');
       	
       $newarry=array();
	    $totalamount=0;
    	foreach($user as $itm){
    	    $productdetails = Product::where('product_id', '=', $itm['product_id'])->first();
			//$prodelivery_charge=$this->Deliverychargecal($productdetails['product_pin'],$request->pincode,$request->expde,$unitsu);
    	    $categorydetails = Product_category::where('category_id', '=', $productdetails['product_catgory'])->first();
    	   
    	    $unitdet = Unit::where('unit_id', '=', $itm['Unit'])->First();
    	   
    	    if(!empty($productdetails['admincoupon'])){
    	        $statuscoupn=1;
    	    }else{
    	        $statuscoupn=0;
    	    }
    	    $data = array(
                            "cart_id" => $itm['cart_id'],
                            "product_id" => $itm['product_id'],
                            "apply_code" => $itm['apply_code'],
                            "coupon_price" => round($itm['coupon_price']),
                            "qty"    => $itm['qty'],
                            "product_weight"  => $itm['product_weight'],
                            "total_amt"     => $itm['total_amt'],
                            "product_title"    => $productdetails['product_title'],
                            "product_catgory"    => $categorydetails['caregory_name'],
                            "product_delhiverycharge"    => round($itm['product_deliverych']),
                            "image"    => $productdetails['main_img'],
                            "ssave_amount"    =>0,
                            "statuscoupn"    =>$statuscoupn,
                        );
    	    array_push($newarry,$data);
			 $totalamount=$totalamount+$itm['total_amt'];
    	}
       		$gstrate=Gstrate::first();
      
	   $shiping_amt=0;
       	$ttlgst=(($totalamount+$shiping_amt)*$gstrate['gstrate'])/100;
       	$grandttl=$totalamount+$shiping_amt+$ttlgst;
       	
       	if($grandttl>=$gstrate['Min_order']){
       	    $minorderstatus=1;
       	}else{
       	    $minorderstatus=0;
       	}
    	$total = array(
                            "sub_total"     => round($totalamount),
                            "shiping_amt"    =>$shiping_amt,
                            "gst"    => round($ttlgst),
                            "grand_ttl"    => round($grandttl),
                            "minorderstatus"    => $minorderstatus,
                            "order_min_amount" => $gstrate['Min_order'],
                            "save_amount"    =>0,
                        );
    	 return response()->json(['Status' => '1', 'data' => $newarry,'total' => $total]);
}else{
     return response()->json(['Status' => '0', 'message' => 'No data found']);
}
    }
	 public function AddAddress(Request $request){
    $product= new Useraddress;
        $product->pincode = $request->pincode;
            $product->first_name = $request->first_name;
            $product->last_name = $request->last_name;
            $product->phone = $request->phone;
            $product->city = $request->city;
            $product->State = $request->State;
            $product->landmark = $request->landmark;
            $product->address = $request->address;
            $product->user_id = $request->user_id;
          $product->save();
           return response()->json(['Status' => '1', 'message'=> 'Successful']);
    }
	 public function userAddress(Request $request){

     
     $product=Useraddress::where('user_id', '=',$request->user_id)->orderBy('set_def', 'ASC')->get();
if (count($product)>0) {
    return response()->json(['Status' => '1', 'data' => $product]);
    
}else{
     return response()->json(['Status' => '0', 'message' =>'No Data Found']);
}
    }
	
	
	 public function FavouritesList(Request $request){
    	$product=Favourite::where(['user_id'=>$request->user_id])->get();
    if (count($product)==0) {
    return response()->json(['Status' => '0', 'message' =>'No Product Found']);
}else{
     $newarry=array();
    	foreach($product as $itm){
    	    $productone=Product::where('product_id', '=', $itm['product_id'])->first();
    	    $newarrywet=array();
    	   $unit=json_decode($productone['unit']);
    	    $price=json_decode($productone['unitprice']);
    	    $count=0;
    	    foreach($price as $pricitm){
    	        if(!empty($pricitm)){
    	            $unitdet = Unit::where('unit_id', '=', $unit[$count])->First();
    	            $datanew = array(
                            "weight" => $unitdet['Unit'].$unitdet['UnitType'],
                            "price" => $pricitm,
                            "Unit" => $unit[$count],
                        );
    	             array_push($newarrywet,$datanew);
    	        $count++; }
    	    }
    	    $productbrand=Brands::where('Brand_id', '=', $productone['Brand_name'])->first();
    	    $data = array(
                            "product_id" => $productone['product_id'],
                            "Brand_name" => $productbrand['Brand_name'],
                            "product_ingredients" => $productone['product_ingredients'],
                            "product_title"    => $productone['product_title'],
                            "weight_price"  => $newarrywet,
                            "product_offerpercent"     => $productone['product_offerpercent'],
                            "product_Offer_status"    => $productone['product_Offer_status'],
                            "product_about"    => $productone['product_about'],
                            "main_img"    => $productone['main_img'],
                            "optional_img"    => $productone['optional_img'],
                        );
    	    array_push($newarry,$data);
    	}
     return response()->json(['Status' => '1', 'data' => $newarry]);
}
    }
	public function Notification(Request $request){
$product=Notification::get();
     return response()->json(['Status' => '1', 'data' => $product]);
    }
	
	
	public function RemoveNotification(Request $request){

$similproduct=Notification::where(['notification_id'=>$request->notification_id])->first();
return response()->json(['Status' => '1', 'message'=> 'Remove Successful']);
     
    }
	
	 public function Favourites(Request $request){
	$similproduct=Favourite::where(['product_id'=>$request->product_id,'user_id'=>$request->user_id])->first();
		  if(empty($similproduct)){
             $product= new Favourite;
        $product->product_id=$request->product_id;
            $product->user_id = $request->user_id;
          $product->save();
          return response()->json(['Status' => '1','favStatus' => '1', 'message'=> 'Successful']);
		  }else{
		      Favourite::where(['product_id'=>$request->product_id,'user_id'=>$request->user_id])->delete();
		      return response()->json(['Status' => '1','favStatus' => '0', 'message'=> 'Remove Successful']);
		       }
	}
	
	public function UpdateCart(Request $request){
        $user = Carts::where('cart_id', '=', $request->cart_id)->first();
if ($user === null) {
           return response()->json(['Status' => '0', 'message' => 'Not exit']);
}else{
    $productdetails = Product::where('product_id', '=', $user['product_id'])->first();
    	   $unit=json_decode($productdetails['unit']);
    	    $price=json_decode($productdetails['unitprice']);
    	    $count=0;
    	    foreach($price as $pricitm){
    	        if(!empty($pricitm)){
    	           
    	            if($user['Unit']==$unit[$count]){
    	            $unitdet = Unit::where('unit_id', '=', $unit[$count])->First();
    	           $price1= $pricitm;
    	        break;
    	            }
    	          $count++;  
    	        }
    	    }
    	    $productprice = $price1*$request->qty;
    	    $weigh=($unitdet['Unit']*$request->qty).$unitdet['UnitType'];
    	Carts::where(['cart_id'=>$request->cart_id])->update(['qty'=>$request->qty,'total_amt'=>$productprice,'price'=>$price1,'total_weight'=>$weigh]);
    	  $user1 = Carts::where(['order_id'=>0,'user_id'=>$user['user_id']])->get();
       $newarry=array();
    	foreach($user1 as $itm){
    	    $productdetails = Product::where('product_id', '=', $itm['product_id'])->first();
    	    $categorydetails = Product_category::where('category_id', '=', $productdetails['product_catgory'])->first();
    	     $unitdet = Unit::where('unit_id', '=', $itm['Unit'])->First();
    	    if(isset($request->pincode)){
    	        if($request->expde==0){
    	           // echo 1;
    	           if($unitdet['Unit']==1){
    	               $finaunit=1000;
    	           }else{
    	                $finaunit=$unitdet['Unit'];
    	           }
    	    $prodelivery_charge=$this->checkdelhiverycharge($finaunit*$itm['qty'],$productdetails['product_pin'],$request->pincode);
    	        }else{
    	             if($unitdet['Unit']==1){
    	               $finaunit=1000;
    	           }else{
    	                $finaunit=$unitdet['Unit'];
    	           }
    	           // echo 2;
    	            $prodelivery_charge=$this->checkdelhiverychargeexp($finaunit*$itm['qty'],$productdetails['product_pin'],$request->pincode);
    	        }
    	    Carts::where(['cart_id'=>$itm['cart_id']])->update(['product_deliverych'=>$prodelivery_charge]);
    	    }else{
    	        $prodelivery_charge=0;
    	    }
    	   if(!empty($productdetails['admincoupon'])){
    	        $statuscoupn=1;
    	    }else{
    	        $statuscoupn=0;
    	    }
    	    $data = array(
                            "cart_id" => $itm['cart_id'],
                            "product_id" => $itm['product_id'],
                            "apply_code" => $itm['apply_code'],
                            "coupon_price" => round($itm['coupon_price']),
                            "qty"    => $itm['qty'],
                            "product_weight"  => $itm['product_weight'],
                            "total_amt"     => $itm['total_amt'],
                            "product_title"    => $productdetails['product_title'],
                            "product_catgory"    => $categorydetails['caregory_name'],
                            "product_delhiverycharge"    => $prodelivery_charge,
                            "image"    => $productdetails['main_img'],
                             "ssave_amount"    =>0,
                            "statuscoupn"    =>$statuscoupn,
                        );
    	   
    	    array_push($newarry,$data);
    	}
    	$totalamount=Carts::where(['user_id'=>$user['user_id'],'payment_order'=>0,'order_id'=>0])->sum('total_amt');
       	$totalweight=Carts::where(['user_id'=>$user['user_id'],'payment_order'=>0,'order_id'=>0])->sum('product_weight');
       		$gstrate=Gstrate::first();
       	
       
       	$newds=Carts::where(['user_id'=>$user['user_id'],'order_id'=>0,'payment_order'=>0])->sum('product_deliverych');
       	$delivery_charge=round($newds);
       	$product_price=100;
       	$ttlgst=(($totalamount+$delivery_charge)*$gstrate['gstrate'])/100;
       	$grandttl=$totalamount+$delivery_charge+$ttlgst;
       	if($grandttl>=$gstrate['Min_order']){
       	    $minorderstatus=1;
       	}else{
       	    $minorderstatus=0;
       	}
    	$total = array(
                            "sub_total"     => round($totalamount),
                            "shiping_amt"    =>$delivery_charge,
                            "gst"    => round($ttlgst),
                            "grand_ttl"    => round($grandttl),
                            "minorderstatus"    => $minorderstatus,
                            "order_min_amount" => $gstrate['Min_order']
                        );
    	 return response()->json(['Status' => '1', 'data' => $newarry,'total' => $total]);
}
    }
	
	
	 public function DeleteCart(Request $request){
           $user = Carts::where('cart_id', '=', $request->cart_id)->first();
if ($user === null) {
    
       
           return response()->json(['Status' => '0', 'message' => 'Not exit']);
}else{
    	Carts::where(['cart_id'=>$request->cart_id])->delete();
    	return response()->json(['Status' => '1', 'message' => 'successful']);
}

    }
	
	public function DeleteAddress(Request $request){
	$similproduct=Useraddress::where(['address_id'=>$request->address_id])->first();
		  if(empty($similproduct)){
          return response()->json(['Status' => '0', 'message'=> 'No address Found']);
		  }else{
		      Useraddress::where(['address_id'=>$request->address_id])->delete();
		      return response()->json(['Status' => '1', 'message'=> 'Delete Successful']);
		       }
	}
	
	public function Changeaddress(Request $request){
           $vender_id = Carts::select('vender_id')->distinct()->where(['user_id'=>$request->user_id,'payment_order'=>0,'order_id'=>0])->get();
if (count($vender_id) <=0) {
           return response()->json(['Status' => '0', 'message' => 'Not exit']);
}else{
       	foreach($vender_id as $itmven_id){
			
			
			
			Carts::where(['user_id'=>$request->user_id,'payment_order'=>0,'order_id'=>0])->update(['address_id'=>$request->address_id]);
			Useraddress::where(['address_id'=>$request->address_id])->update(['set_def'=>0]);
       	$vendtl = Carts::where(['vender_id'=>$itmven_id['vender_id'],'user_id'=>$request->user_id,'payment_order'=>0,'order_id'=>0])->get();
       	$unitsu=0;
       	foreach($vendtl as $itmun){
       	    $productdetails = Product::where('product_id', '=', $itmun['product_id'])->first();
       	    $unitdet = Unit::where('unit_id', '=', $itmun['Unit'])->First();
       	    if($unitdet['Unit']==1){
    	               $finaunit=1000;
    	           }else{
    	                $finaunit=$unitdet['Unit'];
    	           }
    	         $unitsu=$unitsu+($finaunit*$itmun['qty']); 
       	}
       	 if($request->expde==0){
       	$prodelivery_charge=$this->checkdelhiverycharge($unitsu,$productdetails['product_pin'],$request->pincode);
       	 }else{
       	    $prodelivery_charge=$this->checkdelhiverychargeexp($unitsu,$productdetails['product_pin'],$request->pincode); 
       	 }
       	$newdlch=$prodelivery_charge/count($vendtl);
       	foreach($vendtl as $itmun){
       	 Carts::where(['cart_id'=>$itmun['cart_id']])->update(['product_deliverych'=>$newdlch]);
       	}
       	}
    	return response()->json(['Status' => '1', 'message' => 'successful']);
}
    }

    public function getShiprocket(Request $request)
    {
        try {
            $token =  Shiprocket::getToken();//  if you added credentials at shiprocket.php config
            //dd($token);
            $pincodeDetails = [
                'pickup_postcode'   => $request->get('pickup_postcode'),
                'delivery_postcode' => $request->get('delivery_postcode'),
                'cod'               => $request->get('cod'),
                'weight'            => $request->get('weight'),
                //'order_id'            => $request->get('order_id'),
            ];
            //dd($pincodeDetails);
            $response =  Shiprocket::courier($token)->checkServiceability($pincodeDetails);
            return response()->json(['Status' => '1', 'message' => 'successful', 'data' => $response]);
        } catch (Exception $e) {
            throw $e;
        }
        
    }

    public function canAbleToGetThePickupLocations(Request $request)
    {
        $order_id = $request->get('order_id');
        //dd($webhook->current_status);
        $order_info = Order::where('ord_id', $order_id)->with([
                            'address:address_id,pincode,first_name,phone,city,State,landmark,address,set_def,last_name',
                            'user:id,name,email,Phone',
                            'product' => function($q) {
                                $q->select(['cart_id', 'order_id', 'product_id', 'Unit', 'price', 'dis_price', 'qty', 'product_weight', 'total_amt'])
                                    ->with('product:product_id,vender_id,product_catgory,product_test,product_ingredients,product_title');
                            }
                        ])
                        ->first();
        
        //dd($order_info->toArray());
        $data = [
            'order_id'  => $order_info->ord_id,
            'order_date'  => date('Y-m-d H:i:s', strtotime($order_info->created_at)),
            'pickup_location'  => $order_info->address->city,
        ];
        $token =  Shiprocket::getToken();

        $sampleOrder = $this->sampleOrder($order_info);
        $order = Shiprocket::order($token)->create($sampleOrder);
        if($order) {
            $shipment_id = $order['shipment_id'];
            //dd($pickupDetails);
            $pickupDetails = [
                "shipment_id" => $shipment_id
            ];
            $data = [
                'shipment_id' => $shipment_id,
            ];
            $awb =  Shiprocket::courier($token)->generateAWB($data);
            $pickup_request =  Shiprocket::courier($token)->requestPickup($pickupDetails);

            $update_order = [
                'ship_rocket_order_id'  => $shipment_id,
                'order_status'          => 6,
                'updated_at'            => date('Y-m-d H:i:s')
            ];
            Order::where('ord_id', $order_id)->update($update_order);
            
            return response()->json(['success' => '1', 'message' => 'successful', 'data' => $order, 'awb' => $awb, 'pickup_request' => $pickup_request]);
        }
        return response()->json(['success' => '0', 'message' => 'successful']);
    }

    public function sampleOrder($order_info)
    {
        //$order_items[] = [];
        //dd($order_info->product);
        $product_weight = 0;
        foreach($order_info->product as $key => $cart) {
            //dd($cart->product_weight);
            //dd($cart->product->product_title);
            $order_items[] = [
                'name' => $cart->product->product_title,
                'sku' => 'chakra12'.$key,   // For Discuss
                'units' => $cart->qty,           // For Discuss
                'selling_price' => $cart->product->price,
                'discount' => $cart->product->dis_price,
                'tax' => '',
                'hsn' => '',
            ];
            $product_weight = $product_weight + preg_replace('/[^0-9]/', '', $cart->product_weight);
        }
        //dd($product_weight);
        return [
            "order_id"=> $order_info->ord_id,
            "order_date"=> $order_info->created_at,
            "pickup_location"=> "Primary",
            "channel_id"=> "",
            "comment"=> "",
            "billing_customer_name"=> $order_info->address->first_name,
            "billing_last_name"=> $order_info->address->last_name,
            "billing_address"=> $order_info->address->address,
            "billing_address_2"=> $order_info->address->address,
            "billing_city"=> $order_info->address->city,
            "billing_pincode"=> $order_info->address->pincode,
            "billing_state"=> $order_info->address->State,
            "billing_country"=> "India",
            "billing_email"=> $order_info->user->email,
            "billing_phone"=> $order_info->address->phone,
            "shipping_is_billing"=> true,
            "shipping_customer_name"=> $order_info->address->first_name,
            "shipping_last_name"=> $order_info->address->last_name,
            "shipping_address"=> $order_info->address->address,
            "shipping_address_2"=> $order_info->address->address,
            "shipping_city"=> $order_info->address->city,
            "shipping_pincode"=> $order_info->address->pincode,
            "shipping_country"=> "India",
            "shipping_state"=> $order_info->address->State,
            "shipping_email"=> $order_info->user->email,
            "shipping_phone"=> $order_info->address->phone,
            /*'order_items' => [  0 =>
                [
                    'name' => $order_info->product->product_title,
                    'sku' => 'chakra123',   // For Discuss
                    'units' => $order_info->cart->Unit,           // For Discuss
                    'selling_price' => $order_info->grandttl,
                    'discount' => $order_info->Discount != null ? $order_info->Discount : 0,
                    'tax' => '',
                    'hsn' => '',
               ],
            ],*/
            "payment_method"=> "COD",
            "shipping_charges"=> 0,
            "giftwrap_charges"=> 0,
            "transaction_charges"=> 0,
            "total_discount"=> $order_info->Discount != null ? $order_info->Discount : 0,
            "sub_total"=> $order_info->grandttl,
            "length"=> 10,
            "breadth"=> 15,
            "height"=> 20,
            "weight"=> $product_weight,
            'order_items' => $order_items
        ];
    }

    public function webHookStatus(Request $request)
    {
        if($request->current_status == "Delivered") {
            Order::where('ord_id', $request->order_id)->update(['order_status' => 2]);
            return response()->json(['success' => '1', 'message' => 'successful', 'updated_status' => $request->current_status]);
        } elseif ($request->current_status == "OutForDelivery") {
            Order::where('ord_id', $request->order_id)->update(['order_status' => 4]);
            return response()->json(['success' => '1', 'message' => 'successful', 'updated_status' => $request->current_status]);
        } elseif ($request->current_status == "ReturnToSender") {
            Order::where('ord_id', $request->order_id)->update(['order_status' => 5]);
            return response()->json(['success' => '1', 'message' => 'successful', 'updated_status' => $request->current_status]);
        } elseif ($request->current_status == "Acceptance") {
            Order::where('ord_id', $request->order_id)->update(['order_status' => 6]);
            return response()->json(['success' => '1', 'message' => 'successful', 'updated_status' => $request->current_status]);
        }
    }

    public function OrderDetails(Request $request)
    {
        $request->validate([
            'order_id' => 'required'
        ]);

        $data = Order::where('ord_id', $request->get('order_id'))
                        ->select(['ord_id', 'address_id', 'delivery_charge', 'totalamount', 'grandttl', 'gst_charge', \DB::raw('order_status as my_order_status')])
                        ->with([
                            'product' => function($q) {
                                $q->select(['cart_id', 'order_id', 'product_id', 'Unit', 'price', 'dis_price', 'qty', 'product_weight', 'total_amt'])
                                    ->with('product:product_id,vender_id,product_catgory,product_test,product_ingredients,product_title,main_img');
                            },
                            'address:address_id,user_id,pincode,first_name,phone,city,State,landmark,address,last_name,set_def'
                        ])
                        ->first();
        if ($data) {
            //$data->append('my_order_status');
            return response()->json(['Status' => '1', 'data' => $data]);
        } else {  
            return response()->json(['Status' => '0', 'message' => 'No data found']);
        }
    }
}

    /*return  [
        'order_id' => 9,
        'order_date' => '2021-02-22 11:30',
        'pickup_location' => "Primary",
        'channel_id' => '',
        'comment' => '',
        'reseller_name' => '',
        'company_name' => '',
        'billing_customer_name' => "Test",
        'billing_last_name' => '',
        'billing_address' => $order_info->address->address,
        'billing_address_2' => $order_info->address->address,
        'billing_isd_code' => '',
        'billing_city' => $order_info->city,
        'billing_pincode' => 110002,
        'billing_state' => $order_info->address->State,
        'billing_country' => 'India',
        'billing_email' => 'test@gmail.com',
        'billing_phone' => $order_info->address->phone,
        'billing_alternate_phone' => $order_info->address->phone,
        'shipping_is_billing' => true,
        'shipping_customer_name' => $order_info->address->first_name,
        'shipping_last_name' => '',
        'shipping_address' => $order_info->address,
        'shipping_address_2' => $order_info->address,
        'shipping_city' => $order_info->address->city,
        'shipping_pincode' => $order_info->address->pincode,
        'shipping_country' => 'India',
        'shipping_state' => $order_info->address->State,
        'shipping_email' => 'test@gmail.com',
        'shipping_phone' => $order_info->address->phone,
        'order_items' => [  0 =>
           [
            'name' => 'Kunai',
            'sku' => 'chakra123',
            'units' => 1,
            'selling_price' => 200,
            'discount' => '',
            'tax' => '',
            'hsn' => '',
           ],
        ],
        'payment_method' => 'COD',
        'shipping_charges' => '',
        'giftwrap_charges' => '',
        'transaction_charges' => '',
        'total_discount' => '',
        'sub_total' => 200,
        'length' => 10,
        'breadth' => 10,
        'height' => 10,
        'weight' => 20,
        'ewaybill_no' => '',
        'customer_gstin' => '',
    ];*