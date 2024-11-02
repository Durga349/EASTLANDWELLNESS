<!DOCTYPE html>
<html>
<?php include('includes/header.php'); 
		include('includes/functions.php');
// if (!$_SESSION['cartID']){
// 	header("location:products.php?cat=all");
// }
// print_r($_SESSION);
// exit;
$ProId = $_REQUEST['ProId'];

// getting the cart instered data through actions
$action = isset($_GET['action']) ? $_GET['action'] : '';

// if ($_SESSION['UserID'] == 0) 
// { 
   $selProdoct = "select p.prod_name,p.price,p.vat_rate,p.product_image,c.* from cart as c left join products as p on p.id =c.item_id where c.cart_id = '".$_SESSION['cartID']."' AND c.status = 1 order by c.id desc";
  $resProduct = $crud->getData($selProdoct);

  $prodsCount = count($resProduct);
// }
// else
// { 
//    $selProdoct = "SELECT p.prod_name,p.price,p.vat_rate,p.product_image,c.* FROM cart as c left join products as p on p.id = c.item_id where c.user_id = '".$_SESSION['UserID']."' AND c.status = 1 order by c.id desc";
//   $resProduct = $crud->getData($selProdoct);
//   $prodsCount = count($resProduct);
// }

 $SelShipping = "select * from shipping order by id asc";
 $ResShipping = $crud->getData($SelShipping);

$selFSC = "SELECT * FROM shop_settings WHERE meta_key = 'free_shipping_charges'";
$FSCdata = $crud->getData($selFSC);

foreach ($resProduct as $row){
    $singlePrice = product($row['price'], $row['vat_rate']);
    $bulkPrice = $singlePrice * $row['quantity'];
    $Total += $bulkPrice;

  }

  $SelUserData = "SELECT * from customers where id ='".$_SESSION['UserID']."'order by id desc";
  $ResUserData =$crud->getData($SelUserData);
  // exit;

