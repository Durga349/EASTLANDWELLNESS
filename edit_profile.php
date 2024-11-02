<!DOCTYPE html>
<html>
<?php include('includes/header.php'); 

$selProfileData ="select * from customers where id ='".$_SESSION['UserID']."'";
$resProfileData =$crud->getData($selProfileData);

?>

<body id="page_content">
<?php include('includes/navbar.php'); ?>

<section class="contactUs">
	<div class="container">
		<div class="text-center">
			<h3 class="poppins"><b>Edit Profile</b></h3>
		</div>
	
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="card">
					<div class="card-body">
							<form name="addformpage" id="addformpage"  autocomplete="off" method="post" enctype="multipart/form-data" >
						<div class="row">
							<div class="col-md-12 ">
								<label>First Name</label>
								<input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo  $resProfileData[0]['first_name']; ?>">
							</div>
							<div class="col-md-12 mt-4">
								<label>Last Name</label>
								<input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $resProfileData[0]['last_name']; ?>">
							</div>
							<div class="col-md-12  mt-4">
								<label>Email</label>
								<input type="email" name="email" id="email" class="form-control" value="<?php echo $resProfileData[0]['email']; ?>">
							</div>
							<div class="col-md-12  mt-4">
								<label>Phone Number</label>
								<input type="text" name="phone_number" id="phone_number" class="form-control" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" oninput="this.value = !!this.value &amp;&amp; Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" maxlength="10" value="<?php echo $resProfileData[0]['phone_number']; ?>">
							</div>
					
							<div class="col-md-12 mt-3">
								<button class="btn theme-bg text-white px-4 sendMsg btn-outline-secondary" 
								type="submit">Update</button>
								<input type="hidden" name="hid_id" id="hid_id" class="form-control" value="<?php echo $resProfileData[0]['randomId']; ?>">
								<input type="hidden" name="hid_password" id="hid_password" class="form-control" value="<?php echo $resProfileData[0]['password']; ?>">

							</div>
						</div>
						</form>
					</div>
					</div>

				</div>
				<div class="col-md-3"></div>
			</div>
	
	</div>
</section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php include('includes/footer.php'); ?>

</body>
<script type="text/javascript" src="js/edit_profile.js"></script>
</html>


