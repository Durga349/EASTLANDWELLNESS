<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php'); 

$sel_data = "SELECT * FROM logins";
$res_data = $crud->getData($sel_data);

?>

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
                <h4 class="mb-0 font-size-18">Profile</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="home.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Profile</li>
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
                  <!-- <h4 class="card-title">Add VAT Rate</h4> -->
                  <form name="addformpage" id="addformpage" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-3 mt-3">
                          <label>Username</label>
                      </div>
                      <div class="col-9 mt-3">
                          <input type="text" class="form-control" name="username" id="username" value="<?php echo $res_data[0]['username']; ?>">
                          <!-- <span class="font-13 text-muted">e.g "Beauty"</span> -->
                      </div>
                      <div class="col-3 mt-3">
                          <label>Email</label>
                      </div>
                      <div class="col-9 mt-3">
                          <input type="email" class="form-control" name="email" id="email" value="<?php echo $res_data[0]['email']; ?>">
                          <!-- <span class="font-13 text-muted">e.g "Beauty"</span> -->
                      </div>
                      <div class="col-3 mt-3">
                          <label>Password</label>
                      </div>
                      <div class="col-9 mt-3">
                          <input type="password" class="form-control" name="password" id="password" value="<?php echo $res_data[0]['password']; ?>">
                          <!-- <span class="font-13 text-muted">e.g "Beauty"</span> -->
                      </div>
                      <div class="col-3 mt-3">
                          <label>Profile Image</label>
                      </div>
                      <div class="col-9 mt-3">
                          <input type="file" class="form-control" name="image" id="image">
                          <br>
                          <img src="<?php echo str_replace('../', '', $res_data[0]['image']); ?>" width="150">
                          <input type="hidden" name="old_image" id="old_image" value="<?php echo $res_data[0]['image']; ?>">
                          <!-- <span class="font-13 text-muted">e.g "Beauty"</span> -->
                      </div>
                      <div class="col-6 mt-4">
                        <button type="button" class="btn btn-danger" onclick="location.href = 'home'">Cancel</button>
                      </div>
                      <div class="col-6 mt-4">
                        <button type="submit" class="btn btn-success float-right">Update</button>
                        <input type="hidden" name="hdn_id" id="hdn_id" value="<?php echo $res_data[0]['randomId']; ?>">
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
      username    : "required",
      email       : "required",
      password    : "required",
    },

    messages: {         
      username    : "Please Enter Username",
      email       : "Please Enter Email",
      password    : "Please Enter Password",
    },
    
    submitHandler: function(form) {
     // alert("hii");
      
        let formdata = new FormData();
        let x = $('#addformpage').serializeArray();
        $.each(x, function(i, field){
          formdata.append(field.name,field.value);
        });
        formdata.append('action' , 'save'); 

        let image = $('#image')[0].files;

        if(image.length > 0){
          formdata.append('image', image[0]);
        }

        $.ajax({
          type: "POST",
          url: "actions/saveProfile",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,
          success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('Updated Successfully...!');
              setTimeout(function (){
                location.href = "profile";
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