<!DOCTYPE html>
<html>
<?php include('includes/header.php'); ?>

<body id="page_content">
<?php include('includes/navbar.php'); ?>

<section class="contactUs">
	<div class="container">
		<div class="text-center">
			<h1 class="poppins"><b>Contact Us</b></h1>
			<p>Any question or remarks ? Just write us a message!</p>
		</div>
		<div class="card shadow">
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<div class="card info_card">
							<div class="container text-white mt-3">
								<div>
									<h3 class="poppins">Contact Information</h3>
									<p class="grayText">Say Something to Start a live chat</p>
								</div>
								<div class="mt-5">
									<i class="fa-solid fa-phone-volume mx-4" style="color: #ffffff;"></i>
									<span> +1 763 400 6817</span>
								</div>
								<div class="mt-5">
									<i class="fa-regular fa-envelope mx-4"></i>
									<span>info@eastland-wellness.com</span>
								</div>
								<div class="row mt-5">
									<div class="col-md-2 col-sm-2">
										<i class="fa-solid fa-location-dot mx-4" style="color: #ffffff;"></i>
									</div>
									<div class="col-md-10 col-sm-10">
									<span> Eastland Wellness,<br>
										   525 Main, St #120675,<br>
										   New Brighton, MN 55112-9998 USA.
									</span>
								</div>
								</div>
								<div class="my-4">
									<button class="btn rounded-circle socialIcons"><i class="fa-brands fa-twitter" style="color: #ffffff;"></i></button>
									<button class="btn rounded-circle mx-3 socialIcons"><i class="fa-brands fa-instagram" style="color: #ffffff;"></i></button>
									<button class="btn rounded-circle socialIcons"><i class="fa-brands fa-discord" style="color: #ffffff;"></i></button>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-8">
						<form name="addformpage" id="addformpage"  autocomplete="off" method="post" enctype="multipart/form-data" >
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
								<label>Email</label>
								<input type="email" name="email" id="email" class="form-control">
							</div>
							<div class="col-md-6 mt-4">
								<label>Phone Number</label>
								<input type="text" name="phone" id="phone" class="form-control" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" oninput="this.value = !!this.value &amp;&amp; Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" maxlength="10">
							</div>
							<div class="col-md-12 mt-4">
								<p><b>Select Subject?</b></p>
							<div>
								<input type="radio" name="enq_type" id="general" value="General Enquiry">&nbsp;
								<label class="enq_type" for="general">General Enquiry</label>
								
								<input type="radio" name="enq_type" id="shipping" value="Shipping Issues">&nbsp;
								<label class="enq_type" for="shipping">Shipping Issues</label>
								
								<input type="radio" name="enq_type" id="pro_issue" value="Product Issues">&nbsp;
								<label class="enq_type" for="pro_issue">Product Issues</label>
								
								<input type="radio" name="enq_type" id="techinal" value="Technical Issues">&nbsp;
								<label class="enq_type" for="techinal">Technical Issues</label>
							</div>
								
							</div>
							<label class="error"></label>

							<div class="col-md-12 mt-4">
								<label>Message</label>
								<input type="text" name="message" id="message" class="form-control" placeholder="Write Your Message">
							</div>
							<div class="col-md-12 mt-3">
								<button class="btn theme-bg text-white px-4 sendMsg btn-outline-secondary" 
								type="submit">Send Message</button>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php include('includes/footer.php'); ?>

<!-- Using Google's CDN -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<!-- Using Cloudflare's CDN -->


</body>
<script type="text/javascript" src="js/contact.js"></script>
</html>


