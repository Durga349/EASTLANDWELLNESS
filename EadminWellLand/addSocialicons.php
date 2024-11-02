<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php');

$SelSocailicons ="select title from icons order by id asc";
$Resocailiocns =$crud->getData($SelSocailicons);

 ?>

<style>
  .error{
    color: red;
  }
</style>
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
                <h4 class="mb-0 font-size-18">Add Social Icons</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="home">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Add Social Icons</li>
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
        <form name="addformpage" id="addformpage"  autocomplete="off" enctype="multipart/form-data">
          <div class="card card-primary">
         <div class="card-body">
          <div class="row mb-3">
                <?php $i = 0; foreach ($Resocailiocns as $key => $value) { ?>
                    <div class="col-md-2 mt-3">
                        <span><?php echo $i + 1; ?>.</span>
                        <label for="inputName"><?php echo ucfirst($value['title']); ?></label>
                        <input type="hidden" name="title[]" value="<?php echo $value['title']; ?>">
                    </div>
                    <div class="col-md-10 mt-3">
                        <input type="url" name="link[]" class="form-control">
                    </div>
                    <?php $i++; } ?>
                <div class="col-md-12 text-center mt-3">
                    <input type="button" name="Back" value="Cancel" class="btn btn-danger float-left" onclick="location.href = 'manageSocialicons'">
                    <input type="submit" name="submit" value="Save" class="btn btn-primary float-right">
                </div>
            </div>
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
   
    submitHandler: function(form) {
      
        let formdata = new FormData();
        
        let x = $('#addformpage').serializeArray();
        $.each(x, function(i, field){
        
  
        formdata.append(field.name, field.value);
        
        });
        formdata.append('action' , 'save');
         
        $.ajax({
          type: "POST",
          url: "actions/saveSocilaicons",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,
          success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('saved successfully...!');
              setTimeout(function (){
                location.href = "manageSocialicons";
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