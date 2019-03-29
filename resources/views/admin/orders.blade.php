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
                        <th>Order ID</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Quantity</th>
                        <th>Food Item</th>
                        <th>Price</th>
                        <th>Completed</th>
                        <th>Cancel</th>
                      </tr>
                    </thead>
                    
                      <tr>
                        <td>{{$obj->id}}</td>
                        <td>{{$obj->username}}</td>
                        <td>{{$obj->status}}</td>
                        <td>{{$obj->quantity}}</td>
                        <td>{{$obj->categoryName}}</td>
                        <td>{{$obj->price}}</td>
                        <td><form action="updateOrderStatus" method="post" id="deleteSubmitForm">
                                {{ csrf_field() }}
                                <input name="id" type="hidden"  value="{{$obj->id}}">
                                <input name="fid" type="hidden"  value="{{$obj->fid}}">
                                <input name="status" type="hidden"  value="Completed">
                                <button type="submit" class="btn btn-w-m btn-primary" >
                                Completed</button>
                            </form></td>
                        <td><form action="updateOrderStatus" method="post" id="deleteSubmitForm">
                                {{ csrf_field() }}
                                <input name="quantity" type="hidden"  value="{{$obj->quantity}}">
                                <input name="fid" type="hidden"  value="{{$obj->fid}}">
                                <input name="id" type="hidden"  value="{{$obj->id}}">
                                <input name="status" type="hidden"  value="Cancel">
                                <button type="submit" class="btn btn-w-m btn-primary" >
                                Cancel</button>
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
            <form method="post" action="loadOrderData" style="display: none;" id="loadForm">
                                    {{ csrf_field() }}
                                    <button type="submit" id="loadId"></button>
                                </form>
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
    <script>
        function loadData(){
            var form=document.getElementById('loadForm');
            // form.setAttribute('action', 'deleteCity');
            // console.log(data);
             
            form.submit();
        }
        setInterval(loadData,30000);
    </script>
    @endsection 