<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php'); 
   $randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;
 
   $res_qry = "select * from products WHERE randomId = '".$randomId."'";
   $res_data = $crud->getData($res_qry);

   $sel_catg = "select * from categories ";
   $res_catg = $crud->getData($sel_catg);

   $image =$res_data[0]['product_image'];

   $image1=substr($image, 3);

   $otherImgsQry = "SELECT * FROM prod_images WHERE prod_code = '".$res_data[0]['prod_code']."'";
   $otherImgsData = $crud->getData($otherImgsQry);

   $sel_cat = "SELECT c.id,c.catg_name, p.* FROM products as p left join categories as c on c.id = p.catg_id order by p.id  desc";
   $res_cat =$crud->getData($sel_cat);

   $selVat ="select * from vat_rates order by id asc";
   $resVat =$crud->getData($selVat);

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
                <?php if ($_GET['type']=='view') { ?>
                  View Products
                <?php } ?>
                <?php if ($_GET['type']=='edit') { ?>
                  Edit Products
                <?php } ?>
                </h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="home">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                    <?php if ($_GET['type']=='view') { ?>
                      View Products
                    <?php } ?>
                    <?php if ($_GET['type']=='edit') { ?>
                      Edit Products
                    <?php } ?>
                    </li>
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
              
                  <form name="editform" id="editform" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <?php if ($_GET['type']=='view') { ?>
                    <div class="col-12">
                        <div class="form-group">
                          <label>Category</label>
                          <select class="form-control" name="catg_id" id="catg_id" disabled>
                           <option value="">--Select Option--</option>
                          <?php foreach ($res_catg as $key => $value) { ?>

                            <option value="<?php echo $value['id']; ?>"<?php if ($value['id'] == $res_cat[0]['catg_id']) {echo "selected";} ?>><?php echo $value['catg_name'];?></option>
                         <?php   } ?>
                         
                        </select>
                         
                        </div>
                      </div>
                         <div class="col-12">
                        <div class="form-group">
                          <label>Product Code</label>
                          <input type="text" class="form-control" name="prod_code" id="prod_code" value="<?php echo $res_data[0]['prod_code']; ?>" readonly>
                        </div>
                      </div>
                      
                       <div class="col-12">
                        <div class="form-group">
                          <label>Product Name</label>
                          <input type="text" class="form-control" name="prod_name" id="prod_name" value="<?php echo $res_data[0]['prod_name']; ?>" readonly>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label>Product Description</label>
                          <textarea class="form-control" name="prod_description" id="prod_description" readonly><?php echo $res_data[0]['prod_description']; ?></textarea>
                          
                        </div>
                      </div>
                             <div class="col-12">
                        <div class="form-group">
                          <label>Price</label>
                         <input type="text" name="price" id="price" class="form-control" value="<?php echo $res_data[0]['price']; ?>" readonly>
                          
                        </div>
                      </div>
                       <div class="col-12">
                        <div class="form-group">
                          <label>Quantity</label>
                          <input type="text" name="quantity" id="quantity" class="form-control" value="<?php echo $res_data[0]['quantity']; ?>" readonly>
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="form-group">
                          <label>Vat Rate</label>
                          <select class="form-control" name="vat_rate" id="vat_rate">
                            <option value="">--Select Option--</option>
                            <?php foreach ($resVat as $key => $value) { ?>
                              <option value="<?php echo $value['vat_rate']; ?>" <?php if($value['vat_rate'] == $res_data[0]['vat_rate']){ echo "selected";} ?>><?php echo $value ['vat_rate']; ?></option>
                           <?php   } ?>
                          </select>
                        </div>
                      </div>

                       <div class="col-3">
                        <div class="form-group">
                          <label>Product Image</label>
                          <br>
                          <img src="<?php echo $image1; ?>" style="width: 150px;" />
                        </div>
                      </div>
                      <div class="col-9">
                        <div class="form-group">
                          <label>Other Images</label>
                          <br>
                          <?php foreach ($otherImgsData as $row){ ?>
                            <img src="<?php echo substr($row['image'], 3); ?>" style="width: 150px;" />
                          <?php } ?>
                        </div>
                      </div>
                    <?php } ?>
                    <?php if ($_GET['type']=='edit') { ?>
                      <div class="col-12">
                        <div class="form-group">
                          <label>Category</label>
                          <select class="form-control" name="catg_id" id="catg_id">
                           <option value="">--Select Option--</option>
                          <?php foreach ($res_catg as $key => $value) { ?>

                            <option value="<?php echo $value['id']; ?>"<?php if ($value['id'] == $res_data[0]['catg_id']) {echo "selected";} ?>><?php echo $value['catg_name'];?></option>
                         <?php   } ?>
                         
                        </select>
                         
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label>Product Code</label>
                          <input type="text" class="form-control" name="prod_code" id="prod_code" value="<?php echo $res_data[0]['prod_code']; ?>">
                        </div>
                      </div>
                       <div class="col-12">
                        <div class="form-group">
                          <label>Product Name</label>
                          <input type="text" class="form-control" name="prod_name" id="prod_name" value="<?php echo $res_data[0]['prod_name']; ?>">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label>Product Description</label>
                          <textarea class="form-control" name="prod_description" id="prod_description"><?php echo $res_data[0]['prod_description']; ?></textarea>
                          
                        </div>
                      </div>
                         <div class="col-12">
                        <div class="form-group">
                          <label>Price</label>
                         <input type="text" name="price" id="price" class="form-control" value="<?php echo $res_data[0]['price']; ?>">
                        </div>
                      </div>
                       <div class="col-12">
                        <div class="form-group">
                          <label>Quantity</label>
                          <input type="text" name="quantity" id="quantity" class="form-control" value="<?php echo $res_data[0]['quantity']; ?>">
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="form-group">
                          <label>Vat Rate</label>
                          <select class="form-control" name="vat_rate" id="vat_rate">
                            <option value="">--Select Option--</option>
                            <?php foreach ($resVat as $key => $value) { ?>
                              <option value="<?php echo $value['vat_rate']; ?>" <?php if ($value['vat_rate'] == $res_data[0]['vat_rate']) { echo "selected";
                               } ?>><?php echo $value ['vat_rate']; ?></option>
                           <?php   } ?>
                          </select>
                        </div>
                      </div>

                       <div class="col-3">
                        <div class="form-group">
                          <label>Product Image</label>
                          <input type="file" class="form-control" name="product_image" id="product_image"><br>
                           <input type="hidden" class="form-control" name="old_image" id="old_image"  value="<?php echo $image; ?>" >
                          <img src="<?php echo $image1; ?>" style="width: 100%;"/>
                        </div>
                      </div>
                      <div class="col-9">
                        <div class="form-group">
                          <label>Other Images</label>
                          <input type="file" class="form-control" name="image[]" id="image" multiple>
                          <br>
                          <div class="row">
                           <?php foreach ($otherImgsData as $row){ ?>
                            <div class="col-4 text-center">
                              <img src="<?php echo substr($row['image'], 3); ?>" style="width: 100%;">
                              <input type="hidden" name="old_pics[]" value="<?php echo $row['image']; ?>">
                              <a href="javascript:void(0)" title="Delete" onclick="DelImg(<?php echo $row['id']; ?>)"><i class="fas fa-trash fa-lg text-danger my-2"></i></a>
                            </div>
                          <?php } ?>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                      <div class="col-6">
                        <button type="button" class="btn btn-danger" onclick="location.href = 'product'">Cancel</button>
                      </div>
                      <?php if ($_GET['type'] == 'edit') { ?>
                      <div class="col-6">
                        <input type="hidden" name="hdn_id" id="hdn_id" value="<?php echo $res_data[0]['randomId']; ?>">
                        <button type="submit" class="btn btn-success float-right">Update</button>
                      </div>
                    <?php } ?>
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
function DelImg(Rid){
  // alert(Rid);
  let check = confirm('Are You Sure You Want To Delete This Data..?');
  if(check) {
    $.ajax({
      url  : "actions/saveProducts",
      type : "post",
      data : { Rid : Rid, action : 'singleDelete' },
      success: function(data) {
        if(data == 'true') {
          toastr.success('Deleted Successfully...!');
         location.href = "editProduct?type=edit&randomId=<?php echo $randomId; ?>";
        }
      }
    });
  }
  return false;
}
  CKEDITOR.config.debug = true;
  CKEDITOR.config.extraAllowedContent = '*[*]';


$(document).ready(function() {
  CKEDITOR.replace('prod_description', {
    width: '100%',
    height: '100px'
  });
});
 
$(function() {
  
  $("form[name='editform']").validate({
   
       rules: {         
      catg_id          : "required",
      prod_name        : "required",
      prod_description : "required",
      // product_image    : "required",
    },

    messages: {         
      catg_id          : "Please Enter Category ID",
      prod_name        : "Please Enter Product Name",
      prod_description : "Please Enter Product Description",
      // product_image    : "Please Upload Product Image"
    },
    
    
    submitHandler: function(form) {
     // alert("hii");
      
        let formdata = new FormData();
         var prod_description = CKEDITOR.instances.prod_description.getData();
        let x = $('#editform').serializeArray();
        $.each(x, function(i, field){
          if (field.name == "prod_description"){
            formdata.append(field.name,prod_description);
        }
        else{
        formdata.append(field.name, field.value);
        }
        });
        formdata.append('action' , 'update');

        let product_image = $('#product_image')[0].files;

        if (product_image.length > 0){
          formdata.append('product_image', product_image[0]);
        }

        let image = $('#image')[0].files;

        for (var i = 0; i < image.length; i++) {

          formdata.append('image[]' , image[i]);
        }  

        $.ajax({
          type: "POST",
          url: "actions/saveProducts",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,
          success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('Updated Successfully...!');
              setTimeout(function (){
                location.href = "product";
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