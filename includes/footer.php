<?php 

   $sel_logo= "select * from site_logo order by id asc";
   $res_logo =$crud->getData($sel_logo);

   $res_logo[0]['footer_logo'] = str_replace('../', '', $res_logo[0]['footer_logo']);
   $image = 'https://eastland-wellness.com/EadminWellLand/' . $res_logo[0]['footer_logo'];
   $randomId = $_SESSION['randomId'];

   $user = $_SESSION['username'];

   $sel_data = "select * from user_logins where email ='".$user."'";
   $get_data=$crud->getData($sel_data);

   $sel_icons = "select * from socialicons";
   $icons_data = $crud->getData($sel_icons);

 ?>
<style type="text/css">
  .error
  {
      color: red;
  }
</style>

<footer id="footer" style="background-color: #6FC276;">
  <div class="footer-top" style="background-color: #6FC276;">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-6 footer-contact">
            <h3><a href="index.php"><img src="<?php echo $image; ?>" width="70%"></a></h3>
            <p class="text-white poppins">
              Based on a survey of pharmacists who recommend branded vitamins and supplements.
            </p>
            <img src="assets/img/flag.png" class="mt-3" height="60">
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4 class="text-white poppins">Quick Links</h4>
            <ul>
              <li><a href="aboutUs.php" class="text-white poppins">About us</a></li>
              <li><a href="products.php" class="text-white poppins">Products</a></li>
              <li><a href="contact_us.php" class="text-white poppins">Contact</a></li>
              <li><a href="cart.php" class="text-white poppins">Cart</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4 class="text-white poppins">Let's Talk</h4>
             <form method="post" id="addform" name="addform" enctype="multipart/form-data" autocomplete="off">
              <div>
              <input type="email" name="footerEmail" id="footerEmail" placeholder="Enter Your Email" class="form-control form-control-lg" onblur="checkemail(this.value)" autocomplete="off">
               <span class="error" id="footerEmailError"></span>
               </div>
              <button type="submit" class="btn btn-danger mt-3 poppins" style="border-radius: 10px;">Submit</button>
            </form>
            <div class="social-links mt-3">
              <?php foreach ($icons_data as $row){ ?>
              <a href="<?php echo $row['link'] ?>" class="<?php echo $row['title'] ?>"><i class="bx bxl-<?php echo $row['title'] ?>"></i></a>
            <?php } ?>
              <!-- <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a> -->
              <!-- <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a> -->
              <!-- <a href="#" class="skype"><i class="bx bxl-skype"></i></a> -->
              <!-- <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
            </div>
          </div>

        </div>
      </div>
    </div>
    <hr style="color: #fff;margin:0px">
    <div class="container footer-bottom clearfix" style="margin-top: 1px solid;">
      <div class="text-center poppins">
          Copyrights &copy;<span> eastlandwellness</span> <?php echo date('Y'); ?>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="page_content">

      <div class="modal-body">
        <h3 class="modal-title text-center theme-color poppins" id="loginModalTitle">Sign In <i class="fa-solid fa-xmark fa-sm" data-dismiss="modal" style="color: #000000; float: right; vertical-align: middle; cursor: pointer;"></i></h3>
          
        <div class="row mt-3">
          <div class="col-12">
            <input type="email" name="loginEmail" id="loginEmail" placeholder="Enter Your Email / Username" class="form-control">
            <input type="password" name="loginPassword" id="loginPassword" placeholder="Enter Your Password" class="form-control mt-3">
            <small><a href="#" class="text-secondary mt-2" data-toggle="modal" data-target="#FooterModal" data-dismiss="modal">Forgot Password</a></small>
            <small style="float: right;">New User? <a href="#" class="text-secondary mt-2" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">Sign Up</a></small>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-bg btn-outline-secondary text-white" onclick="login()">Login</button>
      </div>
    </div>
  </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-2" role="dialog" aria-labelledby="registerModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="page_content">

      <div class="modal-body">
        <h3 class="modal-title text-center theme-color poppins" id="loginModalTitle">Sign Up <i class="fa-solid fa-xmark fa-sm" data-dismiss="modal" style="color: #000000; float: right; vertical-align: middle; cursor: pointer;"></i></h3>
          
        <div class="row mt-3">
          <div class="col-12">
            <label>First Name</label>
            <input type="text" name="regFname" id="regFname" class="form-control">
            <label>Last Name</label>
            <input type="text" name="regLname" id="regLname" class="form-control">
            <label>Email / Username</label>
            <input type="email" name="regEmail" id="regEmail" class="form-control">
            <label>Phone Number</label>
            <input type="text" name="regPhone" id="regPhone" class="form-control" maxlength="12">
            <label>Password</label>
            <input type="password" name="regPassword" id="regPassword" class="form-control">
            <div class="text-center">
              <small>Already Have a Account? <a href="#" class="text-secondary mt-2" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Sign In</a></small>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
     <button type="button" class="btn theme-bg btn-outline-secondary text-white" onclick="register()">Register</button>
      </div>
    </div>
  </div>
