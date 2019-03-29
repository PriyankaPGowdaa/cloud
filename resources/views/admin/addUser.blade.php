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
                        <strong>Add User</strong> 
                      </div>
                      <div class="card-body card-block">
                        <form action="addUser" method="post" class="form-horizontal">
                          {{ csrf_field() }} 
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Business Name</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="hf-password" name="name" placeholder="Enter  Name..." class="form-control item" required>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Username</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="hf-password" name="userName" placeholder="Enter username..." class="form-control item" required></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Password</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="hf-password" name="password" placeholder="Enter Password..." class="form-control item" required></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Email</label></div>
                            <div class="col-12 col-md-9"><input type="Email" id="hf-password" name="email" placeholder="Enter Email..." class="form-control item" required></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Address</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="hf-password" name="address" placeholder="Enter Address..." class="form-control item" required></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Balance</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="hf-password" name="balance" placeholder="Enter Balance..." class="form-control item" required></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Phone No</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="hf-password" name="phoneNo" placeholder="Enter Phone NO..." class="form-control item" required></div>
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