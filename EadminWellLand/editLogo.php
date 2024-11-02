<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php'); 

$randid = $_GET['randomId'] && $_GET['randomId'] != '' ? $_GET['randomId'] : 0;

$Ser_qry = "select * from site_logo where randomId = '".$randid."'";
$Ser_data = $crud->getData($Ser_qry);

$header =$Ser_data[0]['header_logo'];
$image=substr($header, 3);


$footer =$Ser_data[0]['footer_logo'];
$image1=substr($footer, 3);

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
                    Edit SiteLogo
                  <?php } ?>
                  <?php if($_GET['type']=='view'){?>
                    View SiteLogo
                  <?php } ?>
                </h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="home">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                      <?php if($_GET['type']=='edit'){?>
                        Edit SiteLogo
                      <?php } ?>
                      <?php if($_GET['type']=='view'){?>
                        View SiteLogo
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

                
             <div class="col-md-6 mb-3">

                <label for="inputName">Navbar Logo</label> <br>
                <input type="file" name="header_logo" id="header_logo" class="form-control">
                <br>
                <input type="hidden" class="form-control" name="old_image" id="old_image"  value="<?php echo $image; ?>" >
                <img src="<?php echo $image; ?>" style="width: 150px;" />
               

              </div>
               <div class="col-md-6 mb-3">

                <label for="inputName">Navbar Logo</label> <br>
                <input type="file" name="footer_logo" id="footer_logo" class="form-control">
                <br>
                <input type="hidden" class="form-control" name="old_image" id="old_image"  value="<?php echo $image1; ?>" >
                <img src="<?php echo $image1; ?>" style="width: 150px;" />
               

              </div>
          

            <div class="col-md-12 text-center">
               <input type="button" name="Back" value="Cancel" class="btn btn-danger float-left" onclick="location.href = 'manageSiteLogo'">

              <input type="hidden" name="hdn_id" id="hdn_id" value="<?php echo $randid;?>">
              <input type="submit" name="submit" value="Update" class="btn btn-primary float-right">
              </div>
            </div>
<?php } ?>


<?php if($_GET['type']=='view'){?>

             <div class="row mb-3">
               
             
             <div class="col-md-6 mb-3">
                <label for="inputName">Nav Logo</label> <br>
                 <img src="<?php echo $image; ?>" style="width: 150px; height: 100px;" />
               

              </div>
               <div class="col-md-6 mb-3">
                <label for="inputName">Footer Logo</label> <br>
                 <img src="<?php echo $image1; ?>" style="width: 150px; height: 100px;" />
               

              </div>
            <div class="col-md-12 text-center">
                <input type="button" name="Back" value="Cancel" class="btn btn-danger float-left" onclick="location.href = 'manageSiteLogo'">
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
        formdata.append('action' , 'update');
        
          let image = $('#header_logo')[0].files;
        if (image.length > 0){
          formdata.append('image' , image[0]);
        } 


        let image1 = $('#footer_logo')[0].files;
        if (image1.length > 0){
          formdata.append('image1' , image1[0]);
        }
        //alert("hiii");
     
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
              toastr.success('Updated successfully...!');
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