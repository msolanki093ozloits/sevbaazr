@extends('admin.master')   
@section('submenu')

                           <!--<li class="nav-item">-->
                           <!--     <a class="nav-link" href="{{url('Product')}}">Add Product</a>-->
                           <!-- </li>-->
                           <!-- <li class="nav-item">-->
                           <!--     <a class="nav-link" href="{{url('ManageProduct')}}">Manage Products</a>-->
                           <!-- </li>-->
                            
                            
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
                                    <h4 class="card-title">User List</h4>
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
                                                    <th>name</th>
                                                    <th>email</th>
                                                    <th>Phone</th>
                                                    <th>created_at</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr.No.</th>
                                                    <th>name</th>
                                                    <th>email</th>
                                                    <th>Phone</th>
                                                    <th>created_at</th>
                                                   
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @php ($count=1) @endphp
                                                 
                                                @foreach($product as $pr)
                                                <tr>
                                                    <td>{{ $count }}</td>
                                                    <td>{{ $pr->name}}</td>
                                                    <td>{{ $pr->email}}</td>
                                                    <td>{{ $pr->Phone}}</td>
                                                    
                                                    <td>{{ $pr->created_at}}</td>
                                                    
                                                </tr>
                                               
              



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

function delprd(){
if(confirm("Are you sure want Delete This Product")){
    return true;
}
return false;


}


    </script>
            @stop
