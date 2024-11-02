<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php'); 

$randid = $_GET['randomId'] && $_GET['randomId'] != '' ? $_GET['randomId'] : 0;

$Ser_qry = "select ba.email,ba.first_name,o.* from orders as o left join billing_address as ba on ba.id=o.order_id where o.randomId = '".$randid."'";
$Ser_data = $crud->getData($Ser_qry);
// exit;

$image =$Ser_data[0]['image'];
$image1=substr($image, 3);


$Sel_BillAdrs = "SELECT * FROM billing_address WHERE randomId = '".$randid."'";
$BillAdrs_Data = $crud->getData($Sel_BillAdrs);

$custEmail = $BillAdrs_Data[0]['email'];
$custName  = $BillAdrs_Data[0]['first_name']." ";
$custName  .= $BillAdrs_Data[0]['last_name'];

 $sel_prod ="SELECT oi.order_item_id,p.price,o.total_amount,o.shipping_amount, MAX(CASE WHEN om.meta_key = 'ProductID' THEN om.meta_value END) AS ProductID, MAX(CASE WHEN om.meta_key = 'ProductName' THEN om.meta_value END) AS ProductName, MAX(CASE WHEN om.meta_key = 'ProductImage' THEN om.meta_value END) AS ProductImage, MAX(CASE WHEN om.meta_key = 'Quantity' THEN om.meta_value END) AS Quantity FROM orders o JOIN orderitems oi ON o.id = oi.order_id JOIN orderitemmeta om ON oi.order_item_id = om.order_item_id left join cart as c on c.user_id=o.user_id left join products as p on p.id =c.item_id   WHERE o.randomId = '".$randid."' GROUP BY oi.order_item_id;";
$prod_data = $crud->getData($sel_prod);

// $sel_prod = "SELECT o.total_amount,om.* FROM orderitemmeta as om left join orderitems as oi on om.order_item_id =oi.order_item_id left join orders as o on o.id = oi.order_id   WHERE om.randomId = '".$randid."'";
// $prod_data = $crud->getData($sel_prod);

?>

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
                    Edit Orders Details
                  <?php } ?>
                  <?php if($_GET['type']=='view'){?>
                    View Orders Details
                  <?php } ?>
                </h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="home">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                      <?php if($_GET['type']=='edit'){?>
                        Edit Orders Details
                      <?php } ?>
                      <?php if($_GET['type']=='view'){?>
                        View Orders Details
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
                <div class="row">
              <div class="col-md-5">
                <div class="row my-3">
                  <div class="col-4">Order ID</div>
                  <div class="col-8">
                    <input type="text" name="order_id" id="order_id" class="form-control " value="<?php echo $Ser_data[0]['order_id'];?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">Order Date</div>
                  <div class="col-8">
                    <input type="text" name="transactiondate" id="transactiondate" class="form-control" value="<?php echo  $Ser_data[0]['transactiondate'];?>">
                  </div>
                </div>
              </div>
              <div class="col-md-7">
                <div class="card">
                  <div class="card-header">
                    <h4>Billing Information</h4>
                  </div>
                  <div class="card-body">
                    <p style="margin-bottom: 0px;">
                      <?php echo $custName; ?>, <br>
                      <?php echo $BillAdrs_Data[0]['address']; ?>, <br>
                      <?php echo $BillAdrs_Data[0]['city'].','.$BillAdrs_Data[0]['state'].','.$BillAdrs_Data[0]['zip_code']; ?> <br>
                      <?php echo $custEmail; ?><br>
                    </p>
                  </div>
                </div>
              </div>
            </div>
                <div class="col-md-12 mb-3">
                  <label for="inputName">Transaction ID</label>
                  <input type="text" name="transaction_id" id="transaction_id" class="form-control" value="<?php echo  $Ser_data[0]['transaction_id'];?>">
                </div>
                <div class="col-md-12 mb-3">
                  <label for="inputName">Title</label>
                  <input type="text" name="payment_type" id="payment_type" class="form-control" value="<?php echo  $Ser_data[0]['payment_type'];?>">
                </div>
                <div class="col-md-12 mb-3">
                  <label for="inputName">Title</label>
                  <input type="text" name="total_amount" id="total_amount" class="form-control" value="<?php echo  $Ser_data[0]['total_amount'];?>">
                </div>

            <div class="col-md-12 text-center">
               <input type="button" name="Back" value="Cancel" class="btn btn-danger float-left" onclick="location.href = 'manageOrders'">

              <input type="hidden" name="hdn_id" id="hdn_id" value="<?php echo $randid;?>">
              <input type="submit" name="submit" value="Update" class="btn btn-primary float-right">
              </div>
            </div>
<?php } ?>


