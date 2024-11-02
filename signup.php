<!DOCTYPE html>
<html>
<?php include('includes/header.php'); ?>

<body id="page_content">
<?php include('includes/navbar.php'); ?>

<section class="contactUs">
	<div class="container">
		<div class="text-center">
			<h1 class="poppins"><b>Sign Up With Us</b></h1>
		</div>
		<div class="card mt-4">
			<div class="card-body">
				<div class="row">
					<div class="col-md-5">
						<img src="assets/img/Register.jpg" width="100%" height="100%" style="border-radius: 20px;">
					</div>
					<div class="col-md-7 mt-3">
						<div class="row">
							<div class="col-md-6">
								<label>First Name</label>
								<input type="text" name="fname" id="fname" class="form-control">
							</div>
							<div class="col-md-6">
								<label>Last Name</label>
								<input type="text" name="lname" id="lname" class="form-control">
							</div>
							<div class="col-md-6 mt-4">
								<label>Email / Username</label>
								<input type="email" name="email" id="email" class="form-control">
							</div>
							<div class="col-md-6 mt-4">
								<label>Phone Number</label>
								<input type="text" name="phone" id="phone" class="form-control">
							</div>
							
							<div class="col-md-6 mt-4">
								<label>Password</label>
								<input type="password" name="password" id="password" class="form-control">
							</div>
							<div class="col-md-12 mt-3">
								<button class="btn btn-lg theme-bg text-white px-4 sendMsg btn-outline-secondary">Register</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include('includes/footer.php'); ?>

</body>
</html>