</div>


<!-- Forgot Modal -->
<div class="modal fade" id="FooterModal" tabindex="-1" role="dialog" aria-labelledby="FooterModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="page_content">

      <div class="modal-body">
        <h3 class="modal-title text-center theme-color poppins" id="FooterModalTitle">Forgot Password<i class="fa-solid fa-xmark fa-sm" data-dismiss="modal" style="color: #000000; float: right; vertical-align: middle; cursor: pointer;"></i></h3>
          
        <div class="row mt-3">
          <div class="col-12">
            <input type="email" name="forgotEmail" id="forgotEmail" placeholder="Enter Your Email" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" name="cancel" id="cancel" class="btn btn-danger btn-outline-danger text-white" onclick="location.href = 'index.php'">Cancel</button>
        <button type="button" class="btn theme-bg btn-outline-secondary text-white" onclick="forget()">Submit</button>
      </div>
    </div>
  </div>
</div>


<!-- Verify Modal -->
<div class="modal fade" id="VerifyModal" tabindex="-1" role="dialog" aria-labelledby="VerifyModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="page_content">

      <div class="modal-body">
        <h3 class="modal-title text-center theme-color poppins" id="VerifyModalTitle">Verify<i class="fa-solid fa-xmark fa-sm" data-dismiss="modal" style="color: #000000; float: right; vertical-align: middle; cursor: pointer;"></i></h3>
          
        <div class="row mt-3">
          <div class="col-12">
            <input type="text" name="OTP" id="OTP"  class="form-control" value="<?php echo  $randomId; ?>">
           <input type="text" name="verifyOTP" id="verifyOTP" placeholder="Enter Your OTP" class="form-control mt-3">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" name="cancel" id="cancel" class="btn btn-danger btn-outline-danger text-white" onclick="location.href = 'index.php'">Cancel</button>
        <button type="button" class="btn theme-bg btn-outline-secondary text-white" onclick="validation()">Verify</button>
      </div>
    </div>
  </div>
</div>

<!-- ChangePassword Modal -->
<div class="modal fade" id="ChangePassModal" tabindex="-1" role="dialog" aria-labelledby="ChangePassModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="page_content">

      <div class="modal-body">
        <h3 class="modal-title text-center theme-color poppins" id="ChangePassModalTitle">Change Password<i class="fa-solid fa-xmark fa-sm" data-dismiss="modal" style="color: #000000; float: right; vertical-align: middle; cursor: pointer;"></i></h3>
          
        <div class="row mt-3">
          <div class="col-12">
            <input type="text" name="username" id="username" class="form-control" value="<?php echo $user ?>" readonly>
            <input type="text" name="npassword" id="npassword"  class="form-control" placeholder="Enter your Password">
           <input type="text" name="cpassword" id="cpassword"  class="form-control mt-3" placeholder="Please Confirm your Password">
           <input type="hidden" name="hiddenid" id="hiddenid" value="<?php echo $get_data[0]['id']; ?>">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" name="cancel" id="cancel" class="btn btn-danger btn-outline-danger text-white" onclick="location.href = 'index.php'">Cancel</button>
        <button type="button" class="btn theme-bg btn-outline-secondary text-white" onclick="loginval()">Submit</button>
      </div>
    </div>
  </div>
</div>


  <!-- <div id="preloader"></div> -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="fa-solid fa-arrow-up fa-sm"></i>
  </a>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script> -->

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>  
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <!-- <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script type="text/javascript" src="js/footer.js"></script>


