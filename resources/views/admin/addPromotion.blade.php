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
                        <strong>Add Promotion</strong> 
                      </div>
                      <div class="card-body card-block">
                        <form action="addPromotion" method="post" class="form-horizontal" enctype="multipart/form-data">
                          {{ csrf_field() }} 
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Select Products</label></div>
                            <div class="col-12 col-md-9"> <select name="productName" id="select" class="form-control item" required>
                              @foreach ($products as $obj)
                                <option>{{ $obj->name }}</option>
                              @endforeach
                              </select>
                            </div>
                          </div>
                           <div class="row form-group">
                            <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Discounted Price</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="hf-password" name="discountedPrice"  placeholder="Enter  Price..." class="form-control item" required>
                            </div>
                          </div>
                          <div class="col-md-4"></div>
                          <div class="col-md-4"> <button type="submit" class="btn btn-primary ">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button></div>

                         
                        </form>
                      </div>
                      <div class="card-footer">
                        
                      </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
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
@endsection 