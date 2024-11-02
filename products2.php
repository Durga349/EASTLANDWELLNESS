<!DOCTYPE html>
<html>
<?php include('includes/header.php'); ?>
<body id="page_content capsules">
<?php include('includes/navbar.php'); ?>
<style>
	.card-img-top {
    height: 288px;
    width: auto;
}
	</style>

<section class="hero">
	<div class="container-fluid mt-5 capsuleBanner">
		<div class="text-center">
		<h1 class="pt-5 bannerTitle">Products</h1>
		<p class="mt-4 bannerCaption">You've come to the right place. We've got a bunch here and you can start buying right now</p>
		<div class="input-group mt-5" align="center">
              <input type="text" class="form-control addonsSearch" placeholder="Enter Keywords" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append theme-bg">
                <button class="btn text-white" type="button"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
              </div>
            </div>
		</div>
	</div>
</section>

<section id="product">
	<div class="container">
		<div class="row aboutProducts pb-4">
				<div class="section-title">
          <h2>Healthy Capsules</h2>
        </div>
			<div class="col-md-7">
				<p>
					We go the extra step to ensure our vitamins and supplements are USP verified when possible, meaning they’ve been tested for purity and potency by the U.S. Pharmacopeia. We work closely with suppliers to select and test ingredients, and our manufacturing procedures follow dietary supplement cGMPs (current Good Manufacturing Practices).
				</p>
				<p>
					Your health is our passion, and we’re all in. We are committed to finding new ways to empower you to live a healthier, richer life from innovative formulas to finding responsibly sustainable partners to supply our ingredients. Our experts routinely track emerging nutrition science to continually source science-backed solutions all of which are Halal-certified.
				</p>
				<p>
					Your health is our passion, and we’re all in. We are committed to finding new ways to empower you to live a healthier, richer life from innovative formulas to finding responsibly sustainable partners to supply our ingredients.
				</p>
			</div>
			<div class="col-md-5">
				<img src="assets/img/product.png" width="100%">
			</div>
		</div>

		<?php if($_REQUEST['cat']=='all'){?>
		<div class="row" id="products1">
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/SUPLEMENTS/1.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg btn-outline-secondary text-white poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/SUPLEMENTS/2.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/SUPLEMENTS/3.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/SUPLEMENTS/4.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/SUPLEMENTS/5.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/SUPLEMENTS/6.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/SUPLEMENTS/7.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/SUPLEMENTS/8.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			
			<div class="col-md-3"></div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/SUPLEMENTS/9.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<!-- <div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/10.jpg" alt="Card image cap">
  					<div class="card-body">
    					<p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p>
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div> -->
		</div>


		<div class="row" id="products2" style="display: none;">
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/11.jpg" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg btn-outline-secondary text-white poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/12.jpg" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/13.jpg" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/14.jpg" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/15.jpg" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/16.jpg" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/17.jpg" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/18.jpg" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			
		</div>
		<?PHP } ?>
		<?php if($_REQUEST['cat']==1){?>
		<div class="row" id="products1">
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/SUPLEMENTS/1.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg btn-outline-secondary text-white poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/SUPLEMENTS/2.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/SUPLEMENTS/3.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/SUPLEMENTS/4.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/SUPLEMENTS/5.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/SUPLEMENTS/6.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/SUPLEMENTS/7.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/SUPLEMENTS/8.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			
			<div class="col-md-3"></div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/SUPLEMENTS/9.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<!-- <div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/10.jpg" alt="Card image cap">
  					<div class="card-body">
    					<p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p>
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div> -->
		</div>


		<div class="row" id="products2" style="display: none;">
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/11.jpg" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg btn-outline-secondary text-white poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/12.jpg" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/13.jpg" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/14.jpg" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/15.jpg" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/16.jpg" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/17.jpg" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/18.jpg" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			
		</div>
		<?PHP } ?>

		<?php if($_REQUEST['cat']==2){?>
		<div class="row" id="products1">
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/BEAUTY/1.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg btn-outline-secondary text-white poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/BEAUTY/2.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/BEAUTY/3.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			
		</div>
		<?PHP } ?>

		<?php if($_REQUEST['cat']==3){?>
		<div class="row" id="products1">
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/vitamins/1.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg btn-outline-secondary text-white poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			<div class="col-md-3 p-4">
				<div class="card">
  					<img class="card-img-top" src="assets/img/products/vitamins/2.png" alt="Card image cap">
  					<div class="card-body">
    					<!-- <p class="card-text">Sample text can be used as a placeholder to visualize how content will appear in a design.</p> -->
    					<div class="text-center">
    						<a href="product_details.php" class="btn theme-bg text-white btn-outline-secondary poppins">Read More</a>
    					</div>
  					</div>
				</div>
			</div>
			
			
			
			
			
			


		</div>


		
		<?PHP } ?>
		<?php if ($_REQUEST['cat'] != 2 || $_REQUEST['cat'] != 3 || $_REQUEST['cat'] != 1){?>
		
		<div class="text-center Pagination">
			<button class="btn theme-bg rounded-circle mx-2 text-white btn-outline-secondary" onclick="showP1()" value="1" id="b1">1</button>
			<button class="btn rounded-circle mx-2" value="2" onclick="showP2()" id="b2">2</button>
			<!-- <button class="btn rounded-circle mx-2" value="3" onclick="showP3()" id="b3">3</button> -->
			<span class="mx-4"> ... </span>
			<a href="#" class="text-muted">Next Page > </a>
		</div>
		<?PHP } ?>

	</div>
</section>
<?php include('includes/footer.php'); ?>
</body>
<script type="text/javascript">
		var p1 = document.getElementById('products1');
		var p2 = document.getElementById('products2');

		var b1 = document.getElementById('b1');
		var b2 = document.getElementById('b2');

	function showP1() {
		p1.style.display = "flex";
		p2.style.display = "none";

		window.scrollTo(0,0);

		b1.classList.add("theme-bg", "text-white", "btn-outline-secondary");
		b2.classList.remove("theme-bg", "text-white", "btn-outline-secondary");
	}

	function showP2() {
		p2.style.display = "flex";
		p1.style.display = "none";

		window.scrollTo(0,0);

		b2.classList.add("theme-bg", "text-white", "btn-outline-secondary");
		b1.classList.remove("theme-bg", "text-white", "btn-outline-secondary");

	}
	// function showP3() {
	// 	p3.style.display = "flex";
	// 	p1.style.display = "none";
	// 	p2.style.display = "none";
		
	// 	window.scrollTo(0,0);

	// 	b3.classList.add("theme-bg", "text-white", "btn-outline-secondary");
	// 	b1.classList.remove("theme-bg", "text-white", "btn-outline-secondary");
	// 	b2.classList.remove("theme-bg", "text-white", "btn-outline-secondary");
	// }

	// function pagination(a) {
	// 	alert('haoo');

	// 	if (a = '1') {
	// 		alert('1p');
	// 	}

	// 	if (a = '2') {
	// 		alert('2p');
	// 	}

	// 	if (a = '3') {
	// 		alert('3p');
	// 	}

	// }
</script>
</html>