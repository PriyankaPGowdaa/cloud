@extends('admin.master')
@section('content')
<div class="breadcrumbs">
    @include('partials.message')
    @include('partials.error')
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">All Orders</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Business UserName</th>
                        <th>DateTime</th>
                        <th>Total Amount of All Orders</th>
                        <th>Download Order</th>
                        <th>view Order Detail</th>
                        <th>Delete Order</th>
                      </tr>
                    </thead>
                     @foreach ($objects as $obj)
                      <tr>
                        <td>{{$obj->userName}}</td>
                        
                        <td>{{$obj->created_at}}</td>
                        <td>{{$obj->total_of_all_orders}}</td>
                        <td>
                             <a href="downloadOrderDetail?dateTime={!! $obj->created_at !!}" target="_blank"><button type="submit" class="btn btn-w-m btn-primary">Download Order Details</button></a>
                        </td>
                        <td>
                             <a href="getCompleteOrderDetail?dateTime={!! $obj->created_at !!}" target="_blank"><button type="submit" class="btn btn-w-m btn-primary">view Order Detail</button></a>
                        </td>
                        <td><form action="deleteOrder" method="post" >
                                {{ csrf_field() }}
                                <input name="dateTime" type="hidden"  value="{{$obj->created_at}}">
                                <button type="submit" class="btn btn-w-m btn-primary" >
                                Delete</button>
                            </form>
                        </td>
                      </tr>
                    @endforeach
                  </table>
                         </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
            <!-- <form method="post" action="loadOrderData" style="display: none;" id="loadForm">
                                    {{ csrf_field() }}
                                    <button type="submit" id="loadId"></button>
                                </form> -->
        </div><!-- .content -->
        
         
        <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
  <!--   <script>
        function loadData(){
            var form=document.getElementById('loadForm');
            // form.setAttribute('action', 'deleteCity');
            // console.log(data);
             
            form.submit();
        }
        setInterval(loadData,30000);
    </script> -->
    @endsection 