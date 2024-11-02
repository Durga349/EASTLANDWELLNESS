<!DOCTYPE html>
<html lang="en">
<?php 

include('includes/header.php');
$randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;
$sel_cat ="select * from customers where randomId = '".$randomId."'";
$res_cat =$crud->getData($sel_cat);

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
                <h4 class="mb-0 font-size-18">View Customer Details</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">View Customer Details</li>
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
                  <h4 class="card-title">View Customer Details</h4>
                  <form name="addformpage" id="addformpage" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label>First Name</label>
                          <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $res_cat[0]['first_name']; ?>">
                        </div>
                      </div>
                       <div class="col-6">
                        <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $res_cat[0]['last_name']; ?>">
                        </div>
                      </div>
                       <div class="col-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" id="email" value="<?php echo $res_cat[0]['email']; ?>">
                        </div>
                      </div>
                       <div class="col-6">
                        <div class="form-group">
                          <label>Phone</label>
                          <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $res_cat[0]['phone_number']; ?>">
                        </div>
                      </div>
                     
                      <div class="col-12 mt-3">
                        <button type="button" class="btn btn-danger" onclick="location.href = 'manageNmlCustomer'">Cancel</button>
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

<script type="text/javascript">


 
$(function() {
  
  $("form[name='addformpage']").validate({
   
    rules: {        
      catg_id          : "required",
      prod_name        : "required",
      prod_description : "required",
      product_image    : "required",
    },

    messages: {         
      catg_id          : "Please Enter Category ID",
      prod_name        : "Please Enter Product Name",
      prod_description : "Please Enter Product Description",
      product_image    : "Please Upload Product Image",
    },
    
    submitHandler: function(form) {
     // alert("hii");
      
        let formdata = new FormData();
        let x = $('#addformpage').serializeArray();
        $.each(x, function(i, field){

        if (field.name == "prod_description"){
          formdata.append(field.name, field.value);
        }
        
          
        });
        formdata.append('action' , 'save'); 

         let image = $('#product_image')[0].files;

        if (image.length > 0){
          formdata.append('image', image[0]);
        }   

        $.ajax({
          type: "POST",
          url: "actions/saveNmlCustomers",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,
          success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('saved successfully...!');
              setTimeout(function (){
                location.href = "manageNmlCustomer";
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