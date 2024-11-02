<!DOCTYPE html>
<html>
<?php include('includes/header.php'); 
		include('includes/functions.php');
// if (!$_SESSION['orderID'] && !$_SESSION['cartID']){
if (!$_SESSION['orderID']){
	header("location:products?cat=all");
}
$hidQuant = $_REQUEST['Quant'];
$ProId = $_REQUEST['ProId'];
// Getting products from the cart 
$action = isset($_GET['action']) ? $_GET['action'] : '';

// if ($_SESSION['UserID'] == 0) 
// { 
   $selProdoct = "select p.prod_name,p.vat_rate,p.price,p.product_image,c.* from cart as c left join products as p on p.id =c.item_id where c.cart_id = '".$_SESSION['cartID']."' AND c.status = 1 order by c.id desc";
  $resProduct = $crud->getData($selProdoct);

  $prodsCount = count($resProduct);
// }
// else
// { 
//    $selProdoct = "SELECT p.prod_name,p.price,p.vat_rate,p.product_image,c.* FROM cart as c left join products as p on p.id = c.item_id where c.user_id = '".$_SESSION['UserID']."' AND c.status = 1 order by c.id desc";
//   $resProduct = $crud->getData($selProdoct);

//   $prodsCount = count($resProduct);
// }

   $sel_items = "select count(cart_id) as cunt_item from cart where cart_id ='".$_SESSION['cartID']."' order by id desc";

   $res_items = $crud->getData($sel_items);

  $selOrderAdd = "SELECT * FROM `orders` as od left join billing_address as bd on od.billing_id = bd.id where od.order_id ='".$_SESSION['orderID']."'";

   $resOrderAdd = $crud->getData($selOrderAdd);

   $SelShipping = "select * from shipping order by id asc";
   $ResShipping = $crud->getData($SelShipping);

