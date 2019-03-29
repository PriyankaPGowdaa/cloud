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
                            <strong class="card-title">All Promotions</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Product NAme</th>
                        <th>Discounted Price</th>
                        <th>Date Time</th>
                        <th>Delete </th>
                        <th>Update </th>
                      </tr>
                    </thead>
                     @foreach ($objects as $obj)
                      <tr>
                        <td>{{$obj->productName}}</td>
                        <td>{{$obj->discounted_price}}</td>
                        <td>{{$obj->created_at}}</td>
                        <td><form action="deletePromotion" method="post" >
                                {{ csrf_field() }}
                                <input name="id" type="hidden"  value="{{$obj->id}}">
                                <button type="submit" class="btn btn-w-m btn-primary" >
                                Delete</button>
                            </form>

                        </td>
                        <td><button type="button" onclick="return updateData({{$obj}});" class="btn btn-w-m btn-primary" data-toggle="modal" data-target="#myModal">Update Data</button></td>
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
           <form method="post" action="updatePromotion" id="updateItemSubmitForm">
            {{ csrf_field() }}
         <div class="container">
              <div class="row">
                <input type="hidden" id="id" name="id" value="">
              </div>
              <div class="row">
                <div class="col-sm-2">
                    <label class="form-control-label">Update Name</label>
                </div>
                <div class="col-12 col-md-9"> <select name="productName" id="select" class="form-control item" required>
                              @foreach ($products as $obj)
                                <option>{{ $obj->name }}</option>
                              @endforeach
                              </select>
                            </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                    <label class="form-control-label">Update Discounted Price</label>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" class="form-control item"  id="discountedPrice"  name="discountedPrice" value="" required>
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
        function updateData(data)
        {
            //alert(data);
            console.log(data);
           
            document.getElementById('id').value = data.id;
            document.getElementById('discountedPrice').value = data.discounted_price;
             
        }
    </script>
    @endsection 