<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php'); ?>

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
                <h4 class="mb-0 font-size-18">Add Categories</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="home">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Add Categories</li>
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
                  <!-- <h4 class="card-title">Add Category</h4> -->
                  <form name="addformpage" id="addformpage" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label>Categoey Name</label>
                          <input type="text" class="form-control" name="catg_name" id="catg_name">
                          <!-- <span class="font-13 text-muted">e.g "Beauty"</span> -->
                        </div>
                      </div>
                      <div class="col-6">
                        <button type="button" class="btn btn-danger" onclick="location.href = 'categories'">Cancel</button>
                      </div>
                      <div class="col-6">
                        <button type="submit" class="btn btn-success float-right">Submit</button>
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
      catg_name    : "required",
    },

    messages: {         
      catg_name    : "Please Enter Category Name",
    },
    
    submitHandler: function(form) {
     // alert("hii");
      
        let formdata = new FormData();
        let x = $('#addformpage').serializeArray();
        $.each(x, function(i, field){
          formdata.append(field.name,field.value);
        });
        formdata.append('action' , 'save'); 

        $.ajax({
          type: "POST",
          url: "actions/saveCategories",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,
          success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('saved successfully...!');
              setTimeout(function (){
                location.href = "categories";
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