<?php if($_GET['type']=='view'){?>
            <div class="row">
              <div class="col-md-5">
                <div class="row my-3">
                  <div class="col-4">Order ID</div>
                  <div class="col-8"><b><?php echo $Ser_data[0]['order_id']; ?></b></div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">Order Date</div>
                  <div class="col-8"><b><?php echo $Ser_data[0]['transactiondate']; ?></b>
                  </div>
                </div>
              </div>
              <div class="col-md-7">
                <div class="card">
                  <div class="card-header">
                    <h4>Billing Information</h4>
                  </div>
                  <div class="card-body">
                    <p style="margin-bottom: 0px;">
                      <?php echo $custName; ?>, <br>
                      <?php echo $BillAdrs_Data[0]['address']; ?>, <br>
                      <?php echo $BillAdrs_Data[0]['city'].','.$BillAdrs_Data[0]['state'].','.$BillAdrs_Data[0]['zip_code']; ?> <br>
                      <?php echo $custEmail; ?><br>
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="col-md-4 mt-2"> -->
             
            <!-- </div> -->
            <div class="col-md-12 mt-3">
            <table class="table table-bordered">
              <thead>
                <th class="text-center">Product Image</th>
                <th>Product Name</th>
                <th class="text-center">Quantity</th>
                <th>Price</th>
              </thead>
              <tbody>
             <?php foreach ($prod_data as $row) :
                $prodImg = str_replace("../", "", $row['ProductImage']);

              ?>
            <tr>
                <td><img src="http://eastland-wellness.com/admin/<?php echo $prodImg; ?>" alt="img" width="100" height="100">
                </td>
                <td>
                    <?php echo $row['ProductName']; ?>
                </td>
                <td>
                   <?php echo $row['Quantity']; ?>
                   
                </td>
                <td><?php echo $row['price'] *$row['Quantity']; ?></td>

              
            </tr>
        <?php endforeach; ?>
                <tr>
                  <td colspan="2" rowspan="3"></td>
                  <td>Sub Total</td>
                  <td>$<?php echo $prod_data[0]['total_amount']; ?></td>
                </tr>
                <tr>
                  <td>Shipping Charges</td>
                  <td>$<?php echo $prod_data[0]['shipping_amount']; ?></td>
                </tr>
                <tr>
                  <td><b>Total</b></td>
                  <td><b>$<?php echo $prod_data[0]['total_amount'] + $prod_data[0]['shipping_amount']; ?></b></td>
                </tr>
              </tbody>
            </table>
          </div>
               
  
            <div class="col-md-12 text-center">
               <input type="button" name="Back" value="Cancel" class="btn btn-danger float-left" onclick="location.href = 'manageOrders'">
              </div>
            <!-- </div> -->
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
     
       image                   : "required",
       
    },
    // Specify validation error messages
     messages: {         
       name                     : "Please Enter your Name",
      
       image                    : "Please Upload your Image",
     
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
          url: "actions/saveOrders",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,

          success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('Updated successfully...!');
              setTimeout(function (){
                location.href = "manageOrders";
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