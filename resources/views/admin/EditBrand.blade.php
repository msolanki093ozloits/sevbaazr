@extends('admin.master') 
@section('submenu')

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('Brand')}}">Add Brand</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('ManageBrand')}}">Manage Brands</a>
                            </li>
                            
                            
                    @stop                  
@section('maincontent')

<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="RegisterValidation" action="{{url('UpdateBrand')}}" method="Post" enctype="multipart/form-data">
@csrf
                                <div class="card ">
                                    <div class="card-header card-header-rose card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">mail_outline</i>
                                        </div>
                                        <h4 class="card-title">Brands Update</h4>
                                        @if(Session::has('flash_message_success'))
                                        <div class="alert alert-success alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button> 

        <strong>{{ Session::get('flash_message_success') }}</strong>

</div>
                                       
@endif


                                    </div>
                                    <div class="card-body">
                                    <div class="row col-md-12">
                                    <div class="col-md-6">
                                
                                        <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating"> Brand Name *</label>
                                            <input type="text" class="form-control" id="exampleEmail"  name="Brand_name" value="{{$productDetails->Brand_name}}" required>
                                            <input type="hidden" class="form-control" id="Brand_id"  name="Brand_id"  value="{{$productDetails->Brand_id}}"required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating"> Brand Description *</label>
                                            <input type="text" class="form-control" id="exampleEmail"  name="Brand_desc" value="{{$productDetails->Brand_desc}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating"> Brand Label *</label>
                                            <input type="text" class="form-control" id="exampleEmail"  name="Brand_lavel" value="{{$productDetails->Brand_lavel}}" required>
                                            
                                        </div>
                                        
                                        <div class="form-group">
										
                                            <select class="selectpicker" name="Brand_city" data-style="select-with-transition" title="Brand City"  data-size="7" required>
                                                        <option value=""> Select City</option>
                                                        
                                                        
                                                    @foreach($productDetails['city'] as $res)
                                                   
                                                        <option value="{{$res['region_id']}}" @if($res['region_id']==$productDetails->Brand_city) {{'selected'}} @endif>{{$res['region_name']}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                        </div>

                                    </div>
                                   
                                        
                                        

                                       <div class="col-md-6 col-sm-6">
                      <h4 class="title">Brand Image</h4>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <img src="{{$productDetails->main_img}}" alt="..." style="height: 160px;">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="hidden"><input type="file" id="main_img" name="main_img" >
                          <div class="ripple-container"></div></span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
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