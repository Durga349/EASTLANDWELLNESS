<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php'); ?>

<body>
  <div id="layout-wrapper">

<?php include('includes/navbar.php'); ?>

<?php include('includes/sidebar.php'); ?>

    <div class="main-content">
      <div class="page-content">
        <div class="container-fluid">

          <!-- breadcrumb -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Add Customer</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="home">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Add Customer</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- end breadcrumb -->

          <!-- Page Content -->
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  <!-- <h4 class="card-title">Add Customer</h4> -->
                  <form name="addformpage" id="addformpage" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label>First Name</label>
                          <input type="text" class="form-control" name="first_name" id="first_name">
                          
                        </div>
                      </div>
                       <div class="col-12">
                        <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" class="form-control" name="last_name" id="last_name">
                          
                        </div>
                      </div>
                       <div class="col-12">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" id="email">
                          
                        </div>
                      </div>
                       <div class="col-12">
                        <div class="form-group">
                          <label>Phone Number</label>
                          <input type="text" class="form-control" name="phone_number" id="phone_number">
                          
                        </div>
                      </div>
                       <div class="col-12">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" class="form-control" name="password" id="password">
                          
                        </div>
                      </div>
                      <div class="col-6">
                        <button type="button" class="btn btn-danger" onclick="location.href = 'manageCtdCustomer'">Cancel</button>
                      </div>
                      <div class="col-6">
                        <button type="submit" class="btn btn-success float-right">Submit</button>
                      </div>
                    </div>

                </form>
              </div>
            </div>
            </div> <!-- end col -->
        </div>
          <!-- End Page Content -->

        </div>
      </div>
    </div>
  </div>

<?php include('includes/footer.php'); ?>

</body>
<script src="assets/pages/validation-demo.js"></script>
<script type="text/javascript">
 
$(function() {
  
  $("form[name='addformpage']").validate({
   
    rules: {         
      first_name    : "required",
      last_name     : "required",
      email         : "required",
      phone_number  : "required",
      password      : "required",
    },

    messages: {         
      first_name    : "Please Enter First Name",
      last_name     : "Please Enter Last Name",
      email         : "Please Enter Email Name",
      phone_number  : "Please Enter Phone Number",
      password      : "Please Enter Password",
    },
    
    submitHandler: function(form) {
     // alert("hii");
      
        let formdata = new FormData();
        let x = $('#addformpage').serializeArray();
        $.each(x, function(i, field){
          formdata.append(field.name,field.value);
        });
        formdata.append('action' , 'save'); 

        $.ajax({
          type: "POST",
          url: "actions/saveCredCustomers",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,
          success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('saved successfully...!');
              setTimeout(function (){
                location.href = "manageCtdCustomer";
              },1000);
            }
            else{
              toastr.error(data);
            }
          }
        });
      }
  });
});

</script>
</html>