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
                                    <h4 class="card-title">Top Seller List</h4>
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
                                                    <th>Brand_name</th>
                                                    <th>main_img</th>
                                                    <th>City</th>
                                                  
                                                  
                                                    
                                                    <!--<th class="disabled-sorting text-right">Actions</th>-->
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr.No.</th>
                                                    <th>Brand_name</th>
                                                    <th>main_img</th>
                                                    <th>City</th>
                                                  
                                                  
                                                    
                                                    <!--<th class="text-right">Actions</th>-->
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @php ($count=1) @endphp
                                                 
                                                @foreach($product as $pr)
                                                <tr>
                                                    <td>{{ $count }}</td>
                                                    <td>{{ $pr->Brand_name}}</td>
                                                    <td><img src="{{ $pr->main_img}}" style="width:80px"></td>
                                                    <td>
                                                        
                                                       <?php  $venc= \App\Regions::where(['region_id' => $pr->Brand_city])->first(); ?>
                                                        {{ $venc['region_name']}}</td>
                                                    
                                                   
                <!--                                  <td class="text-right">-->
                <!--<a href="#" class="btn btn-link btn-info btn-just-icon visibility" data-toggle="modal" data-target="#noticeModal{{ $pr->gstrate_id}}" rel="tooltip" data-placement="bottom" title="View"><i class="material-icons">art_track</i></a>-->

                <!--</td>-->
                                                </tr>
                                                
                                                 
                                                <!-- notice modal -->
              <div class="modal fade" id="noticeModal{{ $pr->gstrate_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-notice">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">Update Gst</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">close</i>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="instruction">
                        <div class="row">
                          <div class="col-md-12">
							 <form id="RegisterValidation" action="{{url('Addgst')}}" method="Post" enctype="multipart/form-data">
@csrf
                                <div class="card ">
                                    <div class="card-header card-header-rose card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">mail_outline</i>
                                        </div>
                                        <h4 class="card-title">Gst Update</h4>
                                       


                                    </div>
                                    <div class="card-body">
                                    <div class="row col-md-12">
                                    <div class="col-md-6">
                                
                                        <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating">Gst rate *</label>
                                            <input type="text" class="form-control" id="exampleEmail"  name="gstrate"  value="{{ $pr->gstrate}}" required>
                                            <input type="hidden" class="form-control" id="exampleEmail"  name="gstrate_id"  value="{{ $pr->gstrate_id}}" required>
                                        </div>

                                    </div>
                                   
                                        
                                        

                                        
                                        
                               
                                    </div>
                                    </div>
                                    <div class="card-footer text-right">

                                        <button type="submit" class="btn btn-rose">Update</button>
                                    </div>
                                </div>
                                </form><!--/row-->
                          </div>
                         
                        </div>
						
						<!--//row-->
					<!--//row-->
						<!--//row-->
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

            
            @stop

            @section('pagespecjs')
            <script>
            
            $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
            
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
