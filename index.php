<!DOCTYPE html>
<html lang="en">

<?php 
include('includes/header.php');
// print_r($_SESSION);
// exit;
$homeDataQry = "select * from home_content order by id asc";
$homeData = $crud->getData($homeDataQry);

?>
<style type="text/css">
  .VIpgJd-ZVi9od-ORHb{
    display: none !!important;
  }
  .testimonial-wrap .card
  {
    padding:20px;
    text-align: center;
  }
  .testimonial-wrap .card img
  {
    width:70%;

  }
</style>
<body>

<?php include('includes/navbar.php'); ?>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
  <!-- ======= Hero Section ======= -->
 <!--  <section id="hero" class="d-flex align-items-center"> -->

    <!-- <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Redefining The path to <span> A Healthy Lifstyle</span></h1>
          <p>We believe that fresh natural organic products<br>should be accessible to all.</p>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <div class="input-group">
              <input type="text" class="form-control addonsSearch" placeholder="Search for Product in our store" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append theme-bg">
                <button class="btn text-white" type="button">Find Product</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/1.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div> -->

    <?php include('testslider.php'); ?>

 <!--  </section> --><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container commitment" data-aos="fade-up">

        <div class="section-title">
          <h2><?php echo $homeData[0]['title']; ?></h2>
        </div>

        <div class="row content">
          <div class="col-lg-7">
            <?php echo $homeData[0]['description']; ?>
          </div>
          <div class="col-lg-5  text-right">
            <p>
              <img src="EadminWellLand/<?php echo str_replace('../', '', $homeData[0]['image']); ?>" class="img-fluid">
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->


     <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Products</h2>
        </div>
      <?php 
    $sel_data ="select * from products where status = 1 order by id desc";
    $res_data =$crud->getData($sel_data);
   

       ?>
        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
             <?php foreach ($res_data as $key => $value) {
                    $image  = $value['product_image'];
                    $image1 = substr($image, 3);
              ?>
         <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="card">
                  <a href="product_details?prodId=<?php echo $value['id']; ?>">
                    <img  src="EadminWellLand/<?php echo $image1; ?>" alt="Card image cap">
                  </a>
                </div>
              </div>
            </div><!-- End testimonial item -->
          <?php } ?>

          </div>
          <div class="swiper-pagination"></div>
        </div>
        <div class="text-center">
          <button class="btn theme-bg btn-outline-secondary text-white poppins" onclick="location.href = 'products?cat=all'">View More</button>
        </div>
      </div>
    </section>


    <!-- ======= Personalise Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row content personlize">
          <div class="col-lg-6">
            <p>
              <img src="EadminWellLand/<?php echo str_replace('../', '', $homeData[1]['image']); ?>" class="img-fluid">
            </p>
           <!--  <a href="#" class="btn-learn-more">Learn More</a> -->
          </div>
          <div class="col-lg-6 mt-5 about-conte">
            <h2 class="theme-color regimen mb-3"><?php echo $homeData[1]['title']; ?></h2>
            <?php echo $homeData[1]['description']; ?>
          </div>
        </div>

      </div>
    </section>
    <!-- End Personalise Section -->

  </main>
  
 <?php include('includes/footer.php'); ?>

</body>

</html><script>
$("#searchButton").click(function() {
    var searchKeyword = $("#searchInput").val().trim();
    console.log(searchKeyword);

    window.location.href = "products?keyword=" + encodeURIComponent(searchKeyword);
});
</script>

