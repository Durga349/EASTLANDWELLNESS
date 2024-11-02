<!DOCTYPE html>
<html>
<?php include('includes/header.php'); ?>
<body id="page_content">
<?php include('includes/navbar.php'); ?>

<section id="cardDetails">
	<div class="container">
		<div class="card shadow row bg-white pb-5">

			<div class="row mt-4">
				<div class="col-md-12">
					<div class="container">
						<button class="btn rounded-circle mx-2 inactive" onclick="location.href='payment_address'">1</button>
						<span>Address --------</span>
						<button class="btn rounded-circle mx-2 inactive" onclick="location.href='payment_shipping'">2</button>
						<span>Shipping --------</span>
						<button class="btn rounded-circle mx-2 theme-bg btn-outline-secondary text-white" onclick="location.href='payment_card'">3</button>
						<span class="theme-color">Payment --------</span>
						<button class="btn rounded-circle mx-2 inactive" onclick="location.href='payment_review'">4</button>
						<span>Review</span>
					</div>
				</div>
			</div>

			<div class="row mt-4">
				<div class="col-md-7">
					<h4>Payment Information</h4>

					<div class="row mt-3">
						<div class="col-md-12">
							<label>Card Number</label>
							<input type="text" name="card_no" id="card_no" class="form-control">
						</div>
						<div class="col-md-6 mt-3">
							<label>Card</label>
							<input type="text" name="card" id="card" class="form-control">
						</div>
						<div class="col-md-4 mt-3">
							<label>&nbsp;</label>
							<input type="month" name="expiry" id="expiry" class="form-control">
						</div>
						<div class="col-md-2 mt-3">
							<label>CVV</label>
							<input type="text" name="cvv" id="cvv" class="form-control">
						</div>
					</div>

					<div class="row mt-5">
						<div class="col-md-12">
							<label>Email Address</label>
							<input type="email" name="email" id="email" class="form-control">
						</div>
						<div class="col-md-6 mt-3">
							<label>First Name</label>
							<input type="text" name="fname" id="fname" class="form-control">
						</div>
						<div class="col-md-6 mt-3">
							<label>Last Name</label>
							<input type="text" name="lname" id="lname" class="form-control">
						</div>
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
						<div class="col-md-6 mt-3">
							<label>Phone Number</label>
							<input type="text" name="phone" id="phone" class="form-control">
						</div>
					</div>
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
						<button class="btn theme-bg form-control btn-outline-secondary text-white" onclick="location.href='payment_review'">Continue</button>
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