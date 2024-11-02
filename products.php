<!DOCTYPE html>
<html>
<?php include('includes/header.php'); ?>
<body id="page_content capsules">
<?php include('includes/navbar.php');


$catg_id = $_REQUEST['cat'];

if ($catg_id === 'all') 
{
  $condition = 'ORDER BY id ASC';
} 
else 
{
  $condition = "WHERE catg_id = '" . $_REQUEST['cat'] . "' ORDER BY id ASC";
}

 $sel_cat = "SELECT * FROM products " . $condition;
 $res_cat = $crud->getData($sel_cat);
?>

<style>
  .card-img-top
  {

    margin: auto;
   }
  #header
  {
    background: #fff;
  }
 .h6
  {
    font-size: 0.8rem;
    letter-spacing: 1px;
  }
</style>
<!-- searching products based on keywords -->
<section class="hero">
  <div class="container-fluid mt-5 capsuleBanner">
    <div class="text-center">
      <h1 class="pt-5 bannerTitle">Products</h1>
      <p class="mt-4 bannerCaption">You've come to the right place. We've got a bunch here and you can start buying right now</p>
      <form method="POST" action="">
      <div class="input-group mt-5" align="center">
        <input type="text" class="form-control addonsSearch" placeholder="Enter Keywords" aria-label="Recipient's username" aria-describedby="basic-addon2" id="searchInput">
        <div class="input-group-append theme-bg">
          <input type="hidden" name="hdn_ctgId" id="hdn_ctgId" value="<?php echo $catg_id; ?>">
           <button class="btn text-white" id="searchButton" type="button"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
      </div>
      </div>
       </form>
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
   <!--Here Based on the category the products will be displayed  -->
    <!-- <div class="row" id="productResults">
     


   </div>  -->

    <div class="row" id="productsContainer">
 <?php
if (!empty($res_cat)) 
{
    foreach ($res_cat as $key => $value) {
    $value['product_image'] = str_replace('../', '', $value['product_image']);
    $image = 'https://eastland-wellness.com/EadminWellLand/' . $value['product_image'];
?>
        <div class="col-md-4 p-4">
            <div class="card product-grid">
                  <a href="product_details?prodId=<?php echo $value['id']; ?>">
                <div class="product-image">
                    <img class="card-img-top pic-1" src="<?php echo $image; ?>" alt="Card image cap">
                    <img class="card-img-top pic-2" src ="<?php echo $image; ?>" alt="Card image cap">
                    <div class="card-body">
                        <div class="text-center">
                          <p title="<?php echo $value['prod_name']; ?>" style="color: black; font-size: 0.8rem;letter-spacing: 1px;" class="montserrat"><?php echo substr($value['prod_name'],0,28)."..."; ?></p>
                            <button class="btn theme-bg btn-outline-secondary text-white poppins">Read More</button>
                        </div>
                    </div>
                </div>
                  </a>
            </div>
        </div>
<?php } } ?>
    </div>

    <div class="row" id="productsresult">
<?php 


    if (isset($_GET['keyword'])) {
    $searchKeyword = $_GET['keyword'];

     $query = "select * from products WHERE (prod_name LIKE '".$searchKeyword."%' OR prod_code LIKE '" . $searchKeyword . "%') ORDER BY id ASC";
    $res_cat = $crud->getData($query);

    foreach ($res_cat as $key => $value) {
    $value['product_image'] = str_replace('../', '', $value['product_image']);
    $image = 'https://eastland-wellness.com/EadminWellLand/' . $value['product_image'];
     ?>
        <div class="col-md-4 p-4">
            <div class="card product-grid">
                  <a href="product_details?prodId=<?php echo $value['id']; ?>">
                <div class="product-image">
                    <img class="card-img-top pic-1" src="<?php echo $image; ?>" alt="Card image cap">
                    <img class="card-img-top pic-2" src ="<?php echo $image; ?>" alt="Card image cap">
                    <div class="card-body">
                        <div class="text-center">
                          <p title="<?php echo $value['prod_name']; ?>" style="color: black; font-size: 0.8rem;letter-spacing: 1px;" class="montserrat"><?php echo substr($value['prod_name'],0,28)."..."; ?></p>
                            <button class="btn theme-bg btn-outline-secondary text-white poppins">Read More</button>
                        </div>
                    </div>
                </div>
                  </a>
            </div>
        </div>
<?php  }
}
 ?>
</div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php include('includes/footer.php'); ?>
</html>
<script>
    $("#searchButton").click(function()
    {
        let hdn_ctgId = $("#hdn_ctgId").val().trim();
        //alert(hdn_ctgId);
        var searchKeyword = $("#searchInput").val().trim();
        $.ajax({
            type: "POST",
            url: "search_products", 
            data: { keyword: searchKeyword, cat_id : hdn_ctgId},
            success: function(response) 
            {
              $("#productsContainer").html(response);
            }
          });
    });

</script>