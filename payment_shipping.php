<!DOCTYPE html>
<html>
<?php include('includes/header.php'); ?>
<body id="page_content">
<?php include('includes/navbar.php'); ?>

<section class="shippingType">
	<div class="container">
		<div class="card shadow row bg-white">

			<div class="row mt-4">
				<div class="col-md-12">
					<div class="container">
						<button class="btn inactive rounded-circle mx-2 btn-outline-secondary" onclick="location.href='payment_address'">1</button>
						<span>Address --------</span>
						<button class="btn rounded-circle mx-2 theme-bg btn-outline-secondary text-white" onclick="location.href='payment_shipping'">2</button>
						<span class="theme-color">Shipping --------</span>
						<button class="btn rounded-circle mx-2 inactive" onclick="location.href='payment_card'">3</button>
						<span>Payment --------</span>
						<button class="btn rounded-circle mx-2 inactive" onclick="location.href='payment_review'">4</button>
						<span>Review</span>
					</div>
				</div>
			</div>

			<div class="row mt-4">
				<div class="col-md-7">
					<h4>Shipping</h4>
					<div class="row mt-3">
						<div class="col-md-1 m-auto">
							<input type="radio" name="method" id="standard">
						</div>
						<div class="col-md-9">
							<h5>Standard</h5>
							<small>Delivery Friday, January 13</small>
						</div>
						<div class="col-md-2 m-auto">
							<p>Free</p>
						</div>
					</div>
					<hr>
					<div class="row mt-3">
						<div class="col-md-1 m-auto">
							<input type="radio" name="method" id="express">
						</div>
						<div class="col-md-9">
							<h5>Express</h5>
							<small>Delivered Tomorrow</small>
						</div>
						<div class="col-md-2 m-auto">
							<p>$ 12.87</p>
						</div>
					</div>
					<hr>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-4">
					<h4>Order Summary</h4>
					<hr>
					<span>2 Items</span>
					<hr>
					<div class="row">
						<div class="col-md-4">
							<img src="assets/img/1.png" width="100%">
						</div>
						<div class="col-md-8">
							<small>Organic Kids Multivitamin Gummy</small><br>
							<small>Brand: Aladdin</small>
							<div class="rating-stars">
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
							</div>
							<p><b>$ 39.99</b></p>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-4">
							<img src="assets/img/1.png" width="100%">
						</div>
						<div class="col-md-8">
							<small>DHEA 50mg -Beauty etc.</small><br>
							<small>Brand: Aladdin</small>
							<div class="rating-stars">
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
								<i class="fa-solid fa-star" style="color:#ffd814;"></i>
							</div>
							<p><b>$ 39.99</b></p>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<h6><b>SUBTOTAL</b></h6>
						</div>
						<div class="col-md-6">
							<p class="subtotal">$ 89.99</p>
						</div>
						<div class="col-md-6">
							<h6><b>Shipping</b></h6>
						</div>
						<div class="col-md-6">
							<p class="shippingTax">$ 12.87</p>
						</div>
						<div class="col-md-6">
							<h6><b>Order Total</b></h6>
						</div>
						<div class="col-md-6">
							<p class="theme-color grandTotal">$ 102.86</p>
						</div>
					</div>
					<div>
						<button class="btn theme-bg text-white form-control btn-outline-secondary" onclick="location.href='payment_card'">Continue</button>
					</div>
					<div class="mt-4">
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
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

<?php include('includes/footer.php'); ?>
</body>
</html>