<!DOCTYPE html>
<html lang="en">
<?php 

include('includes/header.php');
$randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;
$sel_cat ="select * from contact where randomId = '".$randomId."'";
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
                <h4 class="mb-0 font-size-18">View Enquries Details</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                     <a href="home">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">View Enquries Details</li>
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
                  <!-- <h4 class="card-title">View Customer Details</h4> -->
                  <form name="addformpage" id="addformpage" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label>First Name</label>
                          <input type="text" class="form-control"  name="fname" id="fname" value="<?php echo $res_cat[0]['fname']; ?>" readonly>
                        </div>
                      </div>
                       <div class="col-6">
                        <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $res_cat[0]['lname']; ?>" readonly>
                        </div>
                      </div>
                       <div class="col-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" id="email" value="<?php echo $res_cat[0]['email']; ?>" readonly>
                        </div>
                      </div>
                       <div class="col-6">
                        <div class="form-group">
                          <label>Phone</label>
                          <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $res_cat[0]['phone']; ?>" readonly>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label>Enquiry Type</label>
                          <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $res_cat[0]['enq_type']; ?>" readonly>
                        </div>
                      </div>
                      <div class="col-6">
                        <label>Message</label>
                        <textarea name="message" id="message" class="form-control" readonly><?php echo $res_cat[0]['message']; ?></textarea>
                      </div>
                      <div class="col-12 mt-3">
                        <button type="button" class="btn btn-danger" onclick="location.href = 'manageEnquries'">Cancel</button>
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

  CKEDITOR.config.debug = true;
  CKEDITOR.config.extraAllowedContent = '*[*]';


$(document).ready(function() {
  CKEDITOR.replace('prod_description', {
    width: '100%',
    height: '100px'
  });
});

</script>
</html>