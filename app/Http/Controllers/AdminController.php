<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use DB;
use App\Product;
use App\User;
use App\Product_category;
use App\Brands;
use App\Regions;
use App\Slider;
use App\Banner;
use App\Banneroffer;
use App\Vendors;
use App\Admins;
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
use Session;
use App\States;
use App\Rules\Captcha;

class AdminController extends Controller
{
   
   
    public function viewVendor(Request $request){
        
       
      
      	$productDetails=Vendors::where(['Vender_city'=>$request->id])->get();
      //print_r($product);
      echo '<div class="form-group" id="vendor_id">
		<select class="form-control" name="vendor_id"  title="Vendor name" data-size="7" required="" tabindex="-98">
		
                                                        <option value=""> Select Vendor</option>';
      
      foreach($productDetails as $cati){
      echo '<option value="'.$cati['vender_id'].'">'.$cati['Firm_name'].'</option>';
      
      
                                        
      }
    
    echo '</select></div>';
    //echo 2;
    
    $productcat=Product_category::get();
     foreach($productcat as $pcati){
     echo  '<div class="col-md-12">
                                        <div class="row">
                                            
                                            <div class="col-sm-9 checkbox-radios">
                                                <div class="form-check text-left form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                       <input class="form-check-input" type="checkbox" name="category_id[]" value="'.$pcati['category_id'].'"> '.$pcati['caregory_name'].'
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                  

                                                
                                            </div>
                                        </div>
                                    </div>';
     }
   }
   public function viewcategory(){
      $product=Product_category::get(); 
      //print_r($product);
      
      foreach($product as $cati){
      echo '<div class="form-group">
										
                                           <label for="examplePassword" class="bmd-label-floating"> '.$cati['caregory_name'].' Percentage *</label>
                                            <input type="Number" class="form-control" id="Vendor_percent"  name="Vendor_percent" >
                                        </div>';
                                        
      }
    
    //echo 2;
       
   }
   
   
    public function viewcomment(Request $request){
        $data=$request->all();
        $id=$data['name'];
       //die;
       
       	$productDetails=Product::where(['product_id'=>$id])->first();
       	
       	//print_r($productDetails['product_offerpercent']);
       	//die;
       return '<div class="row">
						   <div class="col-md-12" ><div class="row">
							  <div class="col-md-6 p-1"><b>Product Comment:</b></div>
							  <div class="col-md-6 p-1">
                                           
                                            <input type="text" class="form-control" id="product_comment"  name="product_comment"  value="'.$productDetails['product_comment'].' " onkeyup="discount(this.value,'.$id.')" required>
                                        <input type="hidden" class="form-control" id="product_id"  name="product_id"  value="'.$id.'" readonly required>
                                        </div>
							</div><!--/row-->
							
						
						
						
							<!--/row-->
						</div></div>';
   }
   
   
   public function viewdis(Request $request){
        $data=$request->all();
        $id=$data['name'];
       //die;
       
       	$productDetails=Product::where(['product_id'=>$id])->first();
       	$unitall=Unit::get();
       	$Couponall=Coupon::get();
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
                                           
                                            <input type="date" class="form-control" id="offer_enddate"  name="offer_enddate" value="'.$productDetails['offer_enddate'].' " placeholder="enddate"   required>
                                        </div><div class="col-md-2 p-1">
                                           <select  class="form-control" name="admincoupon" required>
                                           <option value="">code</option>';
                                           foreach($Couponall as $cuall){
                                            echo '<option value="'.$cuall['coupon_id'].'"';if($productDetails['admincoupon']===$cuall["coupon_id"]){ echo "selected"; } echo '>'.$cuall['coupon_code'].'</option>';
                                           }
                                           echo '</select>
                                            
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
                                               echo '<option value="'.$itmall['unit_id'].'"';if($offerl===$itmall["unit_id"]){ echo "selected"; } echo '>'.$itmall['Unit'].$itmall['UnitType'].'</option>';
                                           }
                                           echo '</select>
                                           
                                        </div>
							  <div class="col-md-2 p-1">
                                           
                                            <input type="text" class="form-control" id="product_offerpercent"  name="product_offerpercent[]"  value="'.$product_offerpercent[$ct].' " onkeyup="discount(this.value,'.$id.')" required>
                                        </div>
                                        <div class="col-md-4 p-1">
                                           
                                            <input type="date" class="form-control" id="offer_enddate"  name="offer_enddate" value="'.$productDetails['offer_enddate'].'"placeholder="enddate"   required>
                                        </div>
                                        <div class="col-md-2 p-1">
                                           <select  class="form-control" name="admincoupon" required>
                                           <option value="">code</option>';
                                           foreach($Couponall as $cuall){
                                            echo '<option value="'.$cuall['coupon_id'].'"';if($productDetails['admincoupon']===$cuall["coupon_id"]){ echo "selected"; } echo '>'.$cuall['coupon_code'].'</option>';
                                           }
                                           echo '</select>
                                            
