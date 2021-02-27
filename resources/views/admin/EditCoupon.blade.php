@extends('admin.master') 
@section('submenu')

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('Product')}}">Add Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('ManageProduct')}}">Manage Products</a>
                            </li>
                            
                            
                    @stop                  
@section('maincontent')

<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="RegisterValidation" action="{{url('UpdateCoupon')}}" method="Post" enctype="multipart/form-data">
@csrf
                                <div class="card ">
                                    <div class="card-header card-header-rose card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">mail_outline</i>
                                        </div>
                                        <h4 class="card-title">Coupon</h4>
                                        @if(Session::has('flash_message_success'))
                                        <div class="alert alert-success alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button> 

        <strong>{{ Session::get('flash_message_success') }}</strong>

</div>
                                       
@endif


                                    </div>
                                    <div class="card-body">
                                    <div class="row">
                                    <div class="col-md-6">
								
                                        <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating">start_date *</label>
                                            <input type="date" class="form-control" id="start_date"  name="start_date" value="{{$productDetails->start_date}}" required>
                                            <input type="hidden" class="form-control" id="coupon_id"  name="coupon_id" value="{{$productDetails->coupon_id}}" required>
                                        </div>

                                  <div class="form-group">
                                            <label for="examplePassword" class="bmd-label-floating"> end_date *</label>
                                            <input type="date" class="form-control" id="end_date"  name="end_date"  value="{{$productDetails->end_date}}"required>
                                        </div>
                                      
                                       
                                       <div class="form-group">
                                            <label for="examplePassword" class="bmd-label-floating"> min_amount *</label>
                                            <input type="number" class="form-control" id="min_amount"  name="min_amount" value="{{$productDetails->min_amount}}" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="examplePassword" class="bmd-label-floating"> dis_percent *</label>
                                            <input type="number" class="form-control" id="dis_percent"  name="dis_percent" value="{{$productDetails->dis_percent}}" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="examplePassword" class="bmd-label-floating"> coupon_code *</label>
                                            <input type="text" class="form-control" id="coupon_code"  name="coupon_code"  value="{{$productDetails->coupon_code}}" required>
                                        </div>
                                        
                                        <div class="form-group">
										
                                            
                                                    <select class="selectpicker" name="city_id" data-style="select-with-transition" title="Brand City"  data-size="7" onchange="vendor(this.value)" required>
                                                        <option value=""> Select City</option>
                                                        
                                                        
                                                    @foreach($productDetails['city'] as $res)
                                                   
                                                        <option value="{{$res['region_id']}}" @if($res['region_id']==$productDetails->city_id) {{'selected'}} @endif>{{$res['region_name']}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                        </div>
                                        
                                        <div class="form-group">
										
                                                    <select class="selectpicker" id="vendor_id" name="vendor_id" data-style="select-with-transition" title="Vendor"  data-size="7" required>
                                                        <option value=""> Select City</option>
                                                        
                                                        
                                                    @foreach($productDetails['Vendors'] as $res1)
                                                   
                                                        <option value="{{$res1['vender_id']}}" @if($res1['vender_id']==$productDetails->vendor_id) {{'selected'}} @endif>{{$res1['Firm_name']}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6">
								
                                      
                                       <img src="{{ $productDetails->main_img }}"  style="height: 90px;">
                                        
                                      
                                       

<div class="row">
                                       <div class="col-md-6 col-sm-6">
                      <h4 class="title">Image</h4>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <img src="{{asset('images/backend_img/image_placeholder.jpg')}}" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="hidden"><input type="file" id="main_img" name="main_img">
                          <div class="ripple-container"></div></span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                                 
                    </div>


                                        
                                      
                                       
                                    </div>
									
                                    </div>
                                    </div>
                                    <div class="card-footer text-right">

                                        <button type="submit" class="btn btn-rose">Submit</button>
                                    </div>
                                </div>
								</form>
                            
                        </div>
                        
                       
                        
                    </div>
                </div>

            </div>

@stop
