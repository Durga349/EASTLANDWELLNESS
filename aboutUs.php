<!DOCTYPE html>
<html>
<?php include('includes/header.php'); 
$contactDetailsQry = "SELECT * FROM about_content ORDER BY id ASC";
$contactDetails = $crud->getData($contactDetailsQry);
// print_r($contactDetails);

?>
<body id="page_content" class="aboutUs">
<?php include('includes/navbar.php'); ?>

<section class="hero">
	<div class="container-fluid mt-5 pt-5 aboutUsBanner">
		<div class="text-center mt-5">
		<h1 class="pt-5 bannerTitle poppins">About Eastland Wellness</h1>
		<h3 class="mt-4 poppins">Quality You Can Trust</h3>
		</div>
	</div>

	<div class="section-title mt-5">
      <h2><?php echo $contactDetails[0]['title']; ?></h2>
    </div>
	<div class="container">
		<div class="row">
			<div class="col-md-7 pt-2 ourStoryInfo">
				<?php echo $contactDetails[0]['description']; ?>
			</div>
			<div class="col-md-5" align="center">
				<img src="http://eastland-wellness.com/EadminWellLand/<?php echo str_replace('../', '', $contactDetails[0]['image']); ?>" width="100%" class="img-set">
			</div>
		</div>
	</div>
</section>

<section class="section-bg">
	<div class="section-title">
      <h2>Our Commitment</h2>
    </div>
    <div class="container">
    	<p style="text-align: center; font-size: 20px;" class="poppins">
    		We are committed to our products and your well-being. As part of our mission, we strive to provide the best products for sustaining a healthy lifestyle by using the highest quality  ingredients that meet regulatory requirements.     
    	</p>
    </div>
</section>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-6" align="center">
				<img src="http://eastland-wellness.com/EadminWellLand/<?php echo str_replace('../', '', $contactDetails[1]['image']); ?>" width="100%" class="img-set">
			</div>
			<div class="col-md-6">
				<h2 class="theme-color"><?php echo $contactDetails[1]['title']; ?></h2>
				<?php echo $contactDetails[1]['description']; ?>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-md-6">
				<h2 class="theme-color mt-3"><?php echo $contactDetails[2]['title']; ?></h2>
				<?php echo $contactDetails[2]['description']; ?>
			</div>
			<div class="col-md-6" align="center">
				<img src="http://eastland-wellness.com/EadminWellLand/<?php echo str_replace('../', '', $contactDetails[2]['image']); ?>" width="100%" class="img-set">
			</div>
		</div>
	</div>
</section>

<section class="section-bg halalSection">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<h3 class="theme-color pt-3"><?php echo $contactDetails[3]['title']; ?></h3>
			</div>
			<div class="col-md-2">
				<img src="http://eastland-wellness.com/EadminWellLand/<?php echo str_replace('../', '', $contactDetails[3]['image']); ?>" height="100" style="margin-top: -15px;">
			</div>
		</div>
		<div class="row">
			<?php echo $contactDetails[3]['description']; ?>
		</div>
	</div>
</section>
<?php include('includes/footer.php'); ?>
</body>
</html>