<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php'); 

$id = $_GET['randomId'];
 $Ser_qry = "select * from socialicons where id = '".$id."'";
$Ser_data = $crud->getData($Ser_qry);


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
                    Edit Social Icons
                  <?php } ?>
                  <?php if($_GET['type']=='view'){?>
                    View Social Icons
                  <?php } ?>
                </h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                       <a href="home">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                      <?php if($_GET['type']=='edit'){?>
                        Edit Social Icons
                      <?php } ?>
                      <?php if($_GET['type']=='view'){?>
                        View Social Icons
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
                <?php $i = 0; foreach ($Ser_data as $key => $value) { ?>
                    <div class="col-md-2 mt-3">
                        <span><?php echo $i + 1; ?>.</span>
                        <label for="inputName"><?php echo ucfirst($value['title']); ?></label>
                        <input type="hidden" name="title" value="<?php echo $value['title']; ?>">
                    </div>
                    <div class="col-md-10 mt-3">
                        <input type="url" name="link" class="form-control" value="<?php echo $value['link']; ?>">
                    </div>
                    <?php $i++; } ?>
                <div class="col-md-12 text-center mt-3">
                    <input type="button" name="Back" value="Cancel" class="btn btn-danger float-left" onclick="location.href = 'manageSocialicons'">
                    <input type="hidden" name="hid_id" id="hid_id" value="<?php echo $value['id']; ?>">
                    <input type="submit" name="submit" value="Update" class="btn btn-primary float-right">
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
      
       designation             : "required",
     
       // image                   : "required",
       
    },
    // Specify validation error messages
     messages: {         
       name                     : "Please Enter your Name",
      
       // image                    : "Please Upload your Image",
     
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
          url: "actions/saveSocilaicons",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,

          success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('Updated successfully...!');
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