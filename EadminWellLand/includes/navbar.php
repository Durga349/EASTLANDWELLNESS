<?php

$profileQry = "SELECT * FROM logins";
$profileData = $crud->getData($profileQry);

?>
<header id="page-topbar">
    <div class="navbar-header">

        <div class="d-flex align-items-left">
            <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"
                id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

            <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?php if($profileData[0]['image'] != ''){echo str_replace("../", "", $profileData[0]['image']);}else{echo "assets/images/users/avatar-3.jpg";} ?>"
                        alt="Header Avatar">
                    <span class="d-none d-sm-inline-block ml-1"><?php echo $_SESSION['username'] ?></span>
                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="profile.php">
                        <span>Profile</span>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="logout.php">
                        <span>Log Out</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</header>