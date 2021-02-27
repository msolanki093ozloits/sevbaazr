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
                            <form id="RegisterValidation" action="{{url('CreateNotification')}}" method="Post" enctype="multipart/form-data">
@csrf
                                <div class="card ">
                                    <div class="card-header card-header-rose card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">mail_outline</i>
                                        </div>
                                        <h4 class="card-title">Notification</h4>
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
                                            <label for="exampleEmail" class="bmd-label-floating">Title *</label>
                                            <input type="text" class="form-control" id="exampleEmail"  name="Title" required>
                                        </div>

                                  <div class="form-group">
                                            <label for="examplePassword" class="bmd-label-floating"> Description *</label>
                                            <input type="text" class="form-control" id="examplePassword2"  name="NotiDesc" required>
                                        </div>
                                      
                                        <div class="form-group">
										
                                            <select class="form-control" name="noti_city" data-style="select-with-transition" title="City"  data-size="7" required>
                                                        <option value="0"> All City</option>
                                                        
                                                        
                                                    @foreach($product as $res)
                                                        <option value="{{$res['region_id']}}">{{$res['region_name']}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6">
								
                                      
                                       
                                        
                                      
                                       

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
                            <input type="hidden"><input type="file" id="main_img" name="main_img" required>
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