@extends('admin.master') 
@section('submenu')

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('CreateVendor')}}">Add Vendor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('ManageVendor')}}">Manage Vendor</a>
                            </li>
                            
                            
                    @stop                  
@section('maincontent')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="RegisterValidation" action="{{url('AddVendor')}}" method="Post" enctype="multipart/form-data">
@csrf
                                <div class="card ">
                                    <div class="card-header card-header-rose card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">mail_outline</i>
                                        </div>
                                        <h4 class="card-title">Vendor ADD</h4>
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
                                            <label for="exampleEmail" class="bmd-label-floating"> Name of Firm *</label>
                                            <input type="text" class="form-control" id="exampleEmail"  name="Firm_name" >
                                        </div>
<div class="form-group">
										
                                            <select class="selectpicker" name="Brand_id" data-style="select-with-transition" title="Product Category"  data-size="7" required>
                                                        <option value=""> Select Brand</option>
                                                        
                                                        
                                                    @foreach($productDetails['Brands'] as $res)
                                                        <option value="{{$res['Brand_id']}}">{{$res['Brand_name']}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                        </div>
                                        
                                        <div class="col-md-12">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label text-left label-checkbox">Category</label>
                                            
                                            
                                                  
                                                    <div class="form-group col-sm-7">
										
                                            <select  class="form-control" name="venCategory[]" data-style="select-with-transition" title="Category"  data-size="7" required>
                                                         <option value="">Select Category</option>
                                                         <option value="0">All Category</option>
                                                        @foreach($productDetails['category'] as $res)
                                                        <option value="{{$res['category_id']}}">{{$res['caregory_name']}}</option>
                                                         @endforeach
                                                        
                                                    </select>
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

                                        <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating"> Email *</label>
                                            <input type="email" class="form-control" id="exampleEmail"  name="Firm_email" required>
                                        </div>
                                        
                                      
                                        <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating"> Phone *</label>
                                            <input type="text" class="form-control" id="exampleEmail"  name="Firm_phone" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating"> Mobile No *</label>
                                            <input type="text" class="form-control" id="exampleEmail"  name="Firm_Mobile" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating"> Address *</label>
                                            <input type="text" class="form-control" id="exampleEmail"  name="Firm_address" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating"> Pincode *</label>
                                            <input type="text" class="form-control" id="Firm_pincode"  name="Firm_pincode" maxlength="6" onkeyup="checkAvailaibility();">
                                        </div>

                                        
											
                                        <div class="form-group">
                                            <label for="examplePassword" class="bmd-label-floating"> Name of Contact Person *</label>
                                            <input type="text" class="form-control" id="examplePassword2"  name="contactperson" >
                                        </div>

                                        <div class="form-group">
                                            <label for="examplePassword" class="bmd-label-floating"> Partnershipfirm *</label>
                                            <input type="text" class="form-control" id="examplePassword2"  name="Partnershipfirm" >
                                        </div>
                                        <div class="form-group">
                                            <label for="examplePassword" class="bmd-label-floating"> Proprietary Concern *</label>
                                            <input type="text" class="form-control" id="examplePassword2"  name="Proprietary_Concern" >
                                        </div>
                                        
                                         <div class="form-group">
										
                                            <select class="selectpicker" name="Vender_city" data-style="select-with-transition" title="Vendor City"  data-size="7" required>
                                                        <option value=""> Select City</option>
                                                        
                                                        
                                                    @foreach($productDetails['Regions'] as $res)
                                                        <option value="{{$res['region_id']}}">{{$res['region_name']}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                        </div>
                                        
                                        <div class="form-group">
										
                                            <select class="selectpicker" name="Firm_type" data-style="select-with-transition" title="Firm type"  data-size="7" required>
                                                        <option value=""> Select Firm type</option>
                                                        
                                                        
                                                    <option value=""> Select Type</option>
                                                        <option value="Proprietorship">Proprietorship </option>
                                                         <option value="Partnership">Partnership </option>
                                                         <option value="Pvt Ltd">PVT Ltd./Co. </option>
                                                          <option value="Limited">Limited. </option>
                                                        
                                                    </select>
                                        </div>
                                       
                        <div class="form-group">
										
                                            <select class="selectpicker" name="percent_type" data-style="select-with-transition" title="Percentage" onchange="Percentagetype(this.value)" data-size="7" required>
                                                        <option value=""> Percentage type</option>
                                                        
                                                        
                                                   
                                                        <option value="1">Category</option>
                                                        <option value="2">Vendor</option>
                                                       
                                                        
                                                        
                                                    </select>
                                        </div>
                                        <div id="apd">
                                        
</div>





                                       
                                        
                                        
                                                                                <div class="form-group">
                                            <label for="examplePassword" class="bmd-label-floating"> Year of Establishmentofthe firm *</label>
                                            <input type="Number" class="form-control" id="Firm_year"  name="Firm_year" >
                                        </div>

                                       

                                        <div class="form-group">
                                            <label for="examplePassword" class="bmd-label-floating"> Account No  *</label>
                                            <input type="text" class="form-control" id="examplePassword2"  name="Firm_Acc" >
                                        </div>

                                        <div class="form-group">
                                            <label for="examplePassword" class="bmd-label-floating"> Bank Name  *</label>
                                            <input type="text" class="form-control" id="examplePassword2"  name="Firm_bankName" >
                                        </div>
                                        <div class="form-group">
                                            <label for="examplePassword" class="bmd-label-floating"> Bank Address  *</label>
                                            <input type="text" class="form-control" id="examplePassword2"  name="Bank_address" >
                                        </div>
                                        <div class="form-group">
                                            <label for="examplePassword" class="bmd-label-floating"> Branch Code  *</label>
                                            <input type="text" class="form-control" id="examplePassword2"  name="Bank_code" >
                                        </div>
                                        <div class="form-group">
                                            <label for="examplePassword" class="bmd-label-floating"> IFSC No  *</label>
                                            <input type="text" class="form-control" id="examplePassword2"  name="Bank_ifsc" >
                                        </div>
                                       
                                    </div>
									<div class="col-md-6">
                                        
                                        

                                        
                                        
                                        
                                        
                                       
                                        
                                        
                                    
                                 <div class="row">
                                       <div class="col-md-6 col-sm-6">
                      <h4 class="title">FSSAI License</h4>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <img src="{{asset('images/backend_img/image_placeholder.jpg')}}" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="hidden"><input type="file" id="FSSAImain_img" name="FSSAImain_img" >
                          <div class="ripple-container"></div></span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                                 <div class="col-md-6 col-sm-6">
                      <h4 class="title">Pancard</h4>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <img src="{{asset('images/backend_img/image_placeholder.jpg')}}" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="hidden"><input type="file" name="Pancard_img" id="Pancard_img">
                          <div class="ripple-container"></div></span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                    </div>

                    <div class="row">
                                       <div class="col-md-6 col-sm-6">
                      <h4 class="title">Adharcard</h4>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <img src="{{asset('images/backend_img/image_placeholder.jpg')}}" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="hidden"><input type="file" id="Adarmain_img" name="Adarmain_img" >
                          <div class="ripple-container"></div></span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                                 <div class="col-md-6 col-sm-6">
                      <h4 class="title">GST (Good & Service Tax) Registration</h4>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <img src="{{asset('images/backend_img/image_placeholder.jpg')}}" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="hidden"><input type="file" name="gstoptional_img" id="gstoptional_img">
                          <div class="ripple-container"></div></span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                                       <div class="col-md-6 col-sm-6">
                      <h4 class="title">Trademark Registration</h4>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <img src="{{asset('images/backend_img/image_placeholder.jpg')}}" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="hidden"><input type="file" id="trademain_img" name="trademain_img" >
                          <div class="ripple-container"></div></span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                                 <div class="col-md-6 col-sm-6">
                      <h4 class="title">FDA License</h4>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <img src="{{asset('images/backend_img/image_placeholder.jpg')}}" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="hidden"><input type="file" name="Fdaoptional_img" id="Fdaoptional_img">
                          <div class="ripple-container"></div></span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                    </div>
                    


                    <div class="row">
                                       <div class="col-md-6 col-sm-6">
                      <h4 class="title">Shop license</h4>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <img src="{{asset('images/backend_img/image_placeholder.jpg')}}" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="hidden"><input type="file" id="shopLicence_img" name="shopLicence_img" >
                          <div class="ripple-container"></div></span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                                 <div class="col-md-6 col-sm-6">
                      <h4 class="title">ExciseReg.No</h4>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <img src="{{asset('images/backend_img/image_placeholder.jpg')}}" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="hidden"><input type="file" name="ExciseRegoptional_img" id="ExciseRegoptional_img">
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
 @section('pagespecjs')
<script>
  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    function Percentagetype(id){
    
  
   if(id==1){
     //alert(id)
    
    $.ajax({

           type:'POST',

           url:'/viewcategory',

           data:{name:id},

           success:function(data){
//alert(data);
 $("#apd").show();
              $("#apd").html(data);

           }

        });

   }
   else if(id==2)
   {
       $("#apd").show(); 
       $("#apd").html('<div class="form-group"><label for="examplePassword" class="bmd-label-floating"> Vendor Percentage *</label><input type="Number" class="form-control" id="Vendor_percent"  name="Vendor_percent"></div>');
   }
   else
   {
      $("#apd").hide(); 
   }


}
</script>
<script>
    function addunit(){
        //alert();
        $("#unitapd").append(`<label class="col-sm-2 col-form-label text-left label-checkbox">Category</label>
                                            
                                            
                                                  
                                                    <div class="form-group col-sm-10">
										
                                            <select  class="form-control" name="venCategory[]" data-style="select-with-transition" title="Category"  data-size="7" required>
                                                         <option value="">Select Category</option>
                                                        @foreach($productDetails['category'] as $res)
                                                        <option value="{{$res['category_id']}}">{{$res['caregory_name']}}</option>
                                                         @endforeach
                                                        
                                                    </select>
                                        </div>
                                          
                                              `);
    }

    function checkAvailaibility()
    {
        console.log("123");
        var count = $('#Firm_pincode').val();
        if(count.length == 6) {
            console.log("Ajax Called");
            $.ajax({
                url: "/api/v1/check-service-ability",
                data:{order_id:id,_token: $('meta[name="csrf-token"]').attr('content') },
                method:'post',
                datatype: 'json',             
                success:function(res){
                    if(res.success == 1){
                        swal({
                            title: "Success!",
                            text: "request send successfully.",
                            icon: "success",
                            button: "Ok"
                        });
                        location.reload();
                    }
                }
            });
        }
    }
</script>
@stop