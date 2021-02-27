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
                                    <h4 class="card-title">Coupon List</h4>
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
                                                    <th>coupon_id</th>
                                                  
                                                    <th>start_date</th>
                                                    <th>end_date</th>
                                                    <th>vendor_id</th>
                                                    
                                                    <th>min_amount</th>
                                                    <th>dis_percent</th>
                                                    <th>coupon_code</th>
                                                    
                                                    <th>Img</th>
                                                    
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr.No.</th>
                                                    <th>coupon_id</th>
                                                  
                                                    <th>start_date</th>
                                                    <th>end_date</th>
                                                    <th>vendor_id</th>
                                                    
                                                    <th>min_amount</th>
                                                    <th>dis_percent</th>
                                                    <th>coupon_code</th>
                                                     <th>Img</th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @php ($count=1) @endphp
                                                 
                                                @foreach($product as $pr)
                                                <tr>
                                                    <td>{{ $count }}</td>
                                                    <td>{{ $pr->coupon_id}}</td>
                                                    <td>{{ $pr->start_date}}</td>
                                                    <td>{{ $pr->end_date}}</td>
                                                    <td>{{ $pr->vendor_id}}</td>
                                                    
                                                    <td>{{ $pr->min_amount}}</td>
                                                    <td>{{ $pr->dis_percent}}</td>
                                                     <td>{{ $pr->coupon_code}}</td>
                                                    <td><img style="width: 70px;" src="{{ $pr->main_img}}" /></td>
                                                   
                                                    <td class="text-right">
                 <a href="{{url('/EditCoupon')}}/{{ $pr->coupon_id}}" class="btn btn-link btn-warning btn-just-icon edit" rel="tooltip" data-placement="bottom" title="Edit"><i class="material-icons">dvr</i></a>
            <a href="{{url('/DeleteCoupon')}}/{{ $pr->coupon_id}}" onclick="return confirm('Are you sure want Delete This Product')" class="btn btn-link btn-danger btn-just-icon remove" rel="tooltip" data-placement="bottom" title="Remove"><i class="material-icons">close</i></a>
                                                    
                                                    
                                                      
                                                    </td>
                                                </tr>
                                                
                                                 
                                                <!-- notice modal -->
              
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
