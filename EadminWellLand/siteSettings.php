<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php'); 
// $sel_Qry = "SELECT MAX(CASE WHEN meta_key = 'free_shipping_charges' THEN meta_value END) AS FSC, MAX(CASE WHEN meta_key = 'sales_order_email' THEN meta_value END) AS SOE FROM shop_settings";
$sel_Qry = "SELECT * FROM shop_settings";
$res_data = $crud->getData($sel_Qry);

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
                <h4 class="mb-0 font-size-18">Shipping charges</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="home.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Shipping charges</li>
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
                <!-- <div class="card-header">
                  <div class="card-title">
                    Site Settings
                  </div>
                </div> -->
                <form method="post" name="addformpage" id="addformpage" autocomplete="off" enctype="multipart/form-data">
                  <div class="card-body">
                    <?php if ($_REQUEST['key'] == 'FSC'){ ?>
                      <div class="form-group">
                        <label>Free Shipping Charges</label>
                        <input type="hidden" name="meta_key" value="<?php echo $res_data[0]['meta_key'] ?>">
                        <input type="text" name="meta_value" class="form-control" value="<?php echo $res_data[0]['meta_value']; ?>">
                        <span class="font-13 text-muted">Cart Amount Greater than ($)</span>
                      </div>
                    <?php } ?>
                    <?php if ($_REQUEST['key'] == 'SOE'){ ?>
                      <div class="form-group">
                        <label>Sales Order Email</label>
                        <input type="hidden" name="meta_key" value="<?php echo $res_data[1]['meta_key'] ?>">
                        <input type="text" name="meta_value" class="form-control" value="<?php echo $res_data[1]['meta_value']; ?>">
                        <span class="font-13 text-muted">Enter Email of a Person Who Will Receive Sales Order Emails</span>
                      </div>
                  <?php } ?>
                    <div class="row">
                      <div class="col-md-12 text-center">
                        <input type="submit" name="submit" id="submit" value="Update" class="btn btn-success px-5">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-2"></div>
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
      freeCharges    : "required",
      salesEmail     : "required",
    },

    messages: {         
      freeCharges    : "Please Enter Free Shipping Charges",
      salesEmail     : "Please Enter Sales Order Email",
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
          url: "actions/saveSiteSettings",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,
          success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('Updated Successfully...!');
              setTimeout(function (){
              <?php if ($_REQUEST['key'] == 'SOE'){ ?>
                location.href = "siteSettings?key=SOE";
              <?php } else if($_REQUEST['key'] == 'FSC'){ ?>
                location.href = "siteSettings?key=FSC";
              <?php } ?>
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