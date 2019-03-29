
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ecommerce Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="" width=200>
                    </a>
                </div>
                <div class="login-form">
                <h3 class="text-center">REQUIRED INFORMATION</h3>
                <br/>
                @include('partials.message')
                @include('partials.error')
                <form method="post" action="registerStaff">
                    {{ csrf_field() }} 
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" name = "" id = "name" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control"  placeholder="Username" name = "username" id = "email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" id = "password" name = "password" required>
                        </div>
                        <div class="form-group">
                            <label>Phone NO</label>
                            <input type="text" class="form-control"  placeholder="phoneNo" id = "password" name = "phoneNo" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control"  placeholder="Password" id = "password" name = "address" required>
                        </div>
                        
                        <!-- <div class="form-group">
                            <label>Company's Address</label>
                            <input type="text" class="form-control" placeholder="Address"  id = "address"  name = "" required>
                        </div> -->
                        
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Agree the terms and policy
                            </label>
                        </div>
                        <button type="submit" id ="signup" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                        
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="{{ url('getAdminLogin') }}" id = "signin"> Sign in </a></p>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/jquery-3.2.1.min.js"></script>
    <!-- <script>
        // redirect to register page when click sign up
            $(document).ready(function(){
                $("#signup").click(function(){
                    
                    if ($("#name").val().trim() == "" || $("#email").val().trim() == "" || $("#password").val().trim() == "" || $("#address").val().trim() == ""){
                        alert("Please fill all the fields");
                        return;
                    }
                    var  name= $("#name").val();
                    var email = $("#email").val();
                    var password = $("#password").val();
                    var address = $("#address").val();
                    
                    var data = {"name":name , "email":email , "password": password , "address":address};
                    var setting = {
                        type: "POST",
                        datatype: "json",
                        url: "api/insertcompany.php",
                        data: data,
                        success: function(response){
                            if (response == 1){
                                window.location.replace('emailvarification');
                            }else{
                                alert("cannot register");
                            }
                        },
                        error: function(err , type , httpStatus){
                            alert("Something went wrong try again ");
                        }
                    };
                    $.ajax(setting);
                });
            });
    </script> -->
    </body>
</html>