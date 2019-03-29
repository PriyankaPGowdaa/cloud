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
                            <strong class="card-title">All User</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Business Name</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>PhoneNo</th>
                        <th>Address</th>
                        <th>Balance</th>
                        <th>Email</th>
                        <th>Delete User</th>
                        <th>Update User</th>
                        
                      </tr>
                    </thead>
                     @foreach ($objects as $obj)
                     <?php
                          $id=$obj->id;
                         $name=$obj->name;
                          $userName=$obj->userName;
                          $password=$obj->password;
                          $password=$obj->password;
                          $phoneNo=$obj->phoneNo;
                          $address=$obj->address;
                          $balance=$obj->balance;
                          $email=$obj->email;
                      ?>
                      <tr>

                        <td>{{$name}}</td>
                        <td>{{$userName}}</td>
                        <td>{{$password}}</td>
                        <td>{{$phoneNo}}</td>
                        <td>{{$address}}</td>
                        <td>{{$balance}}</td>
                        <td>{{$email}}</td>
                        <td><form action="deleteUser" method="post" >
                                {{ csrf_field() }}
                                <input name="id" type="hidden"  value="{{$id}}">
                                <button type="submit" class="btn btn-w-m btn-primary" >
                                Delete</button>
                            </form>

                        </td>
                        <td><button type="button" onclick="return update('{{$id}}','{{$name}}','{{$userName}}','{{$password}}','{{$phoneNo}}','{{$address}}','{{$balance}}','{{$email}}');" class="btn btn-w-m btn-primary" data-toggle="modal" data-target="#myModal">Update Data</button></td>
                        
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
           <form method="post" action="updateUser" id="updateItemSubmitForm">
            {{ csrf_field() }}
         <div class="container">
              <div class="row">
                <input type="hidden" id="id" name="id" value="">
              </div>
              <div class="row">
                <div class="col-sm-2">
                    <label class="form-control-label">Update Business Name</label>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" class="form-control item"  id="name"  name="name" value="" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                    <label class="form-control-label">Update Username</label>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" class="form-control item"  id="userName"  name="userName" value="" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                    <label class="form-control-label">Update Password</label>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" class="form-control item"  id="password"  name="password" value="" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                    <label class="form-control-label">Update Email</label>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" class="form-control item"  id="email"  name="email" value="" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                    <label class="form-control-label">Update address</label>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" class="form-control item"  id="address"  name="address" value="" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                    <label class="form-control-label">Update Balance</label>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" class="form-control item"  id="balance"  name="balance" value="" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                    <label class="form-control-label">Update PhoneNo</label>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" class="form-control item"  id="phoneNo"  name="phoneNo" value="" required>
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
        function update(id,name,userName,password,phoneNo,address,balance,email)
        {
            document.getElementById('id').value = id;
            document.getElementById('name').value = name;
            document.getElementById('userName').value = userName;
            document.getElementById('password').value = password;
            document.getElementById('balance').value = balance;
            document.getElementById('email').value = email;
            document.getElementById('address').value = address;
            document.getElementById('phoneNo').value = phoneNo;
             
        }
    </script>
    @endsection 