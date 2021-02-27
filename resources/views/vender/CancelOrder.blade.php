@extends('vender.master')   
  
<!--@section('submenu')-->

<!--                           <li class="nav-item">-->
<!--                                <a class="nav-link" href="{{url('Product')}}">Add Product</a>-->
<!--                            </li>-->
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link" href="{{url('ManageProduct')}}">Manage Products</a>-->
<!--                            </li>-->
                            
                            
<!--                    @stop                -->
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
                                    <h4 class="card-title">Pending order's  List</h4>
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
                                                    <th>Order id</th>
                                                    <th>Name</th>
                                                    <th>Amount</th>
                                                    <th>Phone</th>
                                                    <th>Order date</th>
                                                    <!--<th>Status</th>-->
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr.No.</th>
                                                    <th>Order id</th>
                                                    <th>Name</th>
                                                    <th>Amount</th>
                                                    <th>Phone</th>
                                                    <th>Order date</th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @php ($count=1) @endphp
                                                 
                                                @foreach($productDetails['orderid'] as $pr)
                                                @if($pr->order_id !=0)
                                                @php 
                                                
                                                $adresid=\App\Order::where(['order_id' => $pr->order_id])->first();
                                                
                                                $userde=\App\Useraddress::where(['address_id' => $adresid['address_id']])->first();
                                                
                                                @endphp
                                                @if($adresid['order_status']==3)
                                                <tr>
                                                    <td>{{ $count }}</td>
                                                    <td>{{ $pr->order_id}}</td>
                                                    <td>{{ $userde['first_name']}} {{ $userde['last_name']}}</td>
                                                    <td>{{ $adresid['grandttl']}}</td>
                                                    <td>{{ $userde['phone']}}</td>
                                                    
                                                    <!--<td>{{ $pr->product_price350}}</td>-->
                                                    <!--<td>{{ $pr->product_price400}}</td>-->
                                                    <!--<td>{{ $pr->product_price500}}</td>-->
                                                    
                                                    <td>{{ $userde['created_at']}}</td>
                                                  
                              <!--                      <td id="status_{{ $pr->order_id}}"> @if($pr->product_status==1)-->
                             
                              <!--<a href="javascript:void(0);" ><img src="{{ asset('images/bullet_green.png') }}" width="32" height="32" title="Deactive" /></a>@endif @if($pr->product_status==0)<a href="javascript:void(0);" ><img src="{{ asset('images/bullet_red.png') }}" width="32" height="32" title="Active" /> </a>@endif</td>-->
                                          
                                                    
                                                    <td class="text-right">
                <a href="#" class="btn btn-link btn-info btn-just-icon visibility" data-toggle="modal" data-target="#noticeModalcomment" rel="tooltip" data-placement="bottom" title="View" onclick="viewDis({{ $pr->order_id}})"><i class="material-icons">art_track</i></a>

                
            <!--<a href="{{url('/VendorDeleteProduct')}}/{{ $pr->order_id}}" onclick="return confirm('Are you sure want Delete This Product')" class="btn btn-link btn-danger btn-just-icon remove" rel="tooltip" data-placement="bottom" title="Remove"><i class="material-icons">close</i></a>-->
                                                    
                                                    
                                                      
                                                    </td>
                                                </tr>
                                                
                                                  @endif
                                                <!-- notice modal -->
                                                
                                                
                                              
                                                
                                                
              <div class="modal fade" id="noticeModal{{ $pr->order_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">Order Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">close</i>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="instruction">
                        <div class="row">
                          <div class="col-md-8">
							<div class="row">
							  <div class="col-md-6 p-1"><b>Product Title</b></div>
							  <div class="col-md-6 p-1">Product Title</div>
							</div><!--/row-->
							<!--/row-->
                          </div>
                          <div class="col-md-4">
                            
                          </div>
                        </div>
						
						
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- end notice modal -->



                                                @php ($count++) @endphp
                                                @endif
                                               
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
              <div class="modal fade" id="noticeModalcomment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-notice modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">Order Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">close</i>
                      </button>
                    </div>
                    <div class="modal-body">
                        
@csrf
                     <div class="instruction" id="apd">
                        <!--//row-->
						
					<!--//row-->
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
<div class="modal fade" id="noticeModaloffer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-notice modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">Offers Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">close</i>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form id="RegisterValidation1" action="{{url('sellerUpdateProductOffer')}}" method="Post" enctype="multipart/form-data">
@csrf
                      <div class="instruction" >
                          <div id="apd1">
                        
						     
					
						  
						
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
      url: '/productstatus',
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


function viewcomment(p_id){
    
   
    
    
    $.ajax({

           type:'POST',

           url:'/sellerviewcomment',

           data:{name:p_id},

           success:function(data){
//alert(data);
              $("#apd1").html(data);

           }

        });

  


}

function viewDis(p_id){
    
   
    
    
    $.ajax({

           type:'POST',

           url:'/orderviewdis',

           data:{name:p_id},

           success:function(data){
 //alert(data);
              $("#apd").html(data);

           }

        });

  


}
function addiscount(){
    //alert()
    $('#disapd').append(`<div class="col-md-3 p-1"><b>Discount (%):</b></div>
							  <div class="col-md-4 p-1">
                                           <select  class="form-control" name="offerunit[]">
                                           <option value="">Unit</option>';
                                           @foreach($productDetails['unit'] as $res)
                                                        <option value="{{$res['unit_id']}}">{{$res['Unit']}}{{$res['UnitType']}}</option>
                                                         @endforeach
                                          </select>
                                           
                                        </div>
							  <div class="col-md-3 p-1">
                                           
                                            <input type="text" class="form-control" id="product_offerpercent"  name="product_offerpercent[]"  value=""  required>
                                        </div>`);
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
