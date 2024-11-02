
<?php 

 $sel_logo= "select * from site_logo order by id asc";
 $res_logo =$crud->getData($sel_logo);

  $res_logo[0]['header_logo'] = str_replace('../', '', $res_logo[0]['header_logo']);
        $image = 'https://eastland-wellness.com/EadminWellLand/' . $res_logo[0]['header_logo'];

  @$CartId= $_SESSION['cartID'];
  if($_SESSION['UserID'] == 0){
  $sel_cart_count = "SELECT COUNT(*) as item_count FROM cart where cart_id ='".$CartId."'";
  }else{
  $sel_cart_count = "SELECT COUNT(*) as item_count FROM cart where user_id ='".$_SESSION['UserID']."' AND status = 1";
  }
  $res_count =$crud->getData($sel_cart_count);

  $count =$res_count[0]['item_count'] ;

  

 ?>
<header id="header" class="fixed-top ">

    <div class="container d-flex align-items-center">
       <a href="index" class="logo me-auto"><img src="<?php echo $image; ?>" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="/">Home</a></li>
          <li><a class="nav-link scrollto" href="aboutUs">About</a></li>
          <li class="dropdown"><a href="products?cat=all"><span>Products</span> <i class="fa-solid fa-caret-down" style="color: #000000;"></i></a>

            <ul>

             <?php 
              $sel_data ="select * from categories order by id asc";
              $res_data =$crud->getData($sel_data); 
               foreach ($res_data as $key => $value) { 
                 $catg_id =$value['id']; ?>
             
              <li><a href="products?cat=<?php echo $catg_id ?>"><?php echo $value['catg_name'];?></a></li>
            <?php  } ?>
              
             <!--  <li><a href="products?cat=2">Beauty</a></li>
              <li><a href="products?cat=3">Vitamins</a></li> -->
            </ul>
           
          </li>
          <li><a class="nav-link scrollto" href="contact_us">Contact</a></li>
          
          <?php if ($_SESSION['UserID']): ?>
            <li class="dropdown"><a class="nav-link scrollto" href="myaccount">My Account<i class="fa-solid fa-caret-down" style="color: #000000;"></i></a>
              <ul>
                
                <li><a href="edit_profile">Edit Profile</a></li>
                <li><a href="myaccount">Orders</a></li>
              
              </ul>


            </li>

          <?php endif ?>
          
          <li>
            <a class="nav-link scrollto" href="<?php if($count == 0){echo "#";}else{echo "cart";}?>">
              <i class="fa-solid fa-cart-shopping fa-lg" style="color: #000000;"></i>
              <sup style="font-size:15px;"><?php if($count == 0){echo "";}else{echo $count;}?></sup>
            </a>
          </li>

          <?php if (!$_SESSION['UserID']) { ?>
             <li><a class="getstarted scrollto" href="#" data-toggle="modal" data-target="#loginModal">Sign In</a></li>
         <?php }else{ ?>

          <li style="cursor: pointer;"><a class="getstarted scrollto" href="logout">Logout</a></li>
        <?php } ?>
        
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
        <!-- <i class="fa-solid fa-bars mobile-nav-toggle"></i> -->
      </nav><!-- .navbar -->

    </div>
  </header>