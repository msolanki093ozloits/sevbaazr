@extends('admin.master') 
@section('submenu')

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('Region')}}">Add Region</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('ManageRegion')}}">Manage Regions</a>
                            </li>
                            
                            
                    @stop                  
@section('maincontent')

<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="RegisterValidation" action="{{url('Unit')}}" method="Post" enctype="multipart/form-data">
@csrf
                                <div class="card ">
                                    <div class="card-header card-header-rose card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">mail_outline</i>
                                        </div>
                                        <h4 class="card-title">Unit ADD</h4>
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
                                            <label for="exampleEmail" class="bmd-label-floating"> Unit *</label>
                                            <input type="number" class="form-control" id="Unit"  name="Unit" required>
                                        </div>

                                    </div>
                                   
                                        
                                        

                                   <div class="col-md-6">
                                
                                        <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating"> Unit Type *</label>
                                            
                                            
                                            <select class="selectpicker" name="UnitType" data-style="select-with-transition" title="Unit Type"  data-size="7" required>
                                                        <option value=""> Select Type</option>
                                                        
                                                        
                                                  
                                                        <option value="gm">gm</option>
                                                        <option value="kg">kg</option>
                                                        
                                                        
                                                    </select>
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