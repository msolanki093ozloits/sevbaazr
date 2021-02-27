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
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    <h4 class="card-title">Vendor List</h4>
                                    @if(Session::has('flash_message_success'))
                                        <div class="alert alert-success alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button> 

        <strong>{{ Session::get('flash_message_success') }}</strong>

</div>
                                       
@endif
                                </div>
                                <div class="card-body">
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No.</th>
                                                    <th>Vendor ID</th>
                                                   <th>Firm Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    
                                                    <th>Password</th>
                                                    <th>Status</th>
                                                    
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr.No.</th>
                                                     <th>Vendor ID</th>
                                                   <th>Firm Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    
                                                    <th>Password</th>
                                                    <th>Status</th>
                                                    
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @php ($count=1) @endphp
                                                 
                                                @foreach($product as $pr)
                                                <tr>
                                                    <td>{{ $count }}</td>
                                                    <td>{{ $pr->vender_id}}</td>
                                                    <td>{{ $pr->Firm_name}}</td>
                                                    <td>{{ $pr->Firm_email}}</td>
                                                    <td>{{ $pr->Firm_Mobile}}</td>
                                                    
                                                    <td>{{ $pr->Firm_password}}</td>
                                                    
                                                    
                                                    <td id="status_{{ $pr->vender_id}}">@if($pr->vendor_status==1)<a href="javascript:void(0);" onclick="changeBannerStatus(0,{{ $pr->vender_id}});"><img src="{{asset('images/bullet_green.png')}}" width="32" height="32" title="click to deactive seller." /></a>@endif 
                                                    @if($pr->vendor_status==0)<a href="javascript:void(0);" onclick="changeBannerStatus(1,{{ $pr->vender_id}});"><img src="{{asset('images/bullet_red.png')}}" width="32" height="32" title="click to Aactive Seller." /> </a>@endif</td>
                                                

                                                    
                                                    <td class="text-right">
                <a href="#" class="btn btn-link btn-info btn-just-icon visibility" data-toggle="modal" data-target="#noticeModal{{ $pr->vender_id}}" rel="tooltip" data-placement="bottom" title="View"><i class="material-icons">art_track</i></a>

                <a href="{{url('/EditProduct')}}/{{ $pr->vender_id}}" class="btn btn-link btn-warning btn-just-icon edit" rel="tooltip" data-placement="bottom" title="Edit"><i class="material-icons">dvr</i></a>

            <!-- <a href="javascript:void(0)" onclick="return delseller({{ $pr->vender_id}})" class="btn btn-link btn-danger btn-just-icon remove" rel="tooltip" data-placement="bottom" title="Remove"><i class="material-icons">close</i></a> -->
                                                    
                                                    
                                                      
                                                    </td>
                                                </tr>
                                                
                                                 
                                                <!-- notice modal -->
              <div class="modal fade" id="noticeModal{{ $pr->vender_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow-y: scroll;">
                <div class="modal-dialog modal-notice">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">Product Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">close</i>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="instruction">
                        <div class="row">
                          <div class="col-md-8">
							<div class="row">
							  <div class="col-md-6 p-1"><b>vender_id</b></div>
							  <div class="col-md-6 p-1">{{ $pr->vender_id}}</div>
							</div><!--/row-->
							<div class="row">
							  <div class="col-md-6 p-1"><b>Firm_name</b></div>
							  <div class="col-md-6 p-1">{{ $pr->Firm_name}}</div>
							</div><!--/row-->
							<div class="row">
							  <div class="col-md-6 p-1"><b>Firm_email</b></div>
							  <div class="col-md-6 p-1">{{ $pr->Firm_email}}</div>
							</div><!--/row-->
							<div class="row">
							  <div class="col-md-6 p-1"><b>Firm_phone</b></div>
							  <div class="col-md-6 p-1">{{ $pr->Firm_phone}}</div>
							</div><!--/row-->
							<div class="row">
							  <div class="col-md-6 p-1"><b>Firm_Mobile</b></div>
							  <div class="col-md-6 p-1">{{ $pr->Firm_Mobile}}</div>
							</div><!--/row-->
							<div class="row">
							  <div class="col-md-6 p-1"><b>Firm_address</b></div>
							  <div class="col-md-6 p-1">{{ $pr->Firm_address}}. </div>
							</div><!--/row-->
                          </div>
                          <div class="col-md-4">
                            <div class="picture">
                              @if(!empty($pr->FSSAImain_img))
                              FSSAI License<img style="height: 120px;" src="{{ $pr->FSSAImain_img}}" alt="No Data" class="rounded img-fluid">
                              @endif
                              Pancard<img style="height: 90px;" src="{{ $pr->Pancard_img}}" alt="No Data" class="rounded img-fluid mt-2">
							  
                            </div>
                          </div>
                        </div>
						
						<div class="row">
						   <div class="col-md-4 border-bottom p-3">
						      <b>Firm_pincode:</b> {{ $pr->Firm_pincode}}
						   </div>
						   <div class="col-md-4 border-bottom p-3">
						      <b>contactperson:</b> {{ $pr->contactperson }}
						   </div>
						   <div class="col-md-4 border-bottom p-3">
						      <b>Partnershipfirm:</b> {{ $pr->Partnershipfirm}}
						   </div>
						</div><!--//row-->
						<div class="row">
						   <div class="col-md-4 border-bottom p-3">
						      <b>Proprietary_Concern:</b> {{ $pr->Proprietary_Concern}}
						   </div>
						   <div class="col-md-4 border-bottom p-3">
						      <b>Vender_city:</b> {{ $pr->Vender_city}}
						   </div>
						   <div class="col-md-4 border-bottom p-3">
						      <b>Vendor_percent:</b> {{ $pr->Vendor_percent}}
						   </div>
						</div><!--//row-->
						<div class="row">
						   <div class="col-md-4 border-bottom p-3">
						      <b>Firm_type:</b> {{ $pr->Firm_type}}
						   </div>
						   <div class="col-md-4 border-bottom p-3">
						      <b>Firm_year:</b> {{ $pr->Firm_year}}
						   </div>
						   <div class="col-md-4 border-bottom p-3">
						      <b>Firm_Acc:</b> {{ $pr->Firm_Acc}}
						   </div>
						</div>
						<div class="row">
						   <div class="col-md-4 border-bottom p-3">
						      <b>Firm_bankName:</b> {{ $pr->Firm_bankName}}
						   </div>
						   <div class="col-md-4 border-bottom p-3">
						      <b>Bank_address:</b> {{ $pr->Bank_address}}
						   </div>
						   <div class="col-md-4 border-bottom p-3">
						      <b>Bank_code:</b> {{ $pr->Bank_code}}
						   </div>
						</div>
						<div class="row">
						   <div class="col-md-4 border-bottom p-3">
						      <b>Bank_ifsc:</b> {{ $pr->Bank_ifsc}}
						   </div>
						   <div class="col-md-4 border-bottom p-3">
						      <b>Adharcard:</b><img style="height: 90px;" src="{{ $pr->Adarmain_img}}" alt="No Data" class="rounded img-fluid mt-2">
						   </div>
						   <div class="col-md-4 border-bottom p-3">
						      <b>GST:</b> <img style="height: 90px;" src="{{ $pr->gstoptional_img}}" alt="No Data" class="rounded img-fluid mt-2">
						   </div>
						</div>
							<div class="row">
						   <div class="col-md-4 border-bottom p-3">
						      <b>Trademark :</b> <img style="height: 90px;" src="{{ $pr->trademain_img}}" alt="No Data" class="rounded img-fluid mt-2">
						   </div>
						   <div class="col-md-4 border-bottom p-3">
						      <b>FDA License:</b> <img style="height: 90px;" src="{{ $pr->Fdaoptional_img}}" alt="No Data" class="rounded img-fluid mt-2">
						   </div>
						   <div class="col-md-4 border-bottom p-3">
						      <b>Shop license:</b><img style="height: 90px;" src="{{ $pr->shopLicence_img}}" alt="No Data" class="rounded img-fluid mt-2">
						   </div>
						</div>
							<div class="row">
						   <div class="col-md-4 border-bottom p-3">
						      <b>ExciseReg.No:</b> <img style="height: 90px;" src="{{ $pr->ExciseRegoptional_img}}" alt="No Data" class="rounded img-fluid mt-2">
						   </div>
						   <div class="col-md-4 border-bottom p-3">
						      <b>Bank passbook:</b><img style="height: 90px;" src="{{ $pr->bankpass_img}}" alt="No Data" class="rounded img-fluid mt-2">
						   </div>
						   <div class="col-md-4 border-bottom p-3">
						      <b>vendor_date:</b> {{ $pr->vendor_date}}{{ $pr->vendor_month}}{{ $pr->vendor_year}}
						   </div>
						   
						</div>
						
						<div class="row">
						   
						   <div class="col-md-4 border-bottom p-3">
						      <b>vendor_status:</b> @if($pr->vendor_status==0) Deactive @endif
						      @if($pr->vendor_status==1) Active @endif
						   </div>
						</div><!--//row-->
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- end notice modal -->



                                                @php ($count++) @endphp
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                        <!-- end col-md-12 -->
                    </div>
                    <!-- end row -->
                </div>

            </div>
