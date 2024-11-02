<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php'); 
  $randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;
 
  $res_qry = "select * from shipping WHERE randomId = '".$randomId."'";
  $res_data = $crud->getData($res_qry);

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
                <h4 class="mb-0 font-size-18">Edit Shipping</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Shipping</li>
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
                  <h4 class="card-title">Edit Shipping</h4>
                  <form name="editform" id="editform" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label>Shipping Type</label>
                          <input type="text" class="form-control" name="shipping_type" id="shipping_type" value="<?php echo $res_data[0]['shipping_type']; ?>">
                          <!-- <span class="font-13 text-muted">e.g "Beauty"</span> -->
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label>Shipping Type</label>
                          <input type="text" class="form-control" name="shipping_amount" id="shipping_amount" value="<?php echo $res_data[0]['shipping_amount']; ?>">
                          <!-- <span class="font-13 text-muted">e.g "Beauty"</span> -->
                        </div>
                      </div>
                      <div class="col-6">
                        <button type="button" class="btn btn-danger" onclick="location.href = 'manage_shipping'">Cancel</button>
                      </div>
                      <div class="col-6">
                        <input type="hidden" name="hdn_id" id="hdn_id" value="<?php echo $res_data[0]['randomId']; ?>">
                        <button type="submit" class="btn btn-success float-right">Update</button>
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
<script type="text/javascript">
 
$(function() {
  
  $("form[name='editform']").validate({
   
    rules: {         
      shipping_type    : "required",
      shipping_amount    : "required",
    },

    messages: {         
      shipping_type      : "Please Enter Shipping Name",
      shipping_amount    : "Please Enter Shipping Amount",
    },
    
    submitHandler: function(form) {
     // alert("hii");
      
        let formdata = new FormData();
        let x = $('#editform').serializeArray();
        $.each(x, function(i, field){
          formdata.append(field.name,field.value);
        });
        formdata.append('action' , 'update');

        $.ajax({
          type: "POST",
          url: "actions/saveShipping",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,
          success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('Updated Successfully...!');
              setTimeout(function (){
                location.href = "manage_shipping";
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