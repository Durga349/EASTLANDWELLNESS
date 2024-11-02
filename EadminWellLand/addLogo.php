<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">


<?php include('includes/header.php'); 



?>
<script src="ckeditor/ckeditor.js"></script>

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
                <h4 class="mb-0 font-size-18">Add Logo</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="home">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Add Logo</li>
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
           <!--  <div class="card-header">
              <h3 class="card-title">Add Logo</h3>
            </div> -->
            
            <div class="card-body">
              <div class="row mb-3">
              <div class="col-md-6 mb-3">
                <label for="inputName">Navbar Logo</label>
                <input type="file" name="header_logo" id="header_logo" class="form-control">
              </div>
               <div class="col-md-6 mb-3">
                <label for="inputName">Footer Logo</label>
                <input type="file" name="footer_logo" id="footer_logo" class="form-control">
              </div>
              
              <div class="col-md-12 text-center">
                <input type="button" name="Back" value="Cancel" class="btn btn-danger float-left" onclick="location.href = 'manageSiteLogo'">
              <input type="submit" name="submit" value="save" class="btn btn-primary float-right">
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
      
      
       
       header_logo                   : "required",
       footer_logo                   : "required",
       
    },
    // Specify validation error messages
    messages: {         
      
     
       header_logo                    : "Please Upload your Image",
       footer_logo                    : "Please Upload your Image",
     
        },
    
    submitHandler: function(form) {
      
        let formdata = new FormData();
       

      
        let x = $('#addformpage').serializeArray();
        $.each(x, function(i, field){
         formdata.append(field.name, field.value);
        });
        formdata.append('action' , 'save');
        

        let image = $('#header_logo')[0].files;
        if (image.length > 0){
          formdata.append('image' , image[0]);
        } 


        let image1 = $('#footer_logo')[0].files;
        if (image1.length > 0){
          formdata.append('image1' , image1[0]);
        }
        $.ajax({
          type: "POST",
          url: "actions/saveLogo",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,
          success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('saved successfully...!');
              setTimeout(function (){
                location.href = "manageSiteLogo";
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