<div class="modal fade" id="noticeModaloffer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-notice">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">Offers Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">close</i>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form id="RegisterValidation1" action="{{url('UpdateProductOffer')}}" method="Post" enctype="multipart/form-data">
@csrf
                      <div class="instruction" >
                          <div id="apd">
                        
						     
					
						  
						
                          <!--//row-->
					<!--//row-->
					</div>
						<div class="row">
						   
						   <div class="col-md-12">
						       <div class="card-footer text-right">

                                        <button type="submit" class="btn btn-rose">Update</button>
                                    </div>
						   </div>
						</div><!--//row-->
						
						</form>
                      </div>
                      
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
          
		  function delseller(event_id){
//alert(status);
//alert(banner_id);
job=confirm("Are you sure to Delete Selleer?");
    if(job!=true)
    {
        return false;
    }


     var datastring= 'id='+event_id;

 //alert(datastring);
// alert(base_url);
 
 
 
    $.ajax({
      url: '/vendorstatusdel',
      method:'POST',
      data:datastring,
      success:function(data){
    location.reload();
        }
       });




    }
          
          function changeBannerStatus(status,event_id){
//alert(status);
//alert(banner_id);
job=confirm("Are you sure to Active?");
    if(job!=true)
    {
        return false;
    }


     var datastring= 'status='+status +'&id='+event_id;

 //alert(datastring);
// alert(base_url);
 
 
 
    $.ajax({
      url: '/vendorstatus',
      method:'POST',
      data:datastring,
      success:function(data){
     //alert(data);
      //console.log(data);
        if(data==1){
        $('#status_'+event_id).html('<a href="javascript:void(0);" onclick="changeBannerStatus(0,'+event_id+')"><img src="{{ asset('images/bullet_green.png') }}" width="32" height="32" title="click to deactive this brand." /></a>');
        //location.href = data;
            }
            else
            {
                $('#status_'+event_id).html('<a href="javascript:void(0);" onclick="changeBannerStatus(1,'+event_id+')"><img src="{{ asset('images/bullet_red.png') }}" width="32" height="32" title="click to Active this brand." /></a>');
        
            }
        }
       });




    }
            
        $(document).ready(function() {
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }
            });

            var table = $('#datatable').DataTable();

            // Edit record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function(e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function() {
                alert('You clicked on Like button');
            });
        });

function delprd(){
if(confirm("Are you sure want Delete This Product")){
    return true;
}
return false;


}



function viewDis(p_id){
    
   
    
    
    $.ajax({

           type:'POST',

           url:'/viewdis',

           data:{name:p_id},

           success:function(data){
//alert(data);
              $("#apd").html(data);

           }

        });

  


}

function discount(dis,pid){
    //alert(dis)
    //alert(pid)
    
    var rt=$('#Disp350'+pid).val();
     var rt1=$('#Disp400'+pid).val();
      var rt2=$('#Disp500'+pid).val();
      
      $('#Disp3501'+pid).val(rt-(rt*dis)/100);
      $('#Disp4002'+pid).val(rt1-(rt1*dis)/100);
      $('#Disp5003'+pid).val(rt2-(rt2*dis)/100);
    
}

    </script>
            @stop
