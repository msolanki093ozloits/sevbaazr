<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Product;
use App\User;
use App\Product_category;
use App\Brands;
use App\Regions;
use App\Slider;
use App\Vendors;
use App\Order;
use \Image;
use App\Notification;
use App\Support;
use App\Gstrate;
use App\Coupon;
use App\Cancelreason;
use App\Returnreason;
use App\Unit;
use App\Tst_type;
use App\Carts;
use App\Useraddress;
use DB;
use Seshac\Shiprocket\Shiprocket;

class VenderController extends Controller
{
    public function login(){
    	return view('vender.index');
    }
    
    public function VendorLogout(){
    	return redirect('SellerLogin');
    }
    public function UpdateProductOffer(Request $request){
    	$data=$request->all();
    	
    	Product::where(['product_id'=>$data['product_id']])->update([
	'product_Offer_status'=>'1',
	'product_offerpercent'=>json_encode($data['product_offerpercent']),
	'product_priceOffer'=>json_encode($data['offerunit']),
	'offer_enddate'=>$data['offer_enddate'],
	'offer_statrdate'=>$data['offer_statrdate'],
// 	'admincoupon'=>$data['admincoupon'],
	
	]);
    	return redirect()->back()->with('flash_message_success','Product offers has Been Update Successfully!');
    	//echo 0;
    }
    