                                        </div>';
							    
							$ct++; } }
                                        echo '<div class="col-md-2 p-1">
                                           
                                            <span><a href="javascript:void(0)" onclick="addiscount()">Add More</a></span>
                                        </div>
							</div>
							<div id="disapd" class="row"></div>
							</div></div>';
   }
   
   public function ManageNotification(){
    	$product=Notification::orderBy('notification_id', 'desc')->get();
    	return view('admin.ManageNotification')->with(compact('product'));

    }
    
    public function ManageSupport(){
    	$product=Support::orderBy('support_id', 'desc')->get();
    	return view('admin.ManageSupport')->with(compact('product'));

    }
     public function ManageGst(){
    	$product=Gstrate::orderBy('gstrate_id', 'desc')->get();
    	return view('admin.ManageGst')->with(compact('product'));

    }
    
    public function ManageCoupon(){
    	
    	$product=Coupon::get();
    	return view('admin.ManageCoupon')->with(compact('product'));
    }
    public function ManageReturnReason(){
    	
    	$product=Returnreason::get();
    	return view('admin.ManageReturnReason')->with(compact('product'));
    }
    public function ManageCancelReason(){
    	
    	$product=Cancelreason::get();
    	return view('admin.ManageCancelReason')->with(compact('product'));
    }
    
    public function EditCoupon(Request $request,$id=null){
    	$productDetails=Coupon::where(['coupon_id'=>$id])->first();
    	$productDetails['city']=Regions::get();
    	$productDetails['Vendors']=Vendors::get();
    	

    	return view('admin.EditCoupon')->with(compact('productDetails'));


    }
    
    public function UpdateCoupon(Request $request){
    	$data=$request->all();
    	if($request->hasFile('main_img')){
	 $img_temp=$request->file('main_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		//$product->main_img=$comurl.$filename;

	
	Coupon::where(['coupon_id'=>$data['coupon_id']])->update(['start_date'=>$data['start_date'],
	
	'end_date'=>$data['end_date'],

	'min_amount'=>$data['min_amount'],
	'dis_percent'=>$data['dis_percent'],
	'coupon_code'=>$data['coupon_code'],
	'city_id'=>$data['city_id'],
	'vendor_id'=>$data['vendor_id'],
	'main_img'=>$comurl.$filename,
	]);
	
}}else{
    	Coupon::where(['coupon_id'=>$data['coupon_id']])->update(['start_date'=>$data['start_date'],
	
	'end_date'=>$data['end_date'],

	'min_amount'=>$data['min_amount'],
	'dis_percent'=>$data['dis_percent'],
	'coupon_code'=>$data['coupon_code'],
	'city_id'=>$data['city_id'],
	'vendor_id'=>$data['vendor_id'],
	]);
}
    	return redirect()->back()->with('flash_message_success','Coupon has Been Update Successfully!');
    	//echo 0;
    }
    
     public function DeleteCoupon(Request $request,$id=null){
    	Coupon::where(['coupon_id'=>$id])->delete();
    	return redirect()->back()->with('flash_message_success','Coupon has Been Deleted Successfully!');

    }
    
    public function CreateFilter(Request $request){
       
       if($request->isMethod('post')){

	$data=$request->all();



	
	$product= new Coupon;
	$product->start_date=$data['start_date'];
	$product->end_date=$data['end_date'];
	$product->min_amount=$data['min_amount'];
	$product->dis_percent=$data['dis_percent'];
	$product->coupon_code=$data['coupon_code'];
	$product->city_id=$data['city_id'];
	$product->vendor_id=$data['vendor_id'];
	$product->category_id=json_encode($data['category_id']);

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
	
	$product->save();
	return redirect()->back()->with('flash_message_success','Successfully!');

	
	
       }
	
	$product=Regions::get();
    	
    	return view('admin.CreateFilter')->with(compact('product'));
    
    
    }
    
     public function CreateCoupon(Request $request){
       
       if($request->isMethod('post')){

	$data=$request->all();



	
	$product= new Coupon;
	$product->start_date=$data['start_date'];
	$product->end_date=$data['end_date'];
	$product->min_amount=$data['min_amount'];
	$product->dis_percent=$data['dis_percent'];
	$product->coupon_code=$data['coupon_code'];
	$product->city_id=$data['city_id'];
	$product->vendor_id=$data['vendor_id'];
	//$product->category_id=json_encode($data['category_id']);

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
	
	$product->save();
	return redirect()->back()->with('flash_message_success','Successfully!');

	
	
       }
	
	$product=Regions::get();
    	
    	return view('admin.AddCoupon')->with(compact('product'));
    
    
    }
    
     public function CreateCancelReason(Request $request){
       
       if($request->isMethod('post')){

	$data=$request->all();



	
	$product= new Cancelreason;
	$product->reason=$data['reason'];
	
	$product->save();
	return redirect()->back()->with('flash_message_success','Successfully!');

	
	
       }
	

    	return view('admin.AddCancelreason');
    
    }
    
     public function CreateReturnReason(Request $request){
       
       if($request->isMethod('post')){

	$data=$request->all();



	
	$product= new Returnreason;
	$product->reason=$data['reason'];

	$product->save();
	return redirect()->back()->with('flash_message_success','Successfully!');

	
	
       }
	

    	return view('admin.AddReturnreason');
    
    }
    
    public function CreateNotification(Request $request){
       
       if($request->isMethod('post')){

	$data=$request->all();



	
	$product= new Notification;
	$product->Title=$data['Title'];
	$product->NotiDesc=$data['NotiDesc'];
	$product->noti_city=$data['noti_city'];
	$product->notification_date=date("Y/m/d h:i:sa");
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
	
	$product->save();
	
	
	
	
	//$numdriver= $this->beats_model->select_data('*' , 'user_signup');;
			   
			   $ttlfcm=2;
    
    $registration_id=array();
    $dataset=array();
			//echo $ttlfcm;
// for($i=0; $i<$ttlfcm; $i++){
//     array_push($registration_id,$numdriver[$i]['fcm_tokenid']);
    
// }

				define( 'API_ACCESS_KEY', 'AAAAZp5GkMg:APA91bFpD0-XVB707y0qNAYN9K0IrMLCAa8373XpRBs5OnLNwTLysVBpDaBWCjSTKowdN169O4e62zLp3H8HohOmXy_dmv_LnOlm4ZELErDG1e0fiEGeM8jFr3bM11c_WyC9lCtNmkkL' );


$fcmMsg = array(
	'body' => 'New Notification',
	'title' => 'New Notification',
	'sound' => "default",
        'color' => "#203E78" 
);


$fcmFields = array(
	'registration_ids' => $registration_id,
        'priority' => 'high',
        'data'    => $dataset,
	'notification' => $fcmMsg
);
//$fcmFields = json_encode($fcmFields1);


$headers = array(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
$result = curl_exec($ch );
curl_close( $ch );
// 	print_r($result);
// 	die;
	
	return redirect()->back()->with('flash_message_success','Successfully!');

	
	
       }
       
       
       
       
	
	$product=Regions::get();
    	return view('admin.AddNotification')->with(compact('product'));
    	
    
    }
   
   
   public function VendorReg(Request $request){
       
       if($request->isMethod('post')){

	$data=$request->all();
	//print_r($data);

$token = $request->input('g-recaptcha-response');
if(strlen($token)>0){ 
  
	
	$product= new vendors;
	$product->Firm_name=$data['Firm_name'];
	$product->Firm_email=$data['Firm_email'];
	$product->Firm_password=rand(10000,99999);
	$product->Firm_phone=0;
	$product->Firm_Mobile=$data['Firm_Mobile'];
	$product->Firm_address=$data['Firm_address'];
	$product->Firm_pincode=$data['Firm_pincode'];
	$product->contactperson=$data['contactperson'];
	$product->Partnershipfirm=0;
	$product->Proprietary_Concern=0;
	$product->Vender_city=$data['Vender_city'];
	$product->Vendor_percent=0;
	$product->Firm_type=$data['Firm_type'];
	$product->Firm_year=$data['Firm_year'];
	$product->Vender_State=$data['Vender_State'];
	$product->Firm_Website=$data['Firm_Website'];
	$product->Designationperson=$data['Designation_person'];
	$product->Person_Mobile=1;
	$product->Firm_desc=$data['Firm_desc'];
	$product->Firm_GSTNo=$data['Firm_GSTNo'];
	$product->Firm_PANNo=$data['Firm_PANNo'];
	$product->ven_reg=1;
		$product->vendor_date=date('Y-m-d');
// 	$product->Firm_Acc=$data['Firm_Acc'];
// 	$product->Firm_bankName=$data['Firm_bankName'];
// 	$product->Bank_address=$data['Bank_address'];
// 	$product->Bank_code=$data['Bank_code'];
// 	$product->Bank_ifsc=$data['Bank_ifsc'];
	

	if($request->hasFile('FSSAImain_img')){
	 $img_temp=$request->file('FSSAImain_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->FSSAImain_img=$comurl.$filename;

	}
	
}

	if($request->hasFile('Pancard_img')){
	 $img_temp=$request->file('Pancard_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->Pancard_img=$comurl.$filename;

	}
	
}
if($request->hasFile('Adarmain_img')){
	 $img_temp=$request->file('Adarmain_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->Adarmain_img=$comurl.$filename;

	}
	
}
if($request->hasFile('gstoptional_img')){
	 $img_temp=$request->file('gstoptional_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->gstoptional_img=$comurl.$filename;

	}
	
}
if($request->hasFile('trademain_img')){
	 $img_temp=$request->file('trademain_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->trademain_img=$comurl.$filename;

	}
	
}
if($request->hasFile('Fdaoptional_img')){
	 $img_temp=$request->file('Fdaoptional_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->Fdaoptional_img=$comurl.$filename;

	}
	
}
if($request->hasFile('shopLicence_img')){
	 $img_temp=$request->file('shopLicence_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->shopLicence_img=$comurl.$filename;

	}
	
}
if($request->hasFile('ExciseRegoptional_img')){
	 $img_temp=$request->file('ExciseRegoptional_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->ExciseRegoptional_img=$comurl.$filename;

	}
	
}
if($request->hasFile('bankpass_img')){
	 $img_temp=$request->file('bankpass_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->bankpass_img=$comurl.$filename;

	}
	
}
	//$product->main_img=$data['main_img'];
	//$product->optional_img=$data['optional_img'];

	$product->save();
	return redirect()->back()->with('flash_message_success','Thank you ! You’ve successfully registered');
}else{
  return redirect()->back()->with('flash_message_error','Please complete the recaptcha to submit');
}
	//print_r($data);

}
	
//return redirect()->back()->with('flash_message_success','Product has Been added Successfully!');
	$product=States::get();
    	//return view('admin.AddProduct')->with(compact('product'));
    	//return view('admin.AddProduct');
    	return view('VendorReg')->with(compact('product'));
    	//return view('VendorReg');
    }
    public function login(){
    	return view('admin.index');
    }
    
    public function AdminLogout(Request $request){
 $request->session()->flush();
    	return view('admin.index');
    }

    public function Brand(Request $request){
    	if($request->isMethod('post')){
    		$data=$request->all();

    		$product= new Brands;
	
	$product->Brand_name=$data['Brand_name'];
	$product->Brand_desc=$data['Brand_desc'];
	$product->Brand_city=$data['Brand_city'];
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
	$product->save();
	$Brand_id=$product->id;
	Brands::where(['Brand_id'=>$Brand_id])->update(['Brand_lavel'=>$Brand_id]);
	
	return redirect()->back()->with('flash_message_success','Brand has Been added Successfully!');

    	}
    	$product=Regions::get();
    	return view('admin.AddBrand')->with(compact('product'));
    	
    }
    public function ManageBrand(){
    	$product=Brands::orderBy('Brand_name', 'asc')->get();
    	return view('admin.ManageBrand')->with(compact('product'));

    }
    public function Brandstatus(Request $request){
       $data=$request->all();
    Brands::where(['Brand_id'=>$data['id']])->update(['Brand_status'=>$data['status']]);

echo $data['status'];
//print_r();
    }
    
     public function vendorstatus(Request $request){
       $data=$request->all();
    Vendors::where(['vender_id'=>$data['id']])->update(['vendor_status'=>$data['status']]);

echo $data['status'];
//print_r();
    }
	public function vendorstatusdel(Request $request){
       $data=$request->all();
    Vendors::where(['vender_id'=>$data['id']])->update(['vendor_status_del'=>1]);

return redirect()->back()->with('flash_message_success','Selleer has Been Deleted Successfully!');
//print_r();
    }
    
    public function productstatus(Request $request){
       $data=$request->all();
    Product::where(['product_id'=>$data['id']])->update(['product_status'=>$data['status']]);

echo $data['status'];
//print_r();
    }
    
    public function EditBrand(Request $request,$id=null){
    	$productDetails=Brands::where(['Brand_id'=>$id])->first();
    	$productDetails['city']=Regions::get();
    	

    	return view('admin.EditBrand')->with(compact('productDetails'));


    }
    
    
    public function UpdateBrand(Request $request){
    	$data=$request->all();
    	Brands::where(['Brand_id'=>$data['Brand_id']])->update(['Brand_name'=>$data['Brand_name'],'Brand_desc'=>$data['Brand_desc'],'Brand_lavel'=>$data['Brand_lavel'],'Brand_city'=>$data['Brand_city']]);
    	return redirect()->back()->with('flash_message_success','Product has Been Update Successfully!');
    	//echo 0;
    }
    
     public function DeleteBrand(Request $request,$id=null){
    	Brands::where(['Brand_id'=>$id])->delete();
    	return redirect()->back()->with('flash_message_success','Category has Been Deleted Successfully!');

    }


    public function Region(Request $request){

if($request->isMethod('post')){
    		$data=$request->all();

    		$product= new Regions;
    		
    		$cityDetails=Regions::where(['region_name'=>$data['region_name']])->first();
    		if(empty($cityDetails)){
	
	$product->region_name=$data['region_name'];
	if($request->hasFile('main_img')){
	 $img_temp=$request->file('main_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		\Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->main_img=$comurl.$filename;

	}
	
}
	$product->save();
	return redirect()->back()->with('flash_message_success','City has Been added Successfully!');
    		}else{
    		    return redirect()->back()->with('flash_message_error','City Already found!');
    		}

    	}
    	return view('admin.AddRegion');
    }
    
     public function Unit(Request $request){

if($request->isMethod('post')){
    		$data=$request->all();

    		$product= new Unit;
	
	$product->Unit=$data['Unit'];
	$product->UnitType=$data['UnitType'];
	
	$product->save();
	return redirect()->back()->with('flash_message_success','Unit has Been added Successfully!');

    	}
    	return view('admin.Unit');
    }
    
    
    public function updateminorder(Request $request){

if($request->isMethod('post')){
    		$data=$request->all();

    	
	
	

	Gstrate::where(['gstrate_id'=>1])->update(['Min_order'=>$data['Min_order']]);
	return redirect()->back()->with('flash_message_success','Successfully update!');

    	}
    	return view('admin.ManageGst');
    }
    
     public function Addgst(Request $request){

if($request->isMethod('post')){
    		$data=$request->all();

    	
	
	

	Gstrate::where(['gstrate_id'=>$data['gstrate_id']])->update(['gstrate'=>$data['gstrate']]);
	return redirect()->back()->with('flash_message_success','Successfully update!');

    	}
    	return view('admin.ManageGst');
    }
    
    public function ManageRegion(){
    	
    	$product=Regions::orderBy('region_name', 'asc')->get();
    	return view('admin.ManageRegion')->with(compact('product'));
    }

public function ManageUnit(){
    	
    	$product=Unit::get();
    	return view('admin.ManageUnit')->with(compact('product'));
    }

public function OffersBanner(Request $request){

if($request->isMethod('post')){
    		$data=$request->all();

    		$product= new Banneroffer;
	
	
	if($request->hasFile('banner_img')){
	 $img_temp=$request->file('banner_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		\Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->banner_img=$comurl.$filename;

	}
	
}

	$product->save();
	return redirect()->back()->with('flash_message_success','Region banner has Been added Successfully!');

    	}
		$product=Regions::get();
    	return view('admin.OffersBanner')->with(compact('product'));
    }
    public function ManageOffersBanner(){
    	
    	$product=Banneroffer::get();
    	return view('admin.ManageOffersBanner')->with(compact('product'));
    }


public function Banner(Request $request){

if($request->isMethod('post')){
    		$data=$request->all();

    		$product= new Banner;
	
	
	if($request->hasFile('banner_img')){
	 $img_temp=$request->file('banner_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		\Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->banner_img=$comurl.$filename;

	}
	
}
$product->region_id=$request->region_id;
	$product->save();
	return redirect()->back()->with('flash_message_success','Region banner has Been added Successfully!');

    	}
		$product=Regions::get();
    	return view('admin.AddBanner')->with(compact('product'));
    }
    public function ManageBanner(){
    	
    	$product=Banner::get();
    	return view('admin.ManageBanner')->with(compact('product'));
    }


public function Slider(Request $request){

if($request->isMethod('post')){
    		$data=$request->all();

    		$product= new Slider;
	
	
	if($request->hasFile('Slider_img')){
	 $img_temp=$request->file('Slider_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		\Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->Slider_img=$comurl.$filename;

	}
	
}
	$product->save();
	return redirect()->back()->with('flash_message_success','Region has Been added Successfully!');

    	}
    	return view('admin.AddSlider');
    }
    public function ManageSlider(){
    	
    	$product=Slider::get();
    	return view('admin.ManageSlider')->with(compact('product'));
    }

    public function Category(Request $request){
    	if($request->isMethod('post')){
    		$data=$request->all();

    		$product= new Product_category;
    		$cityDetails=Product_category::where(['caregory_name'=>$data['caregory_name']])->first();
    		if(empty($cityDetails)){
	
	$product->caregory_name=$data['caregory_name'];
	$product->save();
	return redirect()->back()->with('flash_message_success','Category has Been added Successfully!');
}else{
    	return redirect()->back()->with('flash_message_error','Category already Added!');
}
    	}


    	return view('admin.AddCategory');
    }
    public function ManageCategory(){
    	
    	$product=Product_category::orderBy('caregory_name', 'asc')->get();
    	return view('admin.ManageCategory')->with(compact('product'));
    }


 public function testType(Request $request){
    	if($request->isMethod('post')){
    		$data=$request->all();

    		$product= new Tst_type;
    		$cityDetails=Tst_type::where(['name'=>$data['name']])->first();
    		if(empty($cityDetails)){
	
	$product->name=$data['name'];
	$product->save();
	return redirect()->back()->with('flash_message_success','Tets type has Been added Successfully!');
}else{
    	return redirect()->back()->with('flash_message_error','Test type already Added!');
}
    	}


    	return view('admin.testType');
    }
    public function Managetesttype(){
    	
    	$product=Tst_type::orderBy('name', 'asc')->get();
    	return view('admin.Managetesttype')->with(compact('product'));
    }



    public function Dashboard(Request $request){
    	//return view('admin.dashboard');
		
		if(!empty($request->session()->get('adminid'))){
         
			  
           	return view('admin.dashboard'); 
       }else{
       if($request->isMethod('post')){
           $data=$request->all();
           $productDetails=Admins::where(['admin_email'=>$data['Firm_email'],'admin_password'=>$data['Firm_password']])->first();
           
           if(empty($productDetails)){
               return redirect()->back()->with('flash_message_success','Email or Password wrong!');
           }else{
               $request->session()->put('admin_email', $data['Firm_email']);
               $request->session()->put('admin_name', $productDetails['Firm_name']);
               $request->session()->put('adminid', $productDetails['Admin_id']);
			   
			   
			   
           	return view('admin.dashboard');
           }
       }
    	//return Redirect::to('Vender');
    	return redirect('admin');
       }
    }


public function CreateVendor(Request $request){
	
   if($request->isMethod('post')){

	$data=$request->all();
	//print_r($data);


	
	$product= new vendors;
	$product->Firm_name=$data['Firm_name'];
	$product->Firm_email=$data['Firm_email'];
	$product->Firm_password=rand(10000,99999);
	$product->Firm_phone=$data['Firm_phone'];
	$product->Firm_Mobile=$data['Firm_Mobile'];
	$product->Firm_address=$data['Firm_address'];
	$product->Firm_pincode=$data['Firm_pincode'];
	$product->contactperson=$data['contactperson'];
	$product->Partnershipfirm=$data['Partnershipfirm'];
	$product->Proprietary_Concern=$data['Proprietary_Concern'];
	$product->Vender_city=$data['Vender_city'];
	$product->Vendor_percent=$data['Vendor_percent'];
	$product->Firm_type=$data['Firm_type'];
	$product->Firm_year=$data['Firm_year'];
	$product->Firm_Acc=$data['Firm_Acc'];
	$product->Firm_bankName=$data['Firm_bankName'];
	$product->Bank_address=$data['Bank_address'];
	$product->Bank_code=$data['Bank_code'];
	$product->Bank_ifsc=$data['Bank_ifsc'];
	$product->Brand_id=$data['Brand_id'];
	$product->vendor_date=date('Y-m-d');
	$product->venCategory=json_encode($data['venCategory']);
	

	if($request->hasFile('FSSAImain_img')){
	 $img_temp=$request->file('FSSAImain_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->FSSAImain_img=$comurl.$filename;

	}
	
}

	if($request->hasFile('Pancard_img')){
	 $img_temp=$request->file('Pancard_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->Pancard_img=$comurl.$filename;

	}
	
}
if($request->hasFile('Adarmain_img')){
	 $img_temp=$request->file('Adarmain_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->Adarmain_img=$comurl.$filename;

	}
	
}
if($request->hasFile('gstoptional_img')){
	 $img_temp=$request->file('gstoptional_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->gstoptional_img=$comurl.$filename;

	}
	
}
if($request->hasFile('trademain_img')){
	 $img_temp=$request->file('trademain_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->trademain_img=$comurl.$filename;

	}
	
}
if($request->hasFile('Fdaoptional_img')){
	 $img_temp=$request->file('Fdaoptional_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->Fdaoptional_img=$comurl.$filename;

	}
	
}
if($request->hasFile('shopLicence_img')){
	 $img_temp=$request->file('shopLicence_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->shopLicence_img=$comurl.$filename;

	}
	
}
if($request->hasFile('ExciseRegoptional_img')){
	 $img_temp=$request->file('ExciseRegoptional_img');
	if($img_temp->isValid()){
		$extension=$img_temp->getClientOriginalExtension();
		$filename=rand(111,99999).'.'.$extension;
		$large_image_path='images/backend_img/product/'.$filename;
		Image::make($img_temp)->save($large_image_path);
$comurl=url('/').'/images/backend_img/product/';
		$product->ExciseRegoptional_img=$comurl.$filename;

	}
	
}
	//$product->main_img=$data['main_img'];
	//$product->optional_img=$data['optional_img'];

	$product->save();
	return redirect()->back()->with('flash_message_success','Vendor has Been added Successfully!');
	
	//print_r($data);
}
	
//return redirect()->back()->with('flash_message_success','Product has Been added Successfully!');
	//$product=Regions::get();
	
	$allregbrand=Vendors::select('Brand_id')->get();
// 	print_r($allregbrand);
// 	die;
	$productDetails['Brands']=Brands::whereNotIn('Brand_id', $allregbrand)->orderBy('Brand_name', 'asc')->get();
    	$productDetails['Regions']=Regions::get();
    	
    	$productDetails['category']=Product_category::orderBy('caregory_name', 'asc')->get();

    	return view('admin.AddVendor')->with(compact('productDetails'));
    	//return view('admin.AddProduct')->with(compact('product'));
    	//return view('admin.AddProduct');
    	//return view('admin.AddVendor')->with(compact('product'));
	   
    }
public function ManageVendor(){
    	
    	$product=Vendors::where(['vendor_status_del'=>0])->get();
    	return view('admin.ManageVendor')->with(compact('product'));
    }




    


public function Product(Request $request){
if($request->isMethod('post')){

	$data=$request->all();
	//print_r($data);


	
	$product= new Product;
	$product->vender_id=0;
	$product->product_catgory=$data['product_catgory'];
	$product->Brand_name=1;
	$product->product_ingredients=$data['product_ingredients'];
	$product->Regions=1;
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
	//$product=Product_category::get();
	//$product['unitr']=Unit::get();
	
	//$productDetails=Coupon::where(['coupon_id'=>$id])->first();
    	$productDetails['category']=Product_category::get();
    	$productDetails['unit']=Unit::get();
    	

    	return view('admin.AddProduct')->with(compact('productDetails'));


    	//return view('admin.AddProduct')->with(compact('product'));
    	//return view('admin.AddProduct');
    }

    public function ManageProduct(){
    	//$comurl="{{url('/')}}".'images/backend_img/product/';
    	//echo url('/');
    	//die; 
    	
    	    $productDetails['category'] = DB::table('products')
                ->join('brands', 'products.Brand_name', '=', 'brands.Brand_id')
                ->join('vendors', 'products.vender_id', '=', 'vendors.vender_id')
                ->select('products.*', 'brands.*', 'vendors.*')
                ->orderBy('products.product_title', 'asc')
                ->get();
                
                $productDetails['unit']=Unit::get();
                //dd($productDetails);
                //dd($productDetails['category']);
    	//$product=Product::orderBy('product_title', 'asc')->get();
    	//return view('admin.ManageProduct')->with(compact('productDetails'));
      return view('admin.ManageProduct', $productDetails);
    }
    
     public function ManageUser(){
    	//$comurl="{{url('/')}}".'images/backend_img/product/';
    	//echo url('/');
    	//die; 
    	$product=User::get();
    	return view('admin.ManageUser')->with(compact('product'));
    }
    
    public function EditProduct(Request $request,$id=null){
    	$productDetails=Product::where(['product_id'=>$id])->first();

    	return view('admin.edit_product')->with(compact('productDetails'));


    }
    
    public function EditCategory(Request $request,$id=null){
    	$productDetails=Product_category::where(['category_id'=>$id])->first();

    	return view('admin.EditCategory')->with(compact('productDetails'));


    }
    
    public function Edittype(Request $request,$id=null){
    	$productDetails=Tst_type::where(['tsttype_id'=>$id])->first();

    	return view('admin.Edittype')->with(compact('productDetails'));


    }
    
    public function UpdateCategory(Request $request){
    	$data=$request->all();
    	Product_category::where(['category_id'=>$data['category_id']])->update(['caregory_name'=>$data['caregory_name']]);
    	return redirect()->back()->with('flash_message_success','Product has Been Update Successfully!');
    	//echo 0;
    }
    public function UpdateType(Request $request){
    	$data=$request->all();
    	Tst_type::where(['tsttype_id'=>$data['tsttype_id']])->update(['name'=>$data['name']]);
    	return redirect()->back()->with('flash_message_success',' Update Successfully!');
    	//echo 0;
    }
    
    
     
    
    
    public function UpdateProduct(Request $request){
    	$data=$request->all();
    	Product::where(['product_id'=>$data['product_id']])->update(['product_catgory'=>$data['product_catgory'],
	'Brand_name'=>'A',
	'product_ingredients'=>$data['product_ingredients'],
	'Regions'=>1,
	'product_title'=>$data['product_title'],
	'product_weight'=>$data['product_weight'],
	'product_price'=>$data['product_price'],
	'product_about'=>$data['product_about'],
	'Shelf_Life'=>$data['Shelf_Life'],
	'product_type'=>$data['product_type'],
	'Organic'=>$data['Organic'],
	'Gluten'=>$data['Gluten'],
	'Peanut'=>$data['Peanut'],
	'Lactose'=>$data['Lactose'],
	'Licence'=>$data['Licence'],
	'Temperature'=>$data['Temperature'],
	'Nutritional'=>$data['Nutritional']]);
    	return redirect()->back()->with('flash_message_success','Product has Been Update Successfully!');
    	//echo 0;
    }
    
     public function UpdateProductOffer(Request $request){
    	$data=$request->all();
    	
    	Product::where(['product_id'=>$data['product_id']])->update([
	'product_Offer_status'=>'1',
	'product_offerpercent'=>json_encode($data['product_offerpercent']),
	'product_priceOffer'=>json_encode($data['offerunit']),
	'offer_enddate'=>$data['offer_enddate'],
	'admincoupon'=>$data['admincoupon'],
	
	]);
    	return redirect()->back()->with('flash_message_success','Product offers has Been Update Successfully!');
    	//echo 0;
    }
    
    public function UpdateProductcomment(Request $request){
    	$data=$request->all();
    	
    	Product::where(['product_id'=>$data['product_id']])->update([
	'product_comment'=>$data['product_comment']
	
	]);
    	return redirect()->back()->with('flash_message_success','Update Successfully!');
    	//echo 0;
    }
    public function DeleteProduct(Request $request,$id=null){
    	Product::where(['product_id'=>$id])->delete();
    	return redirect()->back()->with('flash_message_success','Product has Been Deleted Successfully!');

    }
    
    
    public function DeleteNotification(Request $request,$id=null){
    	Notification::where(['notification_id'=>$id])->delete();
    	return redirect()->back()->with('flash_message_success','Notification has Been Deleted Successfully!');

    }
     public function DeleteCategory(Request $request,$id=null){
    	Product_category::where(['category_id'=>$id])->delete();
    	return redirect()->back()->with('flash_message_success','Category has Been Deleted Successfully!');

    }
    
     public function DeleteType(Request $request,$id=null){
    	Tst_type::where(['tsttype_id'=>$id])->delete();
    	return redirect()->back()->with('flash_message_success',' Deleted Successfully!');

    }
    
    public function EditRegion(Request $request,$id=null){
    	$productDetails=Regions::where(['region_id'=>$id])->first();

    	return view('admin.EditRegion')->with(compact('productDetails'));


    }
    public function EditUnit(Request $request,$id=null){
    	$productDetails=Unit::where(['unit_id'=>$id])->first();

    	return view('admin.EditUnit')->with(compact('productDetails'));


    }
    
    public function UpdateUnit(Request $request){
    	$data=$request->all();
    	Unit::where(['unit_id'=>$data['unit_id']])->update(['Unit'=>$data['Unit'],'UnitType'=>$data['UnitType']]);
    	return redirect()->back()->with('flash_message_success','Unit has Been Update Successfully!');
    	//echo 0;
    }
    
    public function UpdateRegion(Request $request){
    	$data=$request->all();
    	Regions::where(['region_id'=>$data['region_id']])->update(['region_name'=>$data['region_name']]);
    	return redirect()->back()->with('flash_message_success','Product has Been Update Successfully!');
    	//echo 0;
    }
    
     public function DeleteRegion(Request $request,$id=null){
    	Regions::where(['region_id'=>$id])->delete();
    	return redirect()->back()->with('flash_message_success','Category has Been Deleted Successfully!');

    }
     public function DeleteSlider(Request $request,$id=null){
    	Slider::where(['Slider_id'=>$id])->delete();
    	return redirect()->back()->with('flash_message_success','Slider has Been Deleted Successfully!');

    }
    

    public function ManageOrder($id){
        
        $product1=$id;
        
        
        	$product=Order::where(['order_status'=>$id])->get();
    	return view('admin.ManageOrder')->with(compact('product','product1'));
    	//return view('admin.ManageOrder');
    }

    public function ManageSale(){
    	return view('admin.ManageSale');
    }
    public function ManageReturn(){
    	return view('admin.ManageReturn');
    }


public function ManagePayment(){
    	return view('admin.ManagePayment');
    }
    public function ManageOffers(){
    	$productDetails['product']=Product::where(['product_Offer_status'=>1])->orderBy('product_offerpercent', 'desc')->get();;
      $productDetails['unit']=Unit::get();
    	return view('admin.ManageProduct', $productDetails);
    }
    
    	public function BestSellers(Request $request){
$product=Brands::orderBy('Brand_lavel', 'asc')->take(6)->get();
     return view('admin.ManageBestSeller')->with(compact('product'));
     //return UserResource::Collection(Brands::find($request->Brands()));
    }
    public function AddOffers(){
    	return view('admin.ManageReturn');
    }


    public function ProductCreate(){
    	echo "hello";
    }




}
