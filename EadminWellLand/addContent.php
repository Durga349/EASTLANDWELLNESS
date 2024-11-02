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
                <h4 class="mb-0 font-size-18">Add Home Content</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="home">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Add Home Content</li>
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
              <h3 class="card-title">Add Slider</h3>
            </div>
             -->
            <div class="card-body">
              <div class="row mb-3">
             <div class="col-md-12 mb-3">
			  <label for="inputName">Title</label>
			  <input type="text" name="title" id="title" class="form-control">
			</div>
           <div class="col-md-12 mb-3">
                <label for="inputName">Description</label>
                 <textarea name="description" id="description" rows="10" cols="80" class="form-control">
                </textarea>

              </div>
              <div class="col-md-12 mb-3">
                <label for="inputName">Image</label>
                <input type="file" name="image" id="image" class="form-control">
              </div>
              
              <div class="col-md-12 text-center">
                <input type="button" name="Back" value="Cancel" class="btn btn-danger float-left" onclick="location.href = 'manageContent'">
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

      CKEDITOR.config.debug = true;

CKEDITOR.replace('description', {
  width: '100%',
  height: '100px',
  
});


   $(function() {
  
  $("form[name='addformpage']").validate({
   
    rules: {         
      
       title                   : "required",
       description             : "required",
       
       image                   : "required",
       
    },
    // Specify validation error messages
    messages: {         
      
       title                    : "Please Enter your Title",
       description              : "Please Enter your Description",
      
       image                    : "Please Upload your Image",
     
        },
    
    submitHandler: function(form) {
      
        let formdata = new FormData();
        var Service = CKEDITOR.instances.description.getData();

      
        let x = $('#addformpage').serializeArray();
        $.each(x, function(i, field){
         if (field.name == "description"){
            formdata.append(field.name,Service);
        }
        else{
        formdata.append(field.name, field.value);
        }
        });
        formdata.append('action' , 'save');
        

        let image = $('#image')[0].files;
        if (image.length > 0){
          formdata.append('image' , image[0]);
        } 
        $.ajax({
          type: "POST",
          url: "actions/saveContent",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,
          success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('saved successfully...!');
              setTimeout(function (){
                location.href = "manageContent";
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