    public function orderviewdis(Request $request){ 
        $data=$request->all();
        $id=$data['name'];
     
       
       	$orderDetails=Order::where(['order_id'=>$id])->first();
       	 
       	$addressDetails= Useraddress::where(['address_id'=>$orderDetails['address_id']])->first();
    //   	echo $addressDetails['first_name'];
    //   die;
       	$cartDetails = Carts::where(['vender_id'=>$request->session()->get('venderid'),'order_id'=>$id])->get();
       	
       	// echo $addressDetails['first_name'];
       	// die;
       	$token =  Shiprocket::getToken();
       	$shipemntId = $orderDetails->ship_rocket_order_id;
		$shipments = Shiprocket::shipment($token)->getSpecific($shipemntId);
		//dd($shipments);
        echo '<div class="row" >
                          <div class="col-md-12">
							<div class="row">
							  <div class="col-md-6 p-1"><b>Name</b></div>
							  <div class="col-md-6 p-1">'.$addressDetails['first_name']." ".$addressDetails['last_name'].'</div>
							</div><!--/row-->
							<div class="row">
							  <div class="col-md-6 p-1"><b>Address</b></div>
							  <div class="col-md-6 p-1">'.$addressDetails['address'].'</div>
							</div><!--/row-->
							<div class="row">
							  <div class="col-md-6 p-1"><b>Pin code</b></div>
							  <div class="col-md-6 p-1">'.$addressDetails['pincode'].'</div>
							</div>
							<div class="row">
							  <div class="col-md-6 p-1"><b>Phone</b></div>
							  <div class="col-md-6 p-1">'.$addressDetails['phone'].'</div>
							</div>
					
							<div class="row">
							  <div class="col-md-6 p-1"><b>State</b></div>
							  <div class="col-md-6 p-1">'.$addressDetails['State'].'</div>
							</div><!--/row-->
							<div class="row">
							  <div class="col-md-6 p-1"><b>city</b></div>
							  <div class="col-md-6 p-1">'.$addressDetails['city'].' </div>
							</div><!--/row-->
							<div class="row">
							  <div class="col-md-6 p-1"><b>Landmark</b></div>
							  <div class="col-md-6 p-1">'.$addressDetails['landmark'].' </div>
							</div><!--/row-->
							
                          </div>
                          
                        </div>';
                        foreach($cartDetails as $cartdet){
                            	$productDetails= Product::where(['product_id'=>$cartdet->product_id])->first();
						
						echo '<div class="row">
						   <div class="col-md-6 border-bottom p-3">
						      <b>Product:</b> '.$productDetails['product_title'] .'
						   </div>
						   <div class="col-md-6 border-bottom p-3">
						      <b>Price: </b>'.$cartdet->price .'
						   </div>
						   
						</div>';
                        }
						
						echo '<div class="row">
							  <div class="col-md-6 p-1"><b>Sub Total</b></div>
							  <div class="col-md-6 p-1">'.$orderDetails['totalamount'].'</div>
							</div><!--/row-->
							<div class="row">
							  <div class="col-md-6 p-1"><b>Delivery charge</b></div>
							  <div class="col-md-6 p-1">'.$orderDetails['delivery_charge'].'</div>
							</div><!--/row-->
							<div class="row">
							  <div class="col-md-6 p-1"><b>Gst</b></div>
							  <div class="col-md-6 p-1">'.$orderDetails['gst_charge'].'</div>
							</div>
							<div class="row">
							  <div class="col-md-6 p-1"><b>Discount</b></div>
							  <div class="col-md-6 p-1">'.$orderDetails['Discount'].'</div>
							</div>
					
							<div class="row">
							  <div class="col-md-6 p-1"><b>Total</b></div>
							  <div class="col-md-6 p-1">'.$orderDetails['grandttl'].'</div>
							</div><!--/row-->
							
                          </div>
                          
                        </div>
						';
        
        
    }
    
    
      public function viewdis(Request $request){
        $data=$request->all();
        $id=$data['name'];
       //die;
       
       	$productDetails=Product::where(['product_id'=>$id])->first();
       	$unitall=Unit::get();
       
       	// echo $productDetails['product_priceOffer'];
       	// die;
       	
       	//print_r($productDetails['product_offerpercent']);
       	//die;
       $unit=	json_decode($productDetails['unit']);
       $unitprice=	json_decode($productDetails['unitprice']);
    //   print_r($unit);
    //   die;
       echo  '<div class="row">
						   <div class="col-md-12" >
						   <div class="row">
							  <div class="col-md-6 p-1"><b>Product Title</b></div>
							  <div class="col-md-6 p-1">
                                           
                                            <input type="text" class="form-control" id="product_title"  name="product_title"  value="'.$productDetails['product_title'].' " readonly required>
                                        <input type="hidden" class="form-control" id="Disp350"  name="product_id"  value="'.$id.'" readonly required>
										</div>
							</div>
						   ';
						$count=0;
						foreach($unit as $itm){
						    
						    $unitDetails=Unit::where(['unit_id'=>$itm])->first();
						    
							echo  '<div class="row">
							  <div class="col-md-6 p-1"><b> Price'.$unitDetails['Unit'].$unitDetails['UnitType'].':</b></div>
							  <div class="col-md-6 p-1">
                                            
                                            <input type="text" class="form-control" id="Disp3501'.$id.'"  name="Disproduct_price350"  value="'.$unitprice[$count].'" readonly required>
                                        </div>
							</div>';
							$count++;
							}
							
							if(empty($productDetails['product_priceOffer'])){
							echo '<div class="row">
							  <div class="col-md-2 p-1"><b>Discount (%):</b></div>
							  <div class="col-md-2 p-1">
                                           <select  class="form-control" name="offerunit[]">
                                           <option value="0">All unit</option>';
                                           foreach($unitall as $itmall){
                                               echo '<option value="'.$itmall['unit_id'].'">'.$itmall['Unit'].$itmall['UnitType'].'</option>';
                                           }
                                           echo '</select>
                                           
                                        </div>
							  <div class="col-md-2 p-1">
                                           
                                            <input type="text" class="form-control" id="product_offerpercent"  name="product_offerpercent[]"  placeholder="Percent" required>
                                        </div><div class="col-md-2 p-1">
                                           
                                            <input type="date" class="form-control" id="offer_enddate"  name="offer_enddate" placeholder="enddate"    required>
                                        </div><div class="col-md-2 p-1">
                                           
                                            <input type="date" class="form-control" id="offer_statrdate"  name="offer_statrdate" placeholder="enddate"   required>
                                        </div>';
							}else{
							   $product_offerpercent= json_decode($productDetails['product_offerpercent']);
							   $product_priceOffer= json_decode($productDetails['product_priceOffer']);
							   $ct=0;
							   
							   foreach($product_priceOffer as $offerl){
							    	echo '<div class="row">
							  <div class="col-md-2 p-1"><b>Discount (%):</b></div>
							  <div class="col-md-2 p-1">
                                           <select  class="form-control" name="offerunit[]">
                                           <option value="0" ';if($product_priceOffer['0']===0){ echo "selected"; } echo '>All unit</option>';
                                           foreach($unitall as $itmall){
                                               if(in_array($itmall["unit_id"],$unit)){
                                               echo '<option value="'.$itmall['unit_id'].'"';if($offerl===$itmall["unit_id"]){ echo "selected"; } echo '>'.$itmall['Unit'].$itmall['UnitType'].'</option>';
                                           } }
                                           echo '</select>
                                           
                                        </div>
							  <div class="col-md-2 p-1">
                                           
                                            <input type="text" class="form-control" id="product_offerpercent"  name="product_offerpercent[]"  value="'.$product_offerpercent[$ct].'" required>
                                        </div>
                                        <div class="col-md-2 p-1">
                                           
                                            <input type="date" class="form-control" id="offer_enddate"  name="offer_enddate" placeholder="enddate"  value="'.$productDetails['offer_enddate'].'"  required>
                                        </div>
                                        <div class="col-md-2 p-1">
                                           
                                            <input type="date" class="form-control" id="offer_statrdate"  name="offer_statrdate" placeholder="enddate"  value="'.$productDetails['offer_statrdate'].'"  required>
                                        </div>
                                        <tfoot>
                                                <tr>
                                                    <span style="margin-left: 130px;"><th>Unit</th></span>
                                                    <span style="margin-left: 100px;"><th>Discount (%)</th></span>
                                                    
                                                    
                                                    <span style="margin-left: 80px;"><th>End date</th></span>
                                                    <span style="margin-left: 80px;"><th>start date</th></span>
                                                   
                                                </tr>
                                            </tfoot>';
							    
							$ct++; } }
                                        echo '
							</div>
							<div id="disapd" class="row"></div>
							</div></div>';
   }

