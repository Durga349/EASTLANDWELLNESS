<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php');

$sel_cat ="select * from categories order by id asc";
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
                <h4 class="mb-0 font-size-18">Add Products</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                     <a href="home">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Add Products</li>
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
                  <!-- <h4 class="card-title">Add Product</h4> -->
                  <form name="addformpage" id="addformpage" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label>Category</label>
                          <select class="form-control" name="catg_id" id="catg_id">
                            <option value="">--Select Option--</option>
                            <?php foreach ($res_cat as $key => $value) { ?>
                              <option value="<?php echo $value['id']; ?>"><?php echo $value ['catg_name']; ?></option>
                           <?php   } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label>Product Code</label>
                          <input type="text" class="form-control" name="prod_code" id="prod_code">
                        </div>
                      </div>
                       <div class="col-12">
                        <div class="form-group">
                          <label>Product Name</label>
                          <input type="text" class="form-control" name="prod_name" id="prod_name">
                          <!-- <span class="font-13 text-muted">e.g "Beauty"</span> -->
                        </div>
                      </div>
                       <div class="col-12">
                        <div class="form-group">
                          <label>Product Description</label>
                          <textarea class="form-control" name="prod_description" id="prod_description"></textarea>
                          
                          <!-- <span class="font-13 text-muted">e.g "Beauty"</span> -->
                        </div>
                      </div>
                       <div class="col-12">
                        <div class="form-group">
                          <label>Price</label>
                         <input type="text" name="price" id="price" class="form-control">
                          
                          <!-- <span class="font-13 text-muted">e.g "Beauty"</span> -->
                        </div>
                      </div>
                       <div class="col-12">
                        <div class="form-group">
                          <label>Quantity</label>
                          <input type="text" name="quantity" id="quantity" class="form-control">
                         </div>
                      </div>

                         <div class="col-12">
                        <div class="form-group">
                          <label>Vat Rate</label>
                          <select class="form-control" name="vat_rate" id="vat_rate">
                            <option value="">--Select Option--</option>
                            <?php foreach ($resVat as $key => $value) { ?>
                              <option value="<?php echo $value['vat_rate']; ?>"><?php echo $value ['vat_rate']; ?></option>
                           <?php   } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="form-group">
                          <label>Product Image</label>
                          <input type="file" class="form-control" name="product_image" id="product_image">
                          <span class="font-13 text-muted">Note : Main Image</span>
                        </div>
                      </div>

                       <div class="col-12">
                        <div class="form-group">
                          <label>Other Images</label>
                          <input type="file" class="form-control" name="image[]" id="image" multiple>
                          <span class="font-13 text-muted">Note : Alternate Product Images</span>
                        </div>
                      </div>

                      <div class="col-6">
                        <button type="button" class="btn btn-danger" onclick="location.href = 'product'">Cancel</button>
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

<script type="text/javascript">

  CKEDITOR.config.debug = true;
  CKEDITOR.config.extraAllowedContent = '*[*]';


$(document).ready(function() {
  CKEDITOR.replace('prod_description', {
    width: '100%',
    height: '100px'
  });
});

 
$(function() {
  
  $("form[name='addformpage']").validate({
   
    rules: {        
      catg_id          : "required",
      prod_name        : "required",
      prod_description : "required",
      product_image    : "required",
    },

    messages: {         
      catg_id          : "Please Enter Category ID",
      prod_name        : "Please Enter Product Name",
      prod_description : "Please Enter Product Description",
      product_image    : "Please Upload Product Main Image",
    },
    
    submitHandler: function(form) {
     // alert("hii");
      
        let formdata = new FormData();
         var prod_description = CKEDITOR.instances.prod_description.getData();
        let x = $('#addformpage').serializeArray();
        $.each(x, function(i, field){

        if (field.name == "prod_description"){
            formdata.append(field.name,prod_description);
        }
        else{
          formdata.append(field.name, field.value);
        }
          
        });
        formdata.append('action' , 'save'); 

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
              toastr.success('Saved Successfully...!');
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