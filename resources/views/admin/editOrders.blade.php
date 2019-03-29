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
                            <strong class="card-title">Edit Order</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Quantity</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Total Paid Amount</th>
                        <th>Total Amount of All Orders</th>
                        <th>Update User</th>
                        
                      </tr>
                    </thead>
                     @foreach ($objects as $obj)
                     <?php
                          $id=$obj->id;
                         $quantity=$obj->quantity;
                          $productName=$obj->product_name;
                          $productPrice=$obj->product_price;
                          $totalPaidAmount=$obj->total_paid_amount;
                          $totalOfAllOrders=$obj->total_of_all_orders;
                      ?>
                      <tr>

                        <td>{{$quantity}}</td>
                        <td>{{$productName}}</td>
                        <td>{{$productPrice}}</td>
                        <td>{{$totalPaidAmount}}</td>
                        <td>{{$totalOfAllOrders}}</td>
                        <td><button type="button" onclick="return update('{{$id}}','{{$quantity}}','{{$productName}}','{{$productPrice}}','{{$totalPaidAmount}}','{{$totalOfAllOrders}}');" class="btn btn-w-m btn-primary" data-toggle="modal" data-target="#myModal">Update Data</button></td>
                        
                      </tr>
                    @endforeach
                  </table>
                         </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
<div id="myModal" class="modal fade" role="dialog" aria-labelledby="largeModalLabel">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
           <form method="post" action="updateOrder" id="updateItemSubmitForm">
            {{ csrf_field() }}
         <div class="container">
              <div class="row">
                <input type="hidden" id="id" name="id" value="">
              </div>
              <div class="row">
                <div class="col-sm-2">
                    <label class="form-control-label">Quantity</label>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" class="form-control item"  id="quantity"  name="quantity" value="" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                    <label class="form-control-label">Product Name</label>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" class="form-control item"  id="productName"  name="productName" value="" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                    <label class="form-control-label">Product Price</label>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" class="form-control item"  id="productPrice"  name="productPrice" value="" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                    <label class="form-control-label">Total Paid Amount</label>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" class="form-control item"  id="totalPaidAmount"  name="totalPaidAmount" value="" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                    <label class="form-control-label">Total of All Orders</label>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" class="form-control item"  id="totalOfAllOrders"  name="totalOfAllOrders" value="" required>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-2">
                    
                </div>
                <div class="col-md-3">
                  <h2>
                    <button type="submit" id="updateProvinceData" class="btn btn-w-m btn-primary">Update Data</button>
                  </h2>
                </div>
              </div>
              
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
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
        function update(id,quantity,productName,productPrice,totalPaidAmount,totalOfAllOrders)
        {
            document.getElementById('id').value = id;
            document.getElementById('quantity').value = quantity;
            document.getElementById('productName').value = productName;
            document.getElementById('productPrice').value = productPrice;
            document.getElementById('totalPaidAmount').value = totalPaidAmount;
            document.getElementById('totalOfAllOrders').value = totalOfAllOrders;
             
        }
    </script>
    @endsection 