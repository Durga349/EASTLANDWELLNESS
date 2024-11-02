<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php include('includes/header.php'); 
include('includes/functions.php');?>
<style type="text/css">
    .form-control:focus{
        border-color: none;
        box-shadow: none;
    }
</style>
<body id="page_content">
<?php include('includes/navbar.php'); 
 
 $cart_ID = $_SESSION['cartID'];
 $UserID   =$_SESSION["UserID"];
 $prodId = $_REQUEST['prodId'];

$prodDataQry = "SELECT * from products where id = '".$prodId."'";
$prodData = $crud->getData($prodDataQry);

 $otherImgsQry = "SELECT * FROM prod_images WHERE prod_code = '".$prodData[0]['prod_code']."' LIMIT 3";
 $otherImgsData = $crud->getData($otherImgsQry);
// print_r($prodData);
$prodData[0]['product_image'] = str_replace('../', '', $prodData[0]['product_image']);
$image = 'http://eastland-wellness.com/EadminWellLand/' . $prodData[0]['product_image'];
?>
<section id="product_card">
 <form name="addformpage" id="addformpage" autocomplete="off" method="post" enctype="multipart/form-data" action="payment_address">
    <div class="container bg-light pb-5">
        <div class="row pt-3">
            <div class="col-md-5 images">
                <img src="<?php echo $image; ?>" width="100%" class="large-img">
                <div class="row mt-3 multiimages">
                    <div class="col-3">
                        <img src="<?php echo $image; ?>" width="100%" style="border: 1px solid gray;" class="small-img active">
                    </div>
                    <?php foreach ($otherImgsData as $row) {
                        $rawimg = str_replace('../', '', $row['image']);
                        $Oimg = 'http://eastland-wellness.com/EadminWellLand/' . $rawimg;
                    ?>
                        <div class="col-3">
                            <img src="<?php echo $Oimg; ?>" width="100%" style="border: 1px solid gray;" class="small-img">
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-7 matter">
                <h1 class="montserrat"><?php echo $prodData[0]['prod_name']; ?></h1>
                <div class="row">
                    <div class="col my-3">
                        <h4 class="" style="font-family: 'Kanit';">Price : $ <?php echo product($prodData[0]['price'],$prodData[0]['tax_rate']); ?>&ensp;<span style="font-size: 13px;">(Including all Taxes)</span></h4>
                    </div>
                </div>
                <div class="row">
                   <div class="col-md-1">
                       <p class="mt-2">Qty:</p>
                   </div>
                   <!-- <div class="col-md-4">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent" onclick="decreaseQuantity()" style="cursor: pointer;">-</span>
                          </div>
                          <input type="text" name="quantity" value="1" id="quantityInput" class="form-control bg-transparent" style="text-align: center; border-left: none; border-right: none;">
                          <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent" onclick="increaseQuantity()" style="cursor: pointer;">+</span>
                            <input type="hidden" name="hidQuant" id="hidQuant" class="form-control" value="1">
                          </div>
                        </div>
                   </div> -->
                   <div class="col-md-4">
                       <div class="quantity-box">
                        <div class="input-group">
                            <input type="button" value="-" class="minus" onclick="decreaseQuantity()">
                            <input type="text" name="quantity" value="1" id="quantityInput" class="quantity-number qty form-control bg-transparent" min="1" style="text-align: center;">
                            <input type="button" value="+" class="plus" onclick="increaseQuantity()">
                        </div>
                       </div>
                   </div>
                </div>
                <div class="row my-3">
                    <!-- <div class="col-md-1"></div> -->
                    <div class="col-md-11">
                        <button type="button" name="add_cart" class="btn btn-warning btn-sm text-white float-right" onclick="addToCart()" style="font-size: 15px;"><img src="assets/img/cart_icon.png">&ensp;Add To Cart</button>
                        <input type="hidden" name="hid_id" id="hid_id" class="form-control" value="<?php echo $prodId; ?>">
                        <input type="hidden" name="hidProdCode" id="hidProdcode" class="form-control" value="<?php echo $prodData[0]['prod_code'];?>"> 
                    </div>
                <!-- <div class="col-md-2"></div> -->
                <!-- <div class="col-md-3">
                        <input type="button" name="buy_now" id="buy_now" value="Buy Now" class="btn btn-primary form-control btn-sm" onclick="buyNow()">
                    </div> -->
                </div>
                <div class="row Description mt-3">
                    <h4>Product Description :</h4>
                    <?php echo $prodData[0]['prod_description']; ?>
                </div>
            </div>
            
            <div class="container bg-white mt-3">
                <div class="row">
                    <div class="col-md-4 mt-3">
                        <p>Sold By :</p>
                        <h2 class="seller">Eastland Wellness</h2>
                    </div>
                    <div class="col-md-4 mt-3">
                        <h5 class="productServices">Services :</h5>
                        <p>- 7 Days Return Policy <br>- Warranty Not Available</p>
                    </div>
                    <div class="col-md-4 mt-3">
                        <p>
                            Cash On Delivery<br>
                            Standard Delivery: 1-3 Days<br>
                            Atlanta, Georgia
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</section>
<?php include('includes/footer.php'); ?>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript" src="js/product_details.js"></script>
<script type="text/javascript" src="js/zoomsl.js"></script>
<script type="text/javascript">
    $(".small-img").click(function(){
        $(".large-img").attr('src', $(this).attr('src'));
        $(".small-img").removeClass("active");
        $(this).addClass("active");
    });
    $('.large-img').imagezoomsl({
        zoomrange:[3,3]
    });
</script>