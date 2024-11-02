<!DOCTYPE html>
<html lang="en">

<?php 

include('includes/header.php');
$randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;
$sel_cat ="select * from customers where randomId = '".$randomId."'";
$res_cat =$crud->getData($sel_cat);

?>
<script src="ckeditor/ckeditor.js"></script>


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
                <h4 class="mb-0 font-size-18">
                  <?php if($_GET['type']=='edit'){?>
                    Edit Customers
                  <?php } ?>
                  <?php if($_GET['type']=='view'){?>
                    View Customers
                  <?php } ?>
                </h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="home">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                      <?php if($_GET['type']=='edit'){?>
                        Edit Customers
                      <?php } ?>
                      <?php if($_GET['type']=='view'){?>
                        View Customers
                      <?php } ?></li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- end breadcrumb -->


          <!-- Page Content -->
          <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        <form name="addformpage" id="addformpage"  autocomplete="off">
          <div class="card card-primary">
           
            
            <div class="card-body">

<?php if($_GET['type']=='edit'){?>

                <div class="row mb-3">
               <div class="col-12">
                        <div class="form-group">
                          <label>First Name</label>
                          <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $res_cat[0]['first_name']; ?>">
                          
                        </div>
                      </div>
                       <div class="col-12">
                        <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $res_cat[0]['last_name']; ?>">
                          
                        </div>
                      </div>
                       <div class="col-12">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" id="email" value="<?php echo $res_cat[0]['email']; ?>">
                          
                        </div>
                      </div>
                       <div class="col-12">
                        <div class="form-group">
                          <label>Phone Number</label>
                          <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo $res_cat[0]['phone_number']; ?>" >
                          
                        </div>
                      </div>
                       <div class="col-12">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="text" class="form-control" name="password" id="password" value="<?php echo $res_cat[0]['password']; ?>">
                          
                        </div>
                      </div>
                     
          

            <div class="col-md-12 text-center">
               <input type="button" name="Back" value="Cancel" class="btn btn-danger float-left" onclick="location.href = 'manageCtdCustomer'">

              <input type="hidden" name="hdn_id" id="hdn_id" value="<?php echo $randomId;?>">
              <input type="submit" name="submit" value="Update" class="btn btn-primary float-right">
              </div>
            </div>
<?php } ?>


<?php if($_GET['type']=='view'){?>

             <div class="row mb-3">
                <div class="col-12">
                        <div class="form-group">
                          <label>First Name</label>
                          <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $res_cat[0]['first_name']; ?>" readonly>
                          
                        </div>
                      </div>
                       <div class="col-12">
                        <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $res_cat[0]['last_name']; ?>" readonly>
                          
                        </div>
                      </div>
                       <div class="col-12">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" id="email" value="<?php echo $res_cat[0]['email']; ?>" readonly>
                          
                        </div>
                      </div>
                       <div class="col-12">
                        <div class="form-group">
                          <label>Phone Number</label>
                          <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo $res_cat[0]['phone_number']; ?>" readonly>
                          
                        </div>
                      </div>
                       <div class="col-12">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="text" class="form-control" name="password" id="password" value="<?php echo $res_cat[0]['password']; ?>" readonly>
                          
                        </div>
                      </div>
                    
            <div class="col-md-12 text-center">
                <input type="button" name="Back" value="Cancel" class="btn btn-danger float-left" onclick="location.href = 'manageCtdCustomer'">
              </div>
            </div>
 <?php } ?>
 
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
     </form>
        </div>
          <div class="col-md-1"></div>
          </div>
          <!-- End Page Content -->

        </div>
      </div>
    </div>
  </div>

<?php include('includes/footer.php'); ?>

  
  <script type="text/javascript">
   $(function() {
  
  $("form[name='addformpage']").validate({
   rules: {         
       first_name     : "required",
       last_name      : "required",
       email          : "required",
       phone_number   : "required",
       password       : "required",
    },
    // Specify validation error messages
     messages: {         
       first_name     : "Please Enter First Name",
       last_name      : "Please Enter Last Name",
       email          : "Please Enter your Email",
       phone_number   : "Please Enter Phone Number",
       password       : "Please Enter your Password",
    },
    submitHandler: function(form) {
      
      let formdata = new FormData();
      let x = $('#addformpage').serializeArray();
        $.each(x, function(i, field){
        formdata.append(field.name, field.value);
        });
        formdata.append('action' , 'update');
     
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
              toastr.success('Updated Successfully...!');
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
</body>
</html>