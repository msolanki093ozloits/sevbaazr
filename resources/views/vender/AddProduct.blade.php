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
                            <form id="RegisterValidation" action="{{url('VendorProduct')}}" method="Post" enctype="multipart/form-data">
@csrf
                                <div class="card ">
                                    <div class="card-header card-header-rose card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">mail_outline</i>
                                        </div>
                                        <h4 class="card-title">Product ADD</h4>
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
                                            <input type="text" class="form-control" id="exampleEmail"  name="product_title" required>
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating"> Product Ingredients *</label>
                                            <input type="text" class="form-control" id="exampleEmail"  name="product_ingredients" required>
                                        </div>

                                        <div class="form-group">
										
                                            <select class="selectpicker" name="product_catgory" data-style="select-with-transition" title="Product Category"  data-size="7" required>
                                                        <option value=""> Select Category</option>
                                                        
                                                        @php 
							
							$Vendors=\App\Vendors::where(['vender_id' => Session::get('venderid')])->first();
							$price=json_decode($Vendors->venCategory); @endphp
						
						 @if(in_array(0,$price))
						  @foreach($productDetails['category'] as $res)
                                                     
                                                        <option value="{{$res['category_id']}}">{{$res['caregory_name']}}</option>
                                                       
                                                        @endforeach
						@else
                                                    @foreach($productDetails['category'] as $res)
                                                     @if(in_array($res['category_id'],$price))
                                                        <option value="{{$res['category_id']}}">{{$res['caregory_name']}}</option>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                    </select>
                                        </div>
                                        
                                        <!--<div class="form-group">-->
										
                                        <!--    <select class="selectpicker" name="Brand_name" data-style="select-with-transition" title="Product Brand"  data-size="7" required>-->
                                        <!--                <option value=""> Select Brand</option>-->
                                                        
                                                        
                                        <!--            @foreach($productDetails['category'] as $res)-->
                                        <!--                <option value="{{$res['category_id']}}">{{$res['caregory_name']}}</option>-->
                                        <!--                @endforeach-->
                                                        
                                        <!--            </select>-->
                                        <!--</div>-->
                                        
											<!--<div class="form-group">-->
										
           <!--                                 <select class="selectpicker" name="product_weight" data-style="select-with-transition" title="Product Weight" data-size="7" required>-->
           <!--                                             <option value=""> Select Weight</option>-->
           <!--                                             <option value="500">350 g </option>-->
           <!--                                             <option value="500">400 g </option>-->
                                                       
           <!--                                             <option value="500">500 g </option>-->
                                                        
                                                        
           <!--                                         </select>-->
           <!--                             </div>-->
                                        <!--<div class="form-group">-->
                                        <!--    <label for="examplePassword" class="bmd-label-floating">(350g) Price(Rs.) *</label>-->
                                            <!--<input type="text" class="form-control" id="examplePassword2"  name="product_price350" required>-->
                                        <!--    @foreach($productDetails['unit'] as $res)-->
                                                        <!--<option value="{{$res['category_id']}}">{{$res['caregory_name']}}</option>-->
                                        <!--                <input class="form-check-input" type="radio" name="Shelf_Life" value="{{$res['unit_id']}}" required=""> {{$res['Unit']}}{{$res['UnitType']}}-->
                                        <!--                @endforeach-->
                                        <!--</div>-->
                                        
                                        <div class="col-md-12">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label text-left label-checkbox">Unit</label>
                                            
                                            
                                                  
                                                    <div class="form-group col-sm-4">
										
                                            <select  class="form-control" name="unit[]" data-style="select-with-transition" title="Unit"  data-size="7" required>
                                                         <option value="">Unit</option>
                                                        @foreach($productDetails['unit'] as $res)
                                                        <option value="{{$res['unit_id']}}">{{$res['Unit']}}{{$res['UnitType']}}</option>
                                                         @endforeach
                                                        
                                                    </select>
                                        </div>
                                          <div class="form-group col-sm-3">
										
                                            <input type="text" class="form-control" id="exampleEmail"  name="unitprice[]"  placeholder="price" required>
                                        </div>
                                             <div class="form-group col-sm-3">
										
                                            <span><a href="javascript:void(0)" onclick="addunit()">Add More</a></span>
                                        </div>   
                                           
                                        </div>
                                    </div>
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
                                            <input type="text" class="form-control" id="examplePassword2"  name="product_about" required>
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
										
                                            <select class="selectpicker" name="product_test" data-style="select-with-transition" title="Product Test"  data-size="7" required>
                                                        <option value=""> Select Test</option>
                                                        
                                                        
                                                    @foreach($productDetails['Tsttype'] as $res)
                                                        <option value="{{$res['name']}}">{{$res['name']}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                        </div>
                                       <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating"> Shelf Life(in Days) *</label>
                                            <input type="text" class="form-control" id="Shelf_Life"  name="Shelf_Life" required>
                                        </div>
                                       

                                       






                                       
                                        
                                       
                                    </div>
									<div class="col-md-6">
									    
                                         <div class="col-md-12">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label text-left label-checkbox">Type</label>
                                            <div class="col-sm-9 checkbox-radios">
                                                <div class="form-check text-left form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                       <input class="form-check-input" type="radio" name="product_type" value="Veg" required=""> Veg
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check  text-right form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                        <input class="form-check-input" type="radio" name="product_type" value="Nonveg" required=""> Nonveg
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
                                                       <input class="form-check-input" type="radio" name="Organic" value="Yes" required=""> Yes
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check  text-right form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                        <input class="form-check-input" type="radio" name="Organic" value="NO" required=""> NO
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
                                                       <input class="form-check-input" type="radio" name="Gluten" value="Yes" required=""> Yes
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check  text-right form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                        <input class="form-check-input" type="radio" name="Gluten" value="NO" required=""> NO
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
                                                       <input class="form-check-input" type="radio" name="Peanut" value="Yes" required=""> Yes
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check  text-right form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                        <input class="form-check-input" type="radio" name="Peanut" value="NO" required=""> NO
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
                                                       <input class="form-check-input" type="radio" name="Lactose" value="Yes" required=""> Yes
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check  text-right form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                        <input class="form-check-input" type="radio" name="Lactose" value="NO" required=""> NO
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
                                                       <input class="form-check-input" type="radio" name="Licence" value="Yes" required=""> Yes
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check  text-right form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                        <input class="form-check-input" type="radio" name="Licence" value="No" required=""> NO
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
                                                       <input class="form-check-input" type="radio" name="Temperature" value="Yes" required=""> Yes
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check  text-right form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                        <input class="form-check-input" type="radio" name="Temperature" value="No" required=""> NO
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
                                                       <input class="form-check-input" type="radio" name="Nutritional" value="Yes" required=""> Yes
                                                        <span class="form-check-sign">
                      <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check  text-right form-check-inline">
                                                    <label class="form-check-label text-dark">
                                                        <input class="form-check-input" type="radio" name="Nutritional" value="No" required=""> NO
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
                          <img src="{{asset('images/backend_img/image_placeholder.jpg')}}" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="hidden"><input type="file" id="main_img" name="main_img" required>
                          <div class="ripple-container"></div></span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                                 <div class="col-md-6 col-sm-6">
                      <h4 class="title">Optional Image</h4>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <img src="{{asset('images/backend_img/image_placeholder.jpg')}}" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="hidden"><input type="file" name="optional_img" id="optional_img">
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

                                        <button type="submit" class="btn btn-rose">ADD</button>
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