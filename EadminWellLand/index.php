<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Eastland Wellness Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Eastland Wellness Admin & Dashboard" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="https://eastland-wellness.com/assets/img/favicon/favicon.ico">
    <link  rel="icon" href="https://eastland-wellness.com/assets/img/favicon.png">
    <link rel="apple-touch-icon" href="https://eastland-wellness.com/assets/img/favicon/apple-touch-icon.png">
    <link rel="image_src" href="https://eastland-wellness.com/assets/img/favicon/apple-touch-icon.png">


    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>
<body>
 
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-8">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block bg-white shadow-lg rounded my-5">
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block bg-login rounded-left"></div>
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center mb-5">
                                            <a href="#" class="text-dark font-size-22 font-family-secondary">
                                                <i class="mdi mdi-alpha-e-circle"></i> <b>Eastland Wellness</b>
                                            </a>
                                        </div>
                                        <h1 class="h5 mb-1 text-center">Welcome Back!</h1>
                                        <p class="text-muted mb-4 text-center">Enter your email address and password to access admin panel.</p>
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Email Address">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                            </div>
                                            <a href="#" class="btn btn-success btn-block waves-effect waves-light" onclick="loginval()"> Log In </a>

                                            <!-- <div class="text-center mt-4">
                                                <h5 class="text-muted font-size-16">Sign in using</h5>
                                            
                                                <ul class="list-inline mt-3 mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                                    </li>
                                                </ul>
                                            </div> -->
                                            

                                       <!--  <div class="row mt-4">
                                            <div class="col-12 text-center">
                                                <p class="text-muted mb-2"><a href="pages-recoverpw.html" class="text-muted font-weight-medium ml-1">Forgot your password?</a></p>
                                                <p class="text-muted mb-0">Don't have an account? <a href="pages-register.html" class="text-muted font-weight-medium ml-1"><b>Sign Up</b></a></p>
                                            </div> 
                                        </div> -->
                                        <!-- end row -->
                                    </div> <!-- end .padding-5 -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                    <div class="col-md-2"></div>
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/simplebar.min.js"></script>

    <!-- App js -->
    <script src="assets/js/theme.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>
<script type="text/javascript">
  
  function validation() {
    let email = $('#email').val();
    let password = $('#password').val();

    if(email == ''){
      toastr.error("Enter Email...");
      $('#email').focus();
      return false;
    }else if(password == ''){
      toastr.error("Enter PassWord...");
      $('#password').focus();
      return false;
    }else{
      return true;
    }
  }
  
  function loginval(){
    if(validation()){
      let email = $('#email').val();
      let password = $('#password').val();
    
    $.ajax({
        url : 'actions/savelogins',
        type : 'POST',
        data : {'action' : 'login','email' : email, 'password' : password},
        success : function(data){
          console.log(data);         
            if (data == "true"){
              
              toastr.success("Login successfully...!");
              window.location.href = "home";
               
            }
            else{
              toastr.error('invalid logins');
            }
        }
    });
    }
  }
</script>
</html>