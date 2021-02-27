@extends('vender.master')                  
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
                             @if($productDetails['product']->product_status==0) 
                                      @php $st=''; 
                                      $rst='';
                                      @endphp
                                        @else
                                       @php $st='readonly';
                                       $rst='disabled';
                                       @endphp
                                        @endif
                                      
                            @if(empty($st))
                            <form id="RegisterValidation" action="{{url('VendorUpdateProduct')}}" method="Post" enctype="multipart/form-data">
                                @else
                                <form id="RegisterValidation" action="{{url('VendorUpdateProductprice')}}" method="Post" enctype="multipart/form-data">
                                    @endif
                                
@csrf
                                <div class="card ">
                                    <div class="card-header card-header-rose card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">mail_outline</i>
                                        </div>
                                        <h4 class="card-title">Product Update</h4>
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
                                            <label for="exampleEmail" class="bmd-label-floating"> Product Title *</label>
                                            <input type="text" class="form-control" id="exampleEmail"  name="product_title" value="{{$productDetails['product']->product_title}}" {{ $st }} required>
                                            <input type="hidden" class="form-control" id="exampleEmail"  name="product_id" value="{{$productDetails['product']->product_id}}" required>
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating"> Product Ingredients *</label>
                                            <input type="text" class="form-control" id="exampleEmail"  name="product_ingredients" value="{{$productDetails['product']->product_ingredients}}"  {{ $st }} required>
                                        </div>

                                        <div class="form-group">
										
                                            <select class="selectpicker" name="product_catgory" data-style="select-with-transition" title="Product Category"  data-size="7"  {{ $st }}required>
                                                        <option value="" {{$rst}}> Select Category</option>
                                                        
                                                        
                                                    @foreach($productDetails['category'] as $res)
                                                        <option value="{{$res['category_id']}}" @if($productDetails['product']->product_catgory==$res['category_id']) {{'Selected'}} @endif {{$rst}}>{{$res['caregory_name']}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                        </div>
                                        
                                        
                                        @php $count=0; 
                                        $ttlu=json_decode($productDetails['product']->unit);
                                        @endphp
							@foreach($ttlu as $res1)
							@php 
							
							
							$price=json_decode($productDetails['product']->unitprice); @endphp
                                        <div class="col-md-12">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label text-left label-checkbox">Unit</label>
                                            
                                            
                                                  
                                                    <div class="form-group col-sm-4">
										
                                            <select  class="form-control" name="unit[]" data-style="select-with-transition" title="Unit"  data-size="7" required>
                                                         <option value="">{{$res1}}</option>
                                                        @foreach($productDetails['unit'] as $res)
                                                        <option value="{{$res['unit_id']}}" @if($res1==$res['unit_id']) {{'Selected'}} @endif>{{$res['Unit']}}{{$res['UnitType']}}</option>
                                                         @endforeach
                                                        
                                                    </select>
                                        </div>
                                          <div class="form-group col-sm-3">
										
                                            <input type="text" class="form-control" id="exampleEmail"  name="unitprice[]"  placeholder="price" value="{{ $price[$count]}}" required>
                                        </div>
                                             <div class="form-group col-sm-3">
										
                                            <span><a href="javascript:void(0)" onclick="addunit()">Add More</a></span>
                                        </div>   
                                           
                                        </div>
                                    </div>
                                    @php $count++; @endphp
							 @endforeach
                                     <div class="col-md-12">
                                        <div class="row" id="unitapd">
                                              
                                           
                                        </div>
                                    </div>

<!--<div class="form-group">-->
<!--                                            <label for="examplePassword" class="bmd-label-floating">(400g) Price(Rs.) *</label>-->
<!--                                            <input type="text" class="form-control" id="examplePassword2"  name="product_price400" required>-->
<!--                                        </div>-->
                                        
<!--                                        <div class="form-group">-->
<!--                                            <label for="examplePassword" class="bmd-label-floating">(500g) Price(Rs.) *</label>-->
<!--                                            <input type="text" class="form-control" id="examplePassword2"  name="product_price500" required>-->
<!--                                        </div>-->
                                        <div class="form-group">
                                            <label for="examplePassword" class="bmd-label-floating"> Description *</label>
                                            <input type="text" class="form-control" id="examplePassword2"  name="product_about" value="{{$productDetails['product']->product_about}}" {{ $st }} required>
                                        </div>
                      <!--                  <div class="col-md-12">-->
                      <!--                  <div class="row">-->
                      <!--                      <label class="col-sm-2 col-form-label text-left label-checkbox">Shelf Life</label>-->
                      <!--                      <div class="col-sm-9 checkbox-radios">-->
                      <!--                          <div class="form-check text-left form-check-inline">-->
                      <!--                              <label class="form-check-label text-dark">-->
                      <!--                                 <input class="form-check-input" type="text" name="Shelf_Life" value="Yes" required=""> Yes-->
                      <!--                                  <span class="form-check-sign">-->
                      <!--<span class="check"></span>-->
                      <!--                                  </span>-->
                      <!--                              </label>-->
                      <!--                          </div>-->
                      <!--                          <div class="form-check  text-right form-check-inline">-->
                      <!--                              <label class="form-check-label text-dark">-->
                      <!--                                  <input class="form-check-input" type="radio" name="Shelf_Life" value="No" required=""> NO-->
                      <!--                                  <span class="form-check-sign">-->
                      <!--<span class="check"></span>-->
                      <!--                                  </span>-->
                      <!--                              </label>-->
                      <!--                          </div>-->
                                                
                      <!--                      </div>-->
                      <!--                  </div>-->
                      <!--              </div>-->
                      
                       <div class="form-group">
										
                                            <select class="selectpicker" name="product_test" data-style="select-with-transition" title="Product Test"  data-size="7" >
                                                        <option value="" {{$rst}}> Select Test</option>
                                                        
                                                        
                                                    @foreach($productDetails['Tsttype'] as $res)
                                                        <option value="{{$res['name']}}" @if($productDetails['product']->product_test==$res['name']) {{'Selected'}} @endif {{$rst}} >{{$res['name']}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                        </div>
                                       <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating"> Shelf Life(in Days) *</label>
                                            <input type="text" class="form-control" id="Shelf_Life"  name="Shelf_Life" value="{{$productDetails['product']->Shelf_Life}}" {{ $st }} required>
                                        </div>
                                       

                                       






                                       
                                        
                                       
                                    </div>
									<div class="col-md-6">
									    
                                         <div class="col-md-12">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label text-left label-checkbox">Type</label>
                                            <div class="col-sm-9 checkbox-radios">
                                                <div class="form-check text-left form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                       <input class="form-check-input" type="radio" name="product_type" value="Veg" required="" @if($productDetails['product']->product_type=='Veg') {{'checked'}} @endif {{$rst}}> Veg
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                           
                                                <div class="form-check  text-right form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                        <input class="form-check-input" type="radio" name="product_type" value="Nonveg" required="" @if($productDetails['product']->product_type=='Nonveg') {{'checked'}} @endif {{$rst}}> Nonveg
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-md-12">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label text-left label-checkbox">Organic</label>
                                            <div class="col-sm-9 checkbox-radios">
                                                <div class="form-check text-left form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                       <input class="form-check-input" type="radio" name="Organic" value="Yes" required="" @if($productDetails['product']->Organic=='Yes') {{'checked'}} @endif {{$rst}}> Yes
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check  text-right form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                        <input class="form-check-input" type="radio" name="Organic" value="NO" required="" @if($productDetails['product']->Organic=='No') {{'checked'}} @endif {{$rst}}> NO
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                        
                                        <div class="col-md-12">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label text-left label-checkbox">Gluten</label>
                                            <div class="col-sm-9 checkbox-radios">
                                                <div class="form-check text-left form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                       <input class="form-check-input" type="radio" name="Gluten" value="Yes" required="" @if($productDetails['product']->Gluten=='Yes') {{'checked'}} @endif {{$rst}}> Yes
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check  text-right form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                        <input class="form-check-input" type="radio" name="Gluten" value="NO" required="" @if($productDetails['product']->Gluten=='No') {{'checked'}} @endif {{$rst}}> NO
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                        
                                        <div class="col-md-12">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label text-left label-checkbox">Peanut</label>
                                            <div class="col-sm-9 checkbox-radios">
                                                <div class="form-check text-left form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                       <input class="form-check-input" type="radio" name="Peanut" value="Yes" required="" @if($productDetails['product']->Peanut=='Yes') {{'checked'}} @endif {{$rst}}> Yes
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check  text-right form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                        <input class="form-check-input" type="radio" name="Peanut" value="NO" required="" @if($productDetails['product']->Peanut=='No') {{'checked'}} @endif {{$rst}}> NO
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                        
                                        <div class="col-md-12">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label text-left label-checkbox">Lactose</label>
                                            <div class="col-sm-9 checkbox-radios">
                                                <div class="form-check text-left form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                       <input class="form-check-input" type="radio" name="Lactose" value="Yes" required="" @if($productDetails['product']->Lactose=='Yes') {{'checked'}} @endif {{$rst}}> Yes
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check  text-right form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                        <input class="form-check-input" type="radio" name="Lactose" value="NO" required="" @if($productDetails['product']->Lactose=='No') {{'checked'}} @endif {{$rst}}> NO
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                        
                                        <div class="col-md-12">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label text-left label-checkbox">Licence</label>
                                            <div class="col-sm-9 checkbox-radios">
                                                <div class="form-check text-left form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                       <input class="form-check-input" type="radio" name="Licence" value="Yes" required="" @if($productDetails['product']->Licence=='Yes') {{'checked'}} @endif {{$rst}}> Yes
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check  text-right form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                        <input class="form-check-input" type="radio" name="Licence" value="No" required="" @if($productDetails['product']->Licence=='No') {{'checked'}} @endif {{$rst}}> NO
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                       
                                        <div class="col-md-12">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label text-left label-checkbox">Temperature</label>
                                            <div class="col-sm-9 checkbox-radios">
                                                <div class="form-check text-left form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                       <input class="form-check-input" type="radio" name="Temperature" value="Yes" required="" @if($productDetails['product']->Temperature=='Yes') {{'checked'}} @endif {{$rst}}> Yes
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check  text-right form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                        <input class="form-check-input" type="radio" name="Temperature" value="No" required="" @if($productDetails['product']->Temperature=='No') {{'checked'}} @endif {{$rst}}> NO
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                        
                                        <div class="col-md-12">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label text-left label-checkbox">Nutritional</label>
                                            <div class="col-sm-9 checkbox-radios">
                                                <div class="form-check text-left form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                       <input class="form-check-input" type="radio" name="Nutritional" value="Yes" required="" @if($productDetails['product']->Nutritional=='Yes') {{'checked'}} @endif {{$rst}}> Yes
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check  text-right form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                        <input class="form-check-input" type="radio" name="Nutritional" value="No" required="" @if($productDetails['product']->Nutritional=='No') {{'checked'}} @endif {{$rst}}> NO
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
<div class="row">
                                       <div class="col-md-6 col-sm-6">
                      <h4 class="title">Main Image</h4>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <img src="{{$productDetails['product']->main_img}}" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                        @if(empty($rst))
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="hidden"><input type="file" id="main_img" name="main_img" >
                          <div class="ripple-container"></div></span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                        @endif
                      </div>
                    </div>
                                 <div class="col-md-6 col-sm-6">
                      <h4 class="title">Optional Image</h4>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <img src="{{$productDetails['product']->optional_img}}" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                         @if(empty($rst))
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="hidden"><input type="file" name="optional_img" id="optional_img">
                          <div class="ripple-container"></div></span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                         @endif
                      </div>
                    </div>
                    </div>
                    

										
                                        
                                    </div>
                                    </div>
                                    </div>
                                    <div class="card-footer text-right">

                                        <button type="submit" class="btn btn-rose">Update</button>
                                    </div>
                                </div>
								</form>
                            
                        </div>
                        
                       
                        
                    </div>
                </div>

            </div>

@stop
<script>
    function addunit(){
        //alert();
        $("#unitapd").append(`<label class="col-sm-2 col-form-label text-left label-checkbox">Unit</label>
                                            
                                            
                                                  
                                                    <div class="form-group col-sm-5">
										
                                            <select class="form-control" name="unit[]"  title="Unit"  data-size="7" required>
                                                         <option value="">Unit</option>
                                                        @foreach($productDetails['unit'] as $res)
                                                        <option value="{{$res['unit_id']}}">{{$res['Unit']}}{{$res['UnitType']}}</option>
                                                         @endforeach
                                                        
                                                    </select>
                                        </div>
                                          <div class="form-group col-sm-5">
										
                                            <input type="text" class="form-control" id="exampleEmail"  name="unitprice[]"  placeholder="price" required>
                                        </div>
                                              `);
    }
</script>