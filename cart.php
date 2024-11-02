<!DOCTYPE html>
<html>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php include('includes/header.php');
// if ($_SESSION['UserID'] == 0){
 	$sel_prod = "SELECT p.product_image,p.prod_name,p.price,c.*,(SELECT COUNT(*) FROM cart where c.cart_id = ".$_SESSION['cartID'].") AS cart_count
    FROM cart AS c LEFT JOIN products AS p ON p.id = c.item_id where c.cart_id ='".$_SESSION['cartID']."' AND c.status = 1 ORDER BY c.id desc";
// }else{
// 	$sel_prod = "SELECT p.product_image,p.vat_rate, p.prod_name,p.price,c.*,(SELECT COUNT(*) FROM cart where c.user_id = ".$_SESSION['UserID'].") AS cart_count
//     FROM cart AS c LEFT JOIN products AS p ON p.id = c.item_id where c.user_id='".$_SESSION['UserID']."' AND c.status = 1 ORDER BY c.id desc";
// }
$res_prod = $crud->getData($sel_prod);
// exit;
if (count($res_prod) < 1){
	header('location:products?cat=all');
}
?>
<body id="page_content">
<?php include('includes/navbar.php'); ?>
<?php include('includes/functions.php'); ?>

<section id="cartItems">
	<div class="container">
		<h3 class="robo">Cart <small><?php echo $count; ?> Items</small></h3>
		<div>
		<div class="row bg-white mt-4 cartProducts">
		<!-- 	<table>
				
				<tr>
					<th><h5>Items</h5></th>
					<th><h5>Price</h5></th>
					<th><h5>Quantity</h5></th>
					<th><h5>Total</h5></th>
					<th><h5>Remove</h5></th>
				</tr>
			</table> -->
			<div class="row py-4">
				<div class="col-md-4">
					<h5>Items</h5>
				</div>
				<div class="col-md-2 text-center">
					<h5>Price</h5>
				</div>
				<div class="col-md-2 text-center">
					<h5>Quantity</h5>
				</div>
				<div class="col-md-2 text-center">
					<h5>Total</h5>
				</div>
				<div class="col-md-2 text-center">
					<h5>Remove</h5>
				</div>
			</div>
			<hr>
			<div class="row">
				<?php foreach ($res_prod as $key => $value) {
                    $value['product_image'] = str_replace('../', '', $value['product_image']);
                   $image = 'http://eastland-wellness.com/EadminWellLand/' . $value['product_image'];

                       $unitPrice = product($value['price'], $value['vat_rate']);
                       // $unitPrice = round($unitPrice, 2);
                       //$unitPrice = $value['price'];
                       $totalPrice = $unitPrice * $value['quantity'];
                       $subtotal += $totalPrice;
				 ?>
	
				<div class="col-md-4">
					<div class="row">
						
						<div class="col-md-5">
							<img src="<?php echo $image; ?>" width="80%" class="mb-2">
						</div>
						<div class="col-md-7">
							<p class="robo"><?php echo $value['prod_name']; ?></p>
							<small class="robo">Product Code : <?php echo $value['prod_code']; ?></small>
						</div>
					</div>
				</div>
				<div class="col-md-2 text-center m-auto">
                 <p class="robo" id="itemPrice<?php echo $value['id']; ?>">$<?php echo $value['price']; ?></p>
                 <p style="font-size: 13px;">(Including all Taxes)</p>
                </div>

				<div class="col-md-2  text-center m-auto">
				<!-- 	<div class="quantity-box">
                        <div class="input-group">
                            <input type="button" value="-" class="minus" onclick="decreaseQuantity(<?php echo $value['id'];?>,<?php echo $unitPrice; ?>)">
                            <input type="text" name="quantity" id="quantityDisplay<?php echo $value['id']; ?>" class="quantity-number qty form-control bg-transparent" min="1" value="<?php echo $value['quantity']; ?>" style="text-align: center;">
                            <input type="button" value="+" class="plus" onclick="increaseQuantity(<?php echo $value['id'];?>,<?php echo $unitPrice; ?>)">
                        </div>
                    </div> -->
			        <span class="rounded-pill bg-secondary">
			        <span class="text-white" onclick="decreaseQuantity(<?php echo $value['id'];?>,<?php echo $unitPrice; ?>)" style="padding: 1px 7px; font-size: 14px;"><i class="fa fa-minus"></i></span>
			        <span id="quantityDisplay<?php echo $value['id']; ?>" class="bg-white" style="padding: 10px;"><?php echo $value['quantity']; ?></span>
			        <span class="text-white" onclick="increaseQuantity(<?php echo $value['id'];?>,<?php echo $unitPrice; ?>)" style="padding: 1px 7px; font-size: 14px;"><i class="fa fa-plus"></i></span>
			       </span> 
				</div>
				<div class="col-md-2 text-center m-auto">
				    <p class="robo" id="totalDisplay<?php echo $value['id']; ?>">$<?php echo round($totalPrice, 2); ?></p>
				</div>

				<div class="col-md-2 text-center m-auto">
				   <!-- <button class="btn btn-sm theme-bg text-white btn-outline-secondary robo" onclick="UpdateCart(<?php echo $value['id']; ?>)">Update</button> -->
				   <button class="btn btn-sm bg-danger text-white btn-outline-secondary robo" onclick="deleteProduct(<?php echo $value['id']; ?>)">Delete</button>

					
				</div>
			<?php } ?>
				
			</div>
			
		</div>

		<div class="row">
    <div class="col-md-12 mt-3">
        <div class="cartFooter">
            <span class="robo">Total : <span id="cartTotal" class="h5">$0.00</span></span>&ensp;
            <?php if(!$_SESSION['UserID']) { ?>
              <button class="btn theme-bg text-white btn-outline-secondary montserrat" onclick="location.href ='payment_address?action=checkout'" style="letter-spacing: 2px; font-size: 0.8rem;">GUEST CHECKOUT</button>
            <?php }else {?>
              <button class="btn theme-bg text-white btn-outline-secondary montserrat" onclick="location.href ='payment_address?action=checkout'" style="letter-spacing: 2px; font-size: 0.8rem;">CONTINUE TO CHECKOUT</button>
          <?php } ?>
        </div>

    </div>
</div>

	</div>
	</div>

</section>

<?php include('includes/footer.php'); ?>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript" src="js/cart.js"></script>


</html>