   public function Dashboard(Request $request){
       if(!empty($request->session()->get('venderid'))){
          $productDetails['category'] = DB::table('carts')
                ->join('orders', 'carts.order_id', '=', 'orders.order_id')
                ->select('carts.*', 'orders.*')
                 ->where(['carts.vender_id'=>$request->session()->get('venderid')])
                ->count();
				
				$productDetails['category1'] = DB::table('carts')
                ->join('orders', 'carts.order_id', '=', 'orders.order_id')
                ->select('carts.*', 'orders.*')
                 ->where(['carts.vender_id'=>$request->session()->get('venderid'),'orders.order_status'=>3])
                ->count();
				
				$productDetails['category2'] = DB::table('carts')
				->join('orders', 'carts.order_id', '=', 'orders.order_id')
				->select(DB::raw("SUM(orders.grandttl) as total_address"))
                ->where(['carts.vender_id'=>$request->session()->get('venderid'),'orders.order_status'=>3])
                ->get();

			  
           	return view('vender.dashboard')->with(compact('productDetails')); 
       }else{
       if($request->isMethod('post')){
           $data=$request->all();
           $productDetails=Vendors::where(['Firm_email'=>$data['Firm_email'],'Firm_password'=>$data['Firm_password'],'vendor_status'=>1])->first();
           
           if(empty($productDetails)){
               return redirect()->back()->with('flash_message_success','Email or Password wrong!');
           }else{
               $request->session()->put('Firm_email', $data['Firm_email']);
               $request->session()->put('Firm_name', $productDetails['Firm_name']);
               $request->session()->put('venderid', $productDetails['vender_id']);
			   
			   
			   
           	$productDetails['category'] = DB::table('carts')
                ->join('orders', 'carts.order_id', '=', 'orders.order_id')
                ->select('carts.*', 'orders.*')
                 ->where(['carts.vender_id'=>$request->session()->get('venderid')])
                ->count();
				
				$productDetails['category1'] = DB::table('carts')
                ->join('orders', 'carts.order_id', '=', 'orders.order_id')
                ->select('carts.*', 'orders.*')
                 ->where(['carts.vender_id'=>$request->session()->get('venderid'),'orders.order_status'=>3])
                ->count();
				
				$productDetails['category2'] = DB::table('carts')
				->join('orders', 'carts.order_id', '=', 'orders.order_id')
				->select(DB::raw("SUM(orders.grandttl) as total_address"))
                ->where(['carts.vender_id'=>$request->session()->get('venderid'),'orders.order_status'=>3])
                ->get();

			  
           	return view('vender.dashboard')->with(compact('productDetails'));
           }
       }
    	//return Redirect::to('Vender');
    	return redirect('SellerLogin');
       }
    }

public function Product(Request $request){
    $Vendorsbrand=Vendors::where(['vender_id'=>$request->session()->get('venderid')])->first();
    $brandcity=Brands::where(['Brand_id'=>$Vendorsbrand['Brand_id']])->first();
if($request->isMethod('post')){

	$data=$request->all();
	//print_r($data);


	
	$product= new Product;
	$product->vender_id=$request->session()->get('venderid');
	$product->vender_id=$request->session()->get('venderid');
	$product->product_catgory=$data['product_catgory'];
	$product->Brand_name=$Vendorsbrand['Brand_id'];
	$product->product_ingredients=$data['product_ingredients'];
	$product->Regions=$brandcity['Brand_city'];
	$product->product_title=$data['product_title'];
	//$product->product_weight=$data['product_weight'];
	$product->product_price500=0;
		$product->product_price350=0;
			$product->product_price400=0;
	$product->unit=json_encode($data['unit']);
	$product->unitprice=json_encode($data['unitprice']);
	$product->product_about=$data['product_about'];
	$product->Shelf_Life=$data['Shelf_Life'];
	$product->product_type=$data['product_type'];
	$product->Organic=$data['Organic'];
	$product->Gluten=$data['Gluten'];
	$product->Peanut=$data['Peanut'];
	$product->Lactose=$data['Lactose'];
	$product->Licence=$data['Licence'];
	$product->Temperature=$data['Temperature'];
	$product->Nutritional=$data['Nutritional'];
	$product->product_test=$data['product_test'];
	$product->product_comment='0';
	$product->product_offerpercent='0';
// 	$product->product_priceOffer='0';

	if($request->hasFile('main_img')){
	 $img_temp=$request->file('main_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->main_img=$comurl.$filename;

	}
	
}

	if($request->hasFile('optional_img')){
	 $img_temp=$request->file('optional_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->optional_img=$comurl.$filename;

	}
	
}
	//$product->main_img=$data['main_img'];
	//$product->optional_img=$data['optional_img'];

	$product->save();
	return redirect()->back()->with('flash_message_success','Product has Been added Successfully!');
	//print_r($data);
}
	
//return redirect()->back()->with('flash_message_success','Product has Been added Successfully!');
		$productDetails['category']=Product_category::get();
    	$productDetails['unit']=Unit::get();
    	$productDetails['Tsttype']=Tst_type::get();
    	

    	return view('vender.AddProduct')->with(compact('productDetails'));
    	//return view('vender.AddProduct')->with(compact('product'));
    	//return view('admin.AddProduct');
    }