?>
<body id="page_content">
<?php include('includes/navbar.php'); ?>

	
<?php if ($action === 'buynow') { ?>
<section class="delAddress">
	<div class="container">
		<div class="card shadow row bg-white">
      <div class="row mt-4">
				<div class="col-md-12">
					<div class="container">
						<button class="btn theme-bg rounded-circle mx-2 btn-outline-secondary text-white" onclick="location.href='payment_address?action=<?php echo $action; ?>'">1</button>
					 	<p id="action" style="display: none;"><?php echo $action; ?></p>
						<p id="ProId" style="display: none;"><?php echo $ProId; ?></p>
						<span class="theme-color">Shipping Details --------</span>
						<!-- <button class="btn rounded-circle mx-2 inactive" onclick="location.href='payment_shipping'">2</button>
						<span>Shipping --------</span>
						<button class="btn rounded-circle mx-2 inactive" onclick="location.href='payment_card'">3</button>
						<span>Payment --------</span> -->
						<button class="btn rounded-circle mx-2 inactive" onclick="location.href='payment_review?action=<?php echo $action; ?>'">2</button>
						<span>Confirmation</span>
					</div>
				</div>
			</div>
			<form name="addressForm" id="addressForm" method="post" autocomplete="off" enctype="multipart/form-data">
			<div class="row mt-4">
				<div class="col-md-7">
					<h4>Address</h4>
					<div class="row mt-3">
						<div class="col-md-12">
							<label>Email Address</label>
							<input type="email" name="email" id="email" class="form-control" value="<?php echo $ResUserData[0]['email']; ?>">
						</div>
            <div class="col-md-6 mt-3">
							<label>First Name</label>
							<input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $ResUserData[0]['first_name']; ?>">
						</div>
						<div class="col-md-6 mt-3">
							<label>Last Name</label>
							<input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $ResUserData[0]['last_name']; ?>">
						</div>
						<div class="col-md-6 mt-3">
							<label>Phone Number</label>
							<input type="text" name="ph_number" id="ph_number" class="form-control" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" oninput="this.value = !!this.value &amp;&amp; Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" maxlength="10" value="<?php echo $ResUserData[0]['phone_number']; ?>">
						</div>
					</div>
					<div class="row mt-3">
              <h4>Shipping Address</h4>
						<div class="col-md-12 mt-3">
							<label>Address</label>
							<input type="text" name="address" id="address" class="form-control">
						</div>
						<div class="col-md-6 mt-3">
							<label>City</label>
							<input type="text" name="city" id="city" class="form-control">
						</div>
						<div class="col-md-6 mt-3">
							<label>State</label>
							<input type="text" name="state" id="state" class="form-control">
						</div>
						<div class="col-md-6 mt-3">
							<label>Zip Code</label>
							<input type="text" name="zip_code" id="zip_code" class="form-control">
						</div>
						<div class="col-md-6 mt-3"></div>
					</div>
				  <div class="row my-4">
					 <h4>Shipping</h4>
					  <div class="col-md-12 mt-3">
						 	<div class="container">
						 	<div class="row">
						 		<div class="col-6">
						 			<input type="radio" name="shipping_type" id="standard" value="standard" >&ensp;<label for="standard">Standard</label>
						 		</div>
						 		<div class="col-6">
						 			<span style="font-weight: bold;" id="shipping_amount">Free</span>
						 		</div>
						 	</div>
						 	</div>
					  </div>
					<div class="col-md-12 mt-3">
					 	<div class="container">
					 		<div class="row">
					 		  <div class="col-6">
									 <input type="radio" name="shipping_type" id="express" value="express">&ensp;
								 	<label for="express">Express</label>
					 	    </div>
					 		  <div class="col-6">
					 				<?php if($FSCdata[0]['meta_value'] > product($resProduct[0]['price'], $resProduct[0]['vat_rate'])* $resProduct[0]['quantity']){echo "$";}?>
					 			<span style="font-weight: bold;" id="shipping_amount1">
					 				<?php if($FSCdata[0]['meta_value'] <= product($resProduct[0]['price'], $resProduct[0]['vat_rate'])* $resProduct[0]['quantity']){echo"Free";}else{
					 					echo $ResShipping[1]['shipping_amount'];
					 				} ?>
					 				</span>
					 		  </div>
					    </div>
				    </div>
				  </div>
			    </div>
			    <div class="row my-4">
					  <h4>Payment</h4>
					  <div class="col-md-12 mt-3">
					 	<div class="container">
					 	<div class="row">
					 		<div class="col-6">
					 		  <input type="radio" name="payment_type" id="paypal" value="paypal" checked>
					 		  <label for="paypal">
					 				<img src="assets/img/paypal.png" width="128" height="128">
					 			</label>
					 		</div>
					 		<div class="col-6">
					 			<input type="radio" name="payment_type" id="Zelle" value="Zelle">
					 			<label for="Zelle">
					 			<img src="assets/img/Zelle.png"  height="128">
					 			</label>
					 		</div>
					 	</div>
					 	</div>
					  </div>
			    </div>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-4">
					<h4>Order Summary</h4>
					<hr>
					<span><span class="singleCount">1 </span>Item</span>
					<hr>
					<?php 
                 // foreach ($resProduct as $key => $value) {
                
                  $resProduct[0]['product_image'] = str_replace('../', '', $resProduct[0]['product_image']);
                  $image = 'https://eastland-wellness.com/EadminWellLand/' . $resProduct[0]['product_image'];

                  $unitPrice = product($resProduct[0]['price'], $resProduct[0]['vat_rate']);

                  $totalPrice = $unitPrice * $resProduct[0]['quantity'];
                  $subtotal = $totalPrice;
						?>
					<div class="row">
						<div class="col-md-4">
							<img src="<?php echo $image; ?>" width="100%">
						</div>
						<div class="col-md-8">
							<small><?php echo $resProduct[0]['prod_name'];?></small><br>
							<small>Product Code:<?php echo $resProduct[0]['prod_code'];?></small><br>
							<small>Quantity:<?php echo $resProduct[0]['quantity']; ?></small>
							<div class="rating-stars">
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
							</div>
							<p><b> <p id="productPrice">$<?php echo $totalPrice;?></p></b></p>
						</div>
					</div>
				
				<?php //} ?>

					<hr>
					<div class="row">
						<div class="col-md-6">
							<h6><b>SUBTOTAL</b></h6>
						</div>
						<div class="col-md-6">
							<p class="subtotal">$ <span id="subtotal"><?php echo number_format($subtotal, 2); ?></span></p>
						</div>
						<div class="col-md-6">
							<h6><b>Order Total</b></h6>
						</div>
						<div class="col-md-6">
							<p class="theme-color grandTotal" id="grandTotal">$ <?php echo number_format($subtotal, 2); ?></p>
						</div>
					</div>
					<div>
						<button class="btn theme-bg btn-outline-secondary form-control text-white">Continue To Checkout</button>
					</div>
				<!-- 	<div class="mt-4">
						<p class="returnPolicy">
							<a href="#" class="text-dark">
								<b>RETURN POLICY</b>
							</a>
						</p>
						<p class="help">
							<a href="#" class="text-dark">
								<b>HELP</b>
							</a>
						</p>
					</div> -->
				</div>
			</div>
			</form>
		</div>
	</div>
</section>
<!-- end of Buynow form -->
<!-- Starts checkout form from Add to cart- -->
<?php } else if ($action == 'checkout') { ?>
<section class="delAddress">
	<div class="container">
		<div class="card shadow row bg-white">
			<div class="row mt-4">
				<div class="col-md-12">
					<div class="container">
						<button class="btn theme-bg rounded-circle mx-2 btn-outline-secondary text-white" onclick="location.href='payment_address?action=<?php echo $action; ?>'">1</button>
						<p id="action" style="display: none;"><?php echo $action; ?></p>
						<p id="ProId" style="display: none;"><?php echo $ProId; ?></p>
						<span class="theme-color">Shipping Details  --------</span>
						<!-- <button class="btn rounded-circle mx-2 inactive" onclick="location.href='payment_shipping'">2</button>
						<span>Shipping --------</span>
						<button class="btn rounded-circle mx-2 inactive" onclick="location.href='payment_card'">3</button>
						<span>Payment --------</span> -->
						<button class="btn rounded-circle mx-2 inactive" onclick="location.href='payment_review?action=<?php echo $action; ?>'">2</button>
						<span>Confirmation</span>
					</div>
				</div>
			</div>
			<form name="addressForm" id="addressForm" method="post" autocomplete="off" enctype="multipart/form-data">
			<div class="row mt-4">
				<div class="col-md-7">
					<div class="container">
					<h4>Address</h4>
					<div class="row mt-3">
						<div class="col-md-12">
							<label>Email Address</label>
							<input type="email" name="email" id="email" class="form-control" value="<?php echo $ResUserData[0]['email']; ?>">
						</div>
						<div class="col-md-6 mt-3">
							<label>First Name</label>
							<input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $ResUserData[0]['first_name']; ?>">
						</div>
						<div class="col-md-6 mt-3">
							<label>Last Name</label>
							<input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $ResUserData[0]['last_name']; ?>">
						</div>
						<div class="col-md-6 mt-3">
							<label>Phone Number</label>
							<input type="text" name="ph_number" id="ph_number" class="form-control" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" oninput="this.value = !!this.value &amp;&amp; Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" maxlength="10" value="<?php echo $ResUserData[0]['phone_number']; ?>">
						</div>
					</div>
					<div class="row mt-3">
              <h4>Shipping Address</h4>
						<div class="col-md-12 mt-3">
							<label>Address</label>
							<input type="text" name="address" id="address" class="form-control">
						</div>
						<div class="col-md-6 mt-3">
							<label>City</label>
							<input type="text" name="city" id="city" class="form-control">
						</div>
						<div class="col-md-6 mt-3">
							<label>State</label>
							<input type="text" name="state" id="state" class="form-control">
						</div>
						<div class="col-md-6 mt-3">
							<label>Zip Code</label>
							<input type="text" name="zip_code" id="zip_code" class="form-control">
						</div>
						<div class="col-md-6 mt-3"></div>
					</div>
					<div class="row my-4">
					<h4>Shipping</h4>
					 <div class="col-md-12 mt-3">
					 	<div class="container">
					 	<div class="row">
					 		<div class="col-6">
					 			<input type="radio" name="shipping_type" id="standard" value="standard">&ensp;<label for="standard">Standard</label>
					 		</div>
					 		<div class="col-6">
					 			<span style="font-weight: bold;" id="shipping_amount2">Free</span>
					 		</div>
					 	</div>
					 	</div>
					 </div>
				  <div class="col-md-12 mt-3">
					 	<div class="container">
					 		<div class="row">
					 		<div class="col-6">
							 	<input type="radio" name="shipping_type" id="express" value="express">&ensp;
							 	<label for="express">Express</label>
							 	<label class="error"></label>
					 	  </div>
					 		<div class="col-6">
					 			<?php if($FSCdata[0]['meta_value'] > $Total){echo "$";}?>
					 			<span style="font-weight: bold;" id="shipping_amount3">
					 				<?php if($FSCdata[0]['meta_value'] <= $Total){echo"Free";}else{
					 					echo $ResShipping[1]['shipping_amount'];
					 				} ?>
					 		</div>
					    </div>
				    </div>
				  </div>
			  </div>
			  <div class="row my-4">
					<h4>Payment</h4>
					 <div class="col-md-12 mt-3">
					 	<div class="container">
					 	<div class="row">
					 		<div class="col-6">
					 		<input type="radio" name="payment_type" id="paypal" value="paypal" checked>
					 		<label for="paypal">
					 			<img src="assets/img/paypal.png" width="128" height="128">
					 		</label>
					 		</div>
					 		<!-- <div class="col-6">
					 			<input type="radio" name="payment_type" id="Zelle" value="Zelle">
					 			<label for="Zelle">
					 			<img src="assets/img/Zelle.png"  height="128">
					 			</label>
					 		</div> -->
					 	</div>
					 	</div>
					 </div>
			  </div>
			</div>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-4">
					<h4>Order Summary</h4>
					<hr>
					<span><span class="singleCount"><?php echo $prodsCount; ?></span> Items</span>
					<hr>
					<?php foreach ($resProduct as $key => $value) { 
                      $value['product_image'] = str_replace('../', '', $value['product_image']);
                      $image = 'https://eastland-wellness.com/EadminWellLand/' . $value['product_image'];
                       $unitPrice = product($value['price'], $value['vat_rate']);
                       $totalPrice = $unitPrice * $value['quantity'];
                       $subtotal += $totalPrice;
						?>
					<div class="row">
						<div class="col-md-4">
							<img src="<?php echo $image; ?>" width="100%">
						</div>
						<div class="col-md-8">
							<small><?php echo $value['prod_name'];?></small><br>
							<small>Product Code:<?php echo $value['prod_code'];?></small><br>
							<small>Quantity:<?php echo $value['quantity'];?></small>
							<div class="rating-stars">
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
							</div>
							 <p><b>$<?php echo $totalPrice;?></b></p>
						</div>
					</div>
				<?php } ?>
			
					<hr>
					<div class="row">
						<div class="col-md-6">
							<h6><b>SUBTOTAL</b></h6>
						</div>
						<div class="col-md-6">
							<p class="subtotal">$ <span id="subtotal"><?php echo number_format($subtotal, 2); ?></span></p>
						</div>
						<div class="col-md-6">
							<h6><b>Order Total</b></h6>
						</div>
						<div class="col-md-6">
							<p class="theme-color grandTotal" id="grandTotal">$ <?php echo number_format($subtotal + $tax, 2); ?></p>
						</div>
					</div>
					<div>
						<button class="btn theme-bg btn-outline-secondary form-control text-white">Continue To Checkout</button>
					</div>
				<!-- 	<div class="mt-4">
						<p class="returnPolicy">
							<a href="#" class="text-dark">
								<b>RETURN POLICY</b>
							</a>
						</p>
						<p class="help">
							<a href="#" class="text-dark">
								<b>HELP</b>
							</a>
						</p>
					</div> -->
				</div>
			</div>
			</form>
		</div>
	</div>
</section>
<?php } ?>
<!-- ending of checkout -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php include('includes/footer.php'); ?>
</body>
<script type="text/javascript" src="js/payment_billing_address.js"></script>
</html>