?>
<body id="page_content">
<?php include('includes/navbar.php'); ?>
<!-- starts chekout form form the Buynow  -->
<?php if ($action === 'buynow') { ?>
<section id="detailsReview">
	<div class="container">
		<div class="card shadow row bg-white pb-5">
			<div class="row mt-4">
				<div class="col-md-12">
					<div class="container">
						<button class="btn rounded-circle mx-2 inactive" onclick="location.href='payment_address?action=<?php echo $action; ?>'">1</button>
						<span>Shipping Details --------</span>
						<!-- <button class="btn rounded-circle mx-2 inactive" onclick="location.href='payment_shipping'">2</button>
						<span>Shipping --------</span>
						<button class="btn rounded-circle mx-2 inactive" onclick="location.href='payment_card'">3</button>
						<span>Payment --------</span> -->
						<button class="btn theme-bg rounded-circle mx-2 btn-outline-secondary text-white" onclick="location.href='payment_review?action=<?php echo $action; ?>'">2</button>
						<span class="theme-color">Confirmation</span>
					</div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-md-7">
					<div class="container">
					<h4>Payment Information</h4>
					<hr>
					<div class="row mt-3 buyerInfo">
						<div class="col-md-6">
							<h5 class="montserrat">Shipping Address :</h5>
							<p>
								<?php echo $resOrderAdd[0]['first_name'] ?><br>
								<?php echo $resOrderAdd[0]['address'] ?><br>
								<?php echo $resOrderAdd[0]['city'] ?><br>
								<?php echo $resOrderAdd[0]['state'] ?><br>
								<?php echo $resOrderAdd[0]['zip_code'] ?><br>
								<?php echo $resOrderAdd[0]['ph_number'] ?><br>
							</p>
							<!-- <a href="payment_address?action=<?php echo $action; ?>"><b>Edit</b></a> -->
						</div>
						<div class="col-md-6">
							<div class="row">
								<h5 class="montserrat">Shipping Type :</h5>
								<p><?php echo  ucfirst($resOrderAdd[0]['shipping_type']) ;?> Shipping</p>
								<!-- <a href="payment_address?action=<?php echo $action; ?>"><b>Edit</b></a> -->
							</div>
							<div class="row">
								<h5 class="montserrat">Payment Method :</h5>
								<p>
									<img src="assets/img/<?php echo $resOrderAdd[0]['payment_type']; ?>.png" height="128">
									<!-- <?php echo $resOrderAdd[0]['payment_type']; ?> -->
								</p>
								<!-- <a href="payment_address?action=<?php echo $action; ?>"><b>Edit</b></a> -->
							</div>
						</div> 
					</div>
				</div>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-4">
					<h4>Order Summary</h4>
					<hr>
					<span> 1 Item</span>
					<hr>
					<?php 
					 $resProduct[0]['product_image'] = str_replace('../', '', $resProduct[0]['product_image']);
                      $image = 'http://eastland-wellness.com/EadminWellLand/' . $resProduct[0]['product_image'];
                      $unitPrice = product($resProduct[0]['price'], $resProduct[0]['vat_rate']);
                      $totalPrice = $unitPrice * $resProduct[0]['quantity'];
                      $subtotal += $totalPrice;
					?>
					<div class="row">
						<div class="col-md-4">
							<img src="<?php echo $image; ?>" width="100%">
						</div>
						<div class="col-md-8">
							<small><?php echo$resProduct[0]['prod_name'];?></small><br>
							<small>Product Code:<?php echo $resProduct[0]['prod_code'];?></small><br>
							<small>Quantity:<?php echo $resProduct[0]['quantity']?></small>
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
					<hr>
					<div class="row">
						<div class="col-md-6">
							<h6><b>Subtotal</b></h6>
						</div>
						<div class="col-md-6">
							<p id="subtotal" class="subtotal">$ <?php echo $resOrderAdd[0]['total_amount']; ?></p>
							
						</div>
						<div class="col-md-6">
							<h6><b>Shipping</b></h6>
						</div>
						<div class="col-md-6">
							<p class="shippingTax"><?php 
								if ($resOrderAdd[0]['shipping_amount'] == 0){
									echo "Free";
								}else{
									echo "$".$resOrderAdd[0]['shipping_amount'];
								}
							?></p>
						</div>  
						<div class="col-md-6">
							<h6><b>Order Total</b></h6>
						</div>
						<div class="col-md-6">
							<?php 
                                $orderTotal = $resOrderAdd[0]['total_amount'] + $resOrderAdd[0]['shipping_amount'];
							 ?>
							<p class="theme-color grandTotal" id="grandTotal">$ <?php echo number_format($orderTotal, 2); ?></p>
						</div>
					</div>
					<div>
						<?php if ($_SESSION['user_type'] == 'Credited'){ ?>
						<button class="btn theme-bg btn-outline-secondary form-control text-white mb-3" onclick="location.href ='thankYou'">Continue To Checkout</button>
						<?php } else { ?>
						<div id="paypal-button-container"></div>
						<?php } ?>
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
		</div>
	</div>
</section>
<?php } ?>
<!--ends Buynow  -->
<!-- starts checkout from the add to cart -->

