<!DOCTYPE html>
<html>
<?php include('includes/header.php'); ?>
<body id="page_content">
<?php include('includes/navbar.php'); 
$prodId = $_REQUEST['prodId'];
$prodDataQry = "SELECT * from products where id = '".$prodId."'";
$prodData = $crud->getData($prodDataQry);

//$image =$prodData[0]['product_image'];

 $prodData[0]['product_image'] = str_replace('../', '', $prodData[0]['product_image']);
        $image = 'http://eastland-wellness.com/admin/' . $prodData[0]['product_image'];
// print_r($prodData);
// exit;
?>
<section id="product_card">
	<div class="container bg-light pb-5">
		<div class="row">
			<div class="col-md-5">
				<img src="<?php echo $image; ?>" width="100%" class="mt-4">
			</div>
			<div class="col-md-7">
				<?php echo $prodData[0]['prod_description']; ?>
			</div>
				<!-- <p>--------- &ensp;-50%</p>
				<div class="mt-5">
					<p>Quantity <span class="rounded-pill bg-secondary">
						<span class="text-white">&ensp;&ensp;-&ensp;</span>
						<input type="number" name="quantity" value="1" style="width: 10%;">
						<span class="text-white">&ensp;+&ensp;&ensp;</span>
						</span>
					</p>
				</div> -->
				<!-- <div class="row mt-3">
					<div class="col-md-1"></div>
					<div class="col-md-5">
					<input type="button" name="buy_now" id="buy_now" value="Buy Now" class="btn btn-primary form-control" onclick="location.href='payment_address.php'">
					</div>
					<div class="col-md-5">
					<input type="button" name="add_cart" id="add_cart" value="Add To Cart" class="btn btn-warning text-white form-control" onclick="location.href = 'cart.php'">
					</div>
				</div> -->
		</div>
		<div class="container bg-white">
			<div class="row">
				<div class="col-md-4 mt-3">
					<p>Sold By :</p>
					<h2 class="seller">Eastland  Wellness</h2>
				</div>
				<div class="col-md-4 mt-3">
					<h5 class="productServices">Services :</h5>
					<p>- 7 Days Return <br>- Warranty Not Available</p>
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
</section>
<?php include('includes/footer.php'); ?>
</body>
</html>