    // public function ManageProduct(Request $request){
    // 	//$comurl="{{url('/')}}".'images/backend_img/product/';
    // 	//echo url('/');
    // 	//die; 
    // 	//$product=Product::get();
    // 	$venderid=$request->session()->get('venderid');
    // 	$product=Product::where(['vender_id'=>$venderid])->get();
    // // 	print_r($product);
    // // 	die;
    // 	return view('vender.ManageProduct')->with(compact('product'));
    // }
    
     public function viewcomment(Request $request){
        $data=$request->all();
        $id=$data['name'];
       //die;
       
       	$productDetails=Product::where(['product_id'=>$id])->first();
       	
       	//print_r($productDetails['product_offerpercent']);
       	//die;
       	if(count($productDetails) > 0 ){
       return '<div class="row">
						   <div class="col-md-12" ><div class="row">
							  <div class="col-md-12 p-1"><b>'.$productDetails['product_comment'].'</b></div>
							  
							</div><!--/row-->
							
						
						
						
							<!--/row-->
						</div></div>';
       	}else{
       	     return '<div class="row">
						   <div class="col-md-12" ><div class="row">
							  <div class="col-md-12 p-1"><b>No comment</b></div>
							  
							</div><!--/row-->
							
						
						
						
							<!--/row-->
						</div></div>';
       	}
   }
    
    
    
     public function ManageProduct(Request $request){
    	//$comurl="{{url('/')}}".'images/backend_img/product/';
    	//echo url('/');
    	//die; 
    	
    	    $productDetails['category'] = DB::table('products')
                ->join('brands', 'products.Brand_name', '=', 'brands.Brand_id')
                ->join('vendors', 'products.vender_id', '=', 'vendors.vender_id')
                ->join('product_categories', 'products.product_catgory', '=', 'product_categories.category_id')
                ->select('products.*', 'brands.*', 'vendors.*','product_categories.*')
                ->orderBy('products.product_id', 'desc')
                ->where(['products.vender_id'=>$request->session()->get('venderid'),'products.product_del'=>0])
                ->get();
                
                $productDetails['unit']=Unit::get();
    	//$product=Product::orderBy('product_title', 'asc')->get();
    	return view('vender.ManageProduct')->with(compact('productDetails'));
    }
    public function EditProduct(Request $request,$id=null){
    	$productDetails['product']=Product::where(['product_id'=>$id])->first();
    	$productDetails['category']=Product_category::get();
    	$productDetails['unit']=Unit::get();
    	$productDetails['Tsttype']=Tst_type::get();
    	

    	return view('vender.edit_product')->with(compact('productDetails'));

    	


    }
    public function UpdateProductprice(Request $request){
    	$data=$request->all();
    	


    	Product::where(['product_id'=>$data['product_id']])->update([

	'unit'=>json_encode($data['unit']),
	'unitprice'=>json_encode($data['unitprice'])]);
    	return redirect()->back()->with('flash_message_success','Product has Been Update Successfully!');
    	//echo 0;
    }
    
    public function UpdateProduct(Request $request){
    	$data=$request->all();
    	


    	Product::where(['product_id'=>$data['product_id']])->update(['product_catgory'=>$data['product_catgory'],
	
	'product_ingredients'=>$data['product_ingredients'],
	'product_title'=>$data['product_title'],
	'unit'=>json_encode($data['unit']),
	'unitprice'=>json_encode($data['unitprice']),
	'product_about'=>$data['product_about'],
	'Shelf_Life'=>$data['Shelf_Life'],
	'product_type'=>$data['product_type'],
	'Organic'=>$data['Organic'],
	'Gluten'=>$data['Gluten'],
	'Peanut'=>$data['Peanut'],
	'Lactose'=>$data['Lactose'],
	'Licence'=>$data['Licence'],
	'Temperature'=>$data['Temperature'],
	'Nutritional'=>$data['Nutritional'],
	'product_test'=>$data['product_test']]);
    	return redirect()->back()->with('flash_message_success','Product has Been Update Successfully!');
    	//echo 0;
    }
    public function DeleteProduct(Request $request,$id=null){
        Product::where(['product_id'=>$id])->update([
	'product_del'=>'1',
	'product_status'=>0

	]);
        
    	//Product::where(['product_id'=>$id])->delete();
    	return redirect()->back()->with('flash_message_success','Product has Been Delete Successfully!');

    }

    public function ManageOrder(Request $request){
        $productDetails['category'] = DB::table('products')
                ->join('brands', 'products.Brand_name', '=', 'brands.Brand_id')
                ->join('vendors', 'products.vender_id', '=', 'vendors.vender_id')
                ->join('product_categories', 'products.product_catgory', '=', 'product_categories.category_id')
                ->select('products.*', 'brands.*', 'vendors.*','product_categories.*')
                ->orderBy('products.product_id', 'desc')
                ->where(['products.vender_id'=>$request->session()->get('venderid'),'products.product_del'=>0])
                ->get();
                
                $productDetails['unit']=Unit::get();
                
                $productDetails['Order']=Order::get();
                $productDetails['orderid'] = Carts::select('order_id')->distinct()->where(['vender_id'=>$request->session()->get('venderid')])->get();
                // print_r($productDetails['orderid'] );
                // die;
                
    	//$product=Product::orderBy('product_title', 'asc')->get();
    	return view('vender.ManageOrder')->with(compact('productDetails'));
    // 	return view('vender.ManageOrder');
    }
    
    
     public function CompletedOrder(Request $request){
        $productDetails['category'] = DB::table('products')
                ->join('brands', 'products.Brand_name', '=', 'brands.Brand_id')
                ->join('vendors', 'products.vender_id', '=', 'vendors.vender_id')
                ->join('product_categories', 'products.product_catgory', '=', 'product_categories.category_id')
                ->select('products.*', 'brands.*', 'vendors.*','product_categories.*')
                ->orderBy('products.product_id', 'desc')
                ->where(['products.vender_id'=>$request->session()->get('venderid'),'products.product_del'=>0])
                ->get();
                
                $productDetails['unit']=Unit::get();
                
                $productDetails['Order']=Order::get();
                $productDetails['orderid'] = Carts::select('order_id')->distinct()->where(['vender_id'=>$request->session()->get('venderid')])->get();
                //orderBy('cart_id', 'desc');
    	return view('vender.CompletedOrder')->with(compact('productDetails'));
    
    }

public function CancelOrder(Request $request){
        $productDetails['category'] = DB::table('products')
                ->join('brands', 'products.Brand_name', '=', 'brands.Brand_id')
                ->join('vendors', 'products.vender_id', '=', 'vendors.vender_id')
                ->join('product_categories', 'products.product_catgory', '=', 'product_categories.category_id')
                ->select('products.*', 'brands.*', 'vendors.*','product_categories.*')
                ->orderBy('products.product_id', 'desc')
                ->where(['products.vender_id'=>$request->session()->get('venderid'),'products.product_del'=>0])
                ->get();
                
                $productDetails['unit']=Unit::get();
                
                $productDetails['Order']=Order::get();
                $productDetails['orderid'] = Carts::select('order_id')->distinct()->where(['vender_id'=>$request->session()->get('venderid')])->get();
                
    	return view('vender.CancelOrder')->with(compact('productDetails'));
    
    }
    public function OngoingOrder(Request $request){
        $productDetails['category'] = DB::table('products')
                ->join('brands', 'products.Brand_name', '=', 'brands.Brand_id')
                ->join('vendors', 'products.vender_id', '=', 'vendors.vender_id')
                ->join('product_categories', 'products.product_catgory', '=', 'product_categories.category_id')
                ->select('products.*', 'brands.*', 'vendors.*','product_categories.*')
                ->orderBy('products.product_id', 'desc')
                ->where(['products.vender_id'=>$request->session()->get('venderid'),'products.product_del'=>0])
                ->get();
                
                $productDetails['unit']=Unit::get();
                
                $productDetails['Order']=Order::get();
                $productDetails['orderid'] = Carts::select('order_id')->distinct()->where(['vender_id'=>$request->session()->get('venderid')])->get();
                
    	return view('vender.OngoingOrder')->with(compact('productDetails'));
    
    }
    public function ReturnOrder(Request $request){
        $productDetails['category'] = DB::table('products')
                ->join('brands', 'products.Brand_name', '=', 'brands.Brand_id')
                ->join('vendors', 'products.vender_id', '=', 'vendors.vender_id')
                ->join('product_categories', 'products.product_catgory', '=', 'product_categories.category_id')
                ->select('products.*', 'brands.*', 'vendors.*','product_categories.*')
                ->orderBy('products.product_id', 'desc')
                ->where(['products.vender_id'=>$request->session()->get('venderid'),'products.product_del'=>0])
                ->get();
                
                $productDetails['unit']=Unit::get();
                
                $productDetails['Order']=Order::get();
                $productDetails['orderid'] = Carts::select('order_id')->distinct()->where(['vender_id'=>$request->session()->get('venderid')])->get();
                
    	return view('vender.ReturnOrder')->with(compact('productDetails'));
    
    }
    public function ManageSale(){
    	return view('vender.ManageSale');
    }
    public function ManageReturn(){
    	return view('vender.ManageReturn');
    }


public function ManagePayment(){
    	return view('vender.ManagePayment');
    }
    public function ManageOffers(){
    	return view('vender.ManageReturn');
    }
    public function AddOffers(){
    	return view('vender.ManageReturn');
    }


    public function ProductCreate(){
    	echo "hello";
    }




}