<?php if ($action === 'checkout') { ?>
<section id="detailsReview">
	<div class="container">
		<div class="card shadow row bg-white pb-5">
            <div class="row mt-4">
				<div class="col-md-12">
					<div class="container">
						<button class="btn rounded-circle mx-2 inactive" onclick="location.href='payment_address?action=<?php echo $action; ?>'">1</button>
						<span>Shipping Details &ensp;--------</span>
						<!-- <button class="btn rounded-circle mx-2 inactive" onclick="location.href='payment_shipping'">2</button>
						<span>Shipping --------</span>
						<button class="btn rounded-circle mx-2 inactive" onclick="location.href='payment_card'">3</button>
						<span>Payment --------</span> -->
						<button class="btn theme-bg rounded-circle mx-2 btn-outline-secondary text-white" onclick="location.href='payment_review?action=<?php echo $action; ?>'">2</button>
						<span class="theme-color">Confirmation</span>
					</div>
				</div>
			</div>
            <div class="row mt-4">
				<div class="col-md-7">
					<div class="container">
					<h4>Payment Information</h4>
					<hr>
					<div class="row mt-3 buyerInfo">
						<div class="col-md-6">
							<h5 class="montserrat">Shipping Address :</h5>
							<p>
								<?php echo $resOrderAdd[0]['first_name']." ".$resOrderAdd[0]['last_name'] ?><br>
								<?php echo $resOrderAdd[0]['address']."," ?><br>
								<?php echo $resOrderAdd[0]['city']."," ?><br>
								<?php echo $resOrderAdd[0]['state']."," ?><br>
								<?php echo $resOrderAdd[0]['zip_code']."." ?><br>
								<?php echo $resOrderAdd[0]['ph_number'] ?><br>
							</p>
							<!-- <a href="payment_address?action=<?php echo $action; ?>"><b>Edit</b></a> -->
						</div>
						<div class="col-md-6">
							<div class="row">
							<h5 class="montserrat">Shipping Type :</h5>
							<p><?php echo ucfirst($resOrderAdd[0]['shipping_type']) ;?> Shipping</p>
							<!-- <a href="payment_address?action=<?php echo $action; ?>"><b>Edit</b></a> -->
							</div>
							<div class="row">
								<h5 class="montserrat">Payment Method :</h5>
							<p>
								<img src="assets/img/<?php echo $resOrderAdd[0]['payment_type']; ?>.png" width="128" height="128">
								<!-- <?php echo $resOrderAdd[0]['payment_type']; ?> -->
							</p>
							<!-- <a href="payment_address?action=<?php echo $action; ?>"><b>Edit</b></a> -->
							</div>
						</div>
						
					</div>
				</div>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-4">
					<h4>Order Summary</h4>
					<hr>
					<span><?php echo $prodsCount;?> Items</span>
					<hr>
					<?php foreach ($resProduct as $key => $value) { 
                      $value['product_image'] = str_replace('../', '', $value['product_image']);
                      $image = 'http://eastland-wellness.com/EadminWellLand/' . $value['product_image'];
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
							<small>Product Code: <?php echo $value['prod_code'];?></small><br>
							<small>Quantity: <?php echo $value['quantity'];?></small>
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
							<h6><b>Subtotal</b></h6>
						</div>
						<div class="col-md-6">
							<p class="subtotal">$ <?php echo $resOrderAdd[0]['total_amount']; ?></p>
						</div>
						<div class="col-md-6">
							<h6><b>Shipping</b></h6>
						</div>
						<div class="col-md-6">
							<p class="shippingTax">
								<?php if($resOrderAdd[0]['shipping_amount'] != 0){echo "$";} ?>
								<?php 
								if ($resOrderAdd[0]['shipping_amount'] == 0){
									echo "Free";
								}else{
									echo $resOrderAdd[0]['shipping_amount'];
								}
?></p>
						</div> 
						<div class="col-md-6">
							<h6><b>Order Total</b></h6>
						</div>
						<div class="col-md-6">
							<?php 
                   // $orderTotal = $resOrderAdd[0]['total_amount'] + $resOrderAdd[0]['shipping_amount'];
						  $orderTotal = $resOrderAdd[0]['total_amount'] + $resOrderAdd[0]['shipping_amount'];

							 ?>
							<p class="theme-color grandTotal" id="grandTotal">$ <?php echo $orderTotal; ?></p>
						</div>
					</div>
					<div>
						<?php if ($_SESSION['user_type'] == 'Credited'){ ?>
						<button class="btn theme-bg btn-outline-secondary form-control text-white mb-3" onclick="location.href ='thankYou'">Continue To Checkout</button>
						<?php } else { ?>
						<div id="paypal-button-container"></div>
						<?php } ?>
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
		</div>
	</div>
</section>
<?php } ?>
<!-- ends checkout -->
<?php include('includes/footer.php'); ?>
<script src="https://www.paypal.com/sdk/js?client-id=AbWoU11HJU2KVLII9kF6gDTnxFSKdd0eMvWuocmrYtBLwD8pUQsOl8weguZkegU-cO8XkfwfRGl7Ba_R&disable-funding=credit,card"></script>
<script type="text/javascript">
 paypal.Buttons({

    createOrder(data, actions) {
    	// document.getElementById('spinner').style.display = 'block';
    	return actions.order.create({
    		purchase_units: [{
    			amount: {
    			 value: '<?php echo $orderTotal; ?>'
    				//value: '7'
    			}
    		}]
    	});
    },

    onApprove(data, actions){
    	return actions.order.capture().then(function(orderData) {
    		console.log('capture result', orderData, JSON.stringify(orderData, null, 2));
    		const transactionId = orderData.purchase_units[0].payments.captures[0].id;
    		const transTime = orderData.purchase_units[0].payments.captures[0].create_time;
				let transDate = transTime.substr(0, 10);
    		const transStatus = orderData.status;

    		// document.getElementById('spinner').style.display = 'none';

    		location.href = `thankYou?tId=${transactionId}&date=${transDate}&stus=${transStatus}`;
    	})
    }
  }).render("#paypal-button-container");
</script>
</body>
</html>