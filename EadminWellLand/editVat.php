<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php'); 
  $randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;
 
  $res_qry = "select * from vat_rates WHERE randomId = '".$randomId."'";
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
                <h4 class="mb-0 font-size-18">Edit VAT Rate</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="home">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Edit VAT Rate</li>
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
                  <!-- <h4 class="card-title">Edit VAT Rate</h4> -->
                  <form name="editform" id="editform" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label>VAT Rate Title</label>
                          <input type="text" class="form-control" name="vat_title" id="vat_title" value="<?php echo $res_data[0]['vat_title']; ?>">
                          <!-- <span class="font-13 text-muted">e.g "Beauty"</span> -->
                        </div>
                        <div class="form-group">
                          <label>VAT Rate (%)</label>
                          <input type="number" class="form-control" name="vat_rate" id="vat_rate" value="<?php echo $res_data[0]['vat_rate']; ?>">
                          <!-- <span class="font-13 text-muted">e.g "Beauty"</span> -->
                        </div>
                      </div>
                      <div class="col-6">
                        <button type="button" class="btn btn-danger" onclick="location.href = 'manageVat'">Cancel</button>
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
      vat_title    : "required",
      vat_rate     : "required",
    },

    messages: {         
      vat_title    : "Please Enter VAT Title",
      vat_rate     : "Please Enter VAT Rate",
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
          url: "actions/saveVat",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,
          success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('Updated Successfully...!');
              setTimeout(function (){
                location.href = "manageVat";
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