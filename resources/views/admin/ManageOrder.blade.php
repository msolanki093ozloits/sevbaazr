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
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">



                            @switch($product1)
                            @case(1)
                            <span>Book</span>
                            @break

                            @case(2)
                            <span>Complete</span>
                            @break
                            @case(3)
                            <span>Cancel</span>
                            @break
                            @case(4)
                            <span>Ongoing</span>
                            @break
                            @case(5)
                            <span>Return</span>
                            @break

                            @default
                            <span>Book</span>
                            @endswitch

                        Order Details</h4>
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
                                        <th>OrderNo</th>
                                        <th>User Name</th>
                                        <th>Vendor</th>
                                        <th>Amout</th>
                                        <th>OrderDate</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>OrderNo</th>
                                        <th>User Name</th>
                                        <th>Vendor</th>
                                        <th>Amout</th>
                                        <th>OrderDate</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php ($count=1) @endphp

                                    @foreach($product as $pr)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $pr->order_id}}</td>
                                        <td> <?php $data= \App\User::where(['id' => $pr->user_id])->first(); ?>
                                        {{$data['name']}}
                                    </td>
                                    <td><?php $datac= \App\Carts::where(['order_id' => $pr->order_id])->first(); 
                                    $venc= \App\Vendors::where(['vender_id' => $datac['vender_id']])->first(); 
                                    ?>
                                {{$venc['Firm_name']}} </td>


                                <td>{{ $pr->grandttl}}</td><td>{{ $pr->created_at}}</td>
                                <!--<td>@if($pr->product_Offer_status==1){{ 'offer' }} @else {{ 'fresh' }} @endif </td>-->
                                <td class="text-right">
                                    <a href="#" class="btn btn-link btn-info btn-just-icon visibility" data-toggle="modal" data-target="#noticeModal{{ $pr->ord_id}}" rel="tooltip" data-placement="bottom" title="View"><i class="material-icons">art_track</i></a>

                                    <!--    <a href="{{url('/EditProduct')}}/{{ $pr->ord_id}}" class="btn btn-link btn-warning btn-just-icon edit" rel="tooltip" data-placement="bottom" title="Edit"><i class="material-icons">dvr</i></a>-->

                                    <!--<a href="{{url('/DeleteProduct')}}/{{ $pr->ord_id}}" onclick="return confirm('Are you sure want Delete This Product')" class="btn btn-link btn-danger btn-just-icon remove" rel="tooltip" data-placement="bottom" title="Remove"><i class="material-icons">close</i></a>-->
                                @if($pr['order_status'] == 1)
                                    <a href="javascript:void(0);" class="btn btn-link btn-info btn-just-icon yes" title="Shiprocket" onclick="shipRocket({{ $pr->order_id}});"><i class="material-icons">comment</i></a>
                                @endif



                                </td>
                            </tr>


                            <!-- notice modal -->
                            <div class="modal fade" id="noticeModal{{ $pr->ord_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-notice">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="myModalLabel">Order Details</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        <i class="material-icons">close</i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                  <div class="instruction m-0">
                                    <div class="row">
                                      <div class="col-md-9">
                                         <div class="row">
                                           <div class="col-md-12"><b>Order ID:</b> {{ $pr->order_id}}</div>
                                       </div><!--/row-->
                                       <div class="row">
                                           <div class="col-md-6"><b>Delivery Address:</b></div>
                                           <div class="col-md-6">{{ $pr->address_id}}</div>
                                       </div><!--/row-->
                                   </div>
                                   <div class="col-md-3">
                                    <div class="picture">
                                      @if(!empty($pr->optional_img))
                                      <img style="height: 90px;" src="{{ $pr->optional_img}}" alt="Thumbnail Image" class="rounded img-fluid">
                                      @endif
                                      <img style="height: 90px;" src="{{ $pr->main_img}}" alt="Thumbnail Image" class="rounded img-fluid">

                                  </div>
                              </div>
                          </div>

                          <div class="row">
                           <div class="col-md-4 border-bottom p-3">
                            <b>weight:</b> {{ $pr->weight}}
                        </div>
                        <div class="col-md-4 border-bottom p-3">
                            <b>trans_id:</b> {{ $pr->trans_id }}
                        </div>
                        <div class="col-md-4 border-bottom p-3">
                            <b>trans_status:</b> {{ $pr->trans_status}}
                        </div>
                    </div><!--//row-->

                    <div class="row mt-2">
                       <div class="col-md-6"><b>Product Price:</b></div>
                       <div class="col-md-6 text-right font-weight-bold" style="color:#000">₹ {{ $pr->totalamount}}</div>
                   </div><!--/row-->
                   <div class="row">
                       <div class="col-md-6"><b>Delivery Charge:</b></div>
                       <div class="col-md-6 text-right font-weight-bold" style="color:#000">₹ {{ $pr->delivery_charge}}</div>
                   </div><!--/row-->
                   <div class="row">
                       <div class="col-md-6"><b>GST:</b></div>
                       <div class="col-md-6 text-right font-weight-bold" style="color:#000">₹ {{ $pr->gst_charge}}</div>
                   </div><!--/row-->
                   <div class="row border-top mt-2 py-2">
                       <div class="col-md-6"><b style="color:#000">Grand Total:</b></div>
                       <div class="col-md-6 text-right font-weight-bold" style="color:#000;font-size:17px;">₹ {{ $pr->grandttl}} </div>
                   </div><!--/row-->
                   <div class="row">
                       <div class="col-md-4 border-bottom p-3">
                        <b>Transaction Date:</b> {{ $pr->trans_date}}
                    </div>
                    <div class="col-md-4 border-bottom p-3">
                        <b>Order Status:</b> {{ $pr->order_status}}
                    </div>
                    <div class="col-md-4 border-bottom p-3">
                        <b>User ID:</b> {{ $pr->user_id}}
                    </div>
                </div><!--//row-->
                <div class="row" style="background: #f7f7f7;">
                   <div class="col-md-3 border-bottom p-3">
                    <b>Product ID:</b> {{ $pr->product_id}}
                </div>
                <div class="col-md-3 border-bottom p-3">
                    <b>Weight:</b> {{ $pr->product_weight}}
                </div>
                <div class="col-md-3 border-bottom p-3">
                    <b>Price:</b> {{ $pr->price}}
                </div>
                <div class="col-md-3 border-bottom p-3">
                    <b>Qty:</b> {{ $pr->qty}}
                </div>
            </div>

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

        function shipRocket(id)
        {

          swal({
              title: "Shiprocket",
              text: "Send request to delivery partner",
              icon: 'warning',
              buttons: [
                "No, cancel it!",
                "Yes, I am sure!"
              ],
              dangerMode: true,
            }).then(function(isConfirm) {
              if (isConfirm) {
                $.ajax({
                  url: "/api/v1/send-request-ship-rocket",
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
              
              } else {
                swal({
                  title: "Cancelled",
                  text: "Your imaginary file is safe :)",
                  icon: 'error',
                  button: "Ok"
                });
                // swal({
                //   lang.canceled, lang.your_imaginary_file_is_safe, "error");
                location.reload();
              }
            });
        }
    </script>
    @stop
