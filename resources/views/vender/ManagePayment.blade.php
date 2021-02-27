@extends('vender.master')                  
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
                                    <h4 class="card-title">Payment details</h4>
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
                                                    <th>Date</th>
                                                    <th>Total payment</th>
                                                    <th>Sevbazaar</th>
                                                    <th>Own</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr.No.</th>
                                                    <th>Date</th>
                                                    <th>Total payment</th>
                                                    <th>Sevbazaar</th>
                                                    <th>Own</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                
                                                <tr>
                                                    <td>1</td>
                                                    <td><a href="#"  data-toggle="modal" data-target="#noticeModaloffer" onclick="viewDis()" rel="tooltip" data-placement="bottom" title="View Details">2011/07/25</a></td>
                                                    <td>100</td>
                                                    <td>40</td>
                                                    <td>60</td>
                                                    <td>Paid</td>
                                                </tr></a>
                                                
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
                <div class="modal-dialog modal-notice modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">Payment Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">close</i>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form id="RegisterValidation1" action="{{url('sellerUpdateProductOffer')}}" method="Post" enctype="multipart/form-data">
@csrf
                      <div class="instruction" >
                          <div id="apd">
                        
						     <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No.</th>
                                                    <th>Date</th>
                                                    <th>Total payment</th>
                                                    <th>Sevbazaar</th>
                                                    <th>Own</th>
                                                    <th>Order id</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr.No.</th>
                                                    <th>Date</th>
                                                    <th>Total payment</th>
                                                    <th>Sevbazaar</th>
                                                    <th>Own</th>
                                                    <th>Order id</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                
                                                <tr>
                                                    <td>1</td>
                                                    <td>2011/07/25</td>
                                                    <td>100</td>
                                                    <td>40</td>
                                                    <td>60</td>
                                                    <td><a href="#"  data-toggle="modal" data-target="#noticeModaloffer1" onclick="viewDis()" rel="tooltip" data-placement="bottom" title="View Details">123</a></td>
                                                </tr></a>
                                                
                                            </tbody>
                                        </table>
					
						  
						
                          <!--//row-->
					<!--//row-->
					</div>
					
						
						</form>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="modal fade" id="noticeModaloffer1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-notice modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">Product Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">close</i>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form id="RegisterValidation1" action="{{url('sellerUpdateProductOffer')}}" method="Post" enctype="multipart/form-data">
@csrf
                      <div class="instruction" >
                          <div id="apd">
                        
						     <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No.</th>
                                                    <th>Date</th>
                                                    <th>Total payment</th>
                                                    <th>Sevbazaar</th>
                                                    <th>Own</th>
                                                    <th>Product</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr.No.</th>
                                                    <th>Date</th>
                                                    <th>Total payment</th>
                                                    <th>Sevbazaar</th>
                                                    <th>Own</th>
                                                    <th>Product</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                
                                                <tr>
                                                    <td>1</td>
                                                    <td>2011/07/25</td>
                                                    <td>100</td>
                                                    <td>40</td>
                                                    <td>60</td>
                                                    <td><a href="#"  data-toggle="modal" data-target="#noticeModaloffer1" onclick="viewDis()" rel="tooltip" data-placement="bottom" title="View Details">123</a></td>
                                                </tr></a>
                                                
                                            </tbody>
                                        </table>
					
						  
						
                          <!--//row-->
					<!--//row-->
					</div>
					
						
						</form>
                      </div>
                      
                    </div>
                  </div>
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
    </script>
            @stop
