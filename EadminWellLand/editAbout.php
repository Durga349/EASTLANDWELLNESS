<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php'); 

$randid = $_GET['randomId'] && $_GET['randomId'] != '' ? $_GET['randomId'] : 0;

$Ser_qry = "select * from about_content where randomId = '".$randid."'";
$Ser_data = $crud->getData($Ser_qry);

$image =$Ser_data[0]['image'];
$image1 =substr($image, 3)

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
                    Edit About Content
                  <?php } ?>
                  <?php if($_GET['type']=='view'){?>
                    View About Content
                  <?php } ?>
                </h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="home">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                      <?php if($_GET['type']=='edit'){?>
                        Edit About Content
                      <?php } ?>
                      <?php if($_GET['type']=='view'){?>
                        View About Content
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
                  <div class="col-md-12 mb-3">
                <label for="inputName">Title</label>
                 <input type="text" name="title" id="title" class="form-control" value="<?php echo 
$Ser_data[0]['title'];  ?>">

              </div>
              <div class="col-md-12 mb-3">
                <label for="inputName">Description</label>
                 <textarea name="description" id="description" rows="10" cols="80" class="form-control"><?php echo $Ser_data[0]['description'];?>
                </textarea>

              </div>
             <div class="col-md-12 mb-3">
                <label for="inputName">Image</label> <br>
                 <input type="file" name="image" id="image" class="form-control">
                <br>
                <input type="hidden" class="form-control" name="old_image" id="old_image"  value="<?php echo $image1; ?>" >
                <img src="<?php echo $image1; ?>" style="width: 150px;" />
               

              </div>
          

            <div class="col-md-12 text-center">
               <input type="button" name="Back" value="Cancel" class="btn btn-danger float-left" onclick="location.href = 'mangeAboutcontent'">

              <input type="hidden" name="hdn_id" id="hdn_id" value="<?php echo $randid;?>">
              <input type="submit" name="submit" value="Update" class="btn btn-primary float-right">
              </div>
            </div>
<?php } ?>


<?php if($_GET['type']=='view'){?>

             <div class="row mb-3">
              <div class="col-md-12 mb-3">
                <label for="inputName">Title</label>
                 <input type="text" name="title" id="title" class="form-control" value="<?php echo 
$Ser_data[0]['title'];  ?>">

              </div>
             <div class="col-md-12 mb-3">
                <label for="inputName">Name</label>
               <textarea name="description" id="description" rows="10" cols="80" class="form-control"><?php echo $Ser_data[0]['description'];?>
                </textarea>

              </div>
             <div class="col-md-12 mb-3">
                <label for="inputName">Image</label> <br>
                 <img src="<?php echo $image1; ?>" style="width: 150px;" />
               

              </div>
            <div class="col-md-12 text-center">
                <input type="button" name="Back" value="Cancel" class="btn btn-danger float-left" onclick="location.href = 'mangeAboutcontent'">
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

    CKEDITOR.config.debug = true;

$(document).ready(function() {
  CKEDITOR.replace('description', {
    width: '100%',
    height: '100px'
  });
});
   $(function() {
  
  $("form[name='addformpage']").validate({
   rules: {         
      
       designation             : "required",
     
       image                   : "required",
       
    },
    // Specify validation error messages
     messages: {         
       name                     : "Please Enter your Name",
      
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
        formdata.append('action' , 'update');
        
         let image = $('#image')[0].files;
        if (image.length > 0){
          formdata.append('image' , image[0]);
        }
        //alert("hiii");
     
        $.ajax({
          type: "POST",
          url: "actions/saveAbout",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,

          success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('Updated successfully...!');
              setTimeout(function (){
                location.href = "mangeAboutcontent";
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