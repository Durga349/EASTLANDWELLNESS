<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php'); 
$CountQry = "SELECT round(SUM(total_amount), 2) as totalAmount,count(id) as totalOrders from orders";
$Countdata = $crud->getData($CountQry);

$monthQry = "SELECT round(SUM(total_amount), 2) AS CMtotal FROM orders WHERE MONTH(updated_at) = MONTH(CURRENT_DATE()) AND YEAR(updated_at) = YEAR(CURRENT_DATE())";
$monthData = $crud->getData($monthQry);

?>

<body>
  <div id="layout-wrapper">

<?php include('includes/navbar.php'); ?>

<?php include('includes/sidebar.php'); ?>

    <div class="main-content">
      <div class="page-content">
        <div class="container-fluid">

          <!-- breadcrumb -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Dashboard</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="javascript: void(0);">Admin</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- end breadcrumb -->


          <!-- Page Content -->
          <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card bg-primary border-primary">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-light float-right">Daily</span>
                            <h5 class="card-title mb-0 text-white">Total Sales Order Amount</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-12">
                                <h2 class="d-flex align-items-center mb-0 text-white">
                                    $ <?php echo !empty($Countdata[0]['totalAmount']) ? $Countdata[0]['totalAmount'] : 0; ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-4">
                <div class="card bg-success border-success">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-light float-right">Per Month</span>
                            <h5 class="card-title mb-0 text-white">Current Month Sales</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-12">
                                <h2 class="d-flex align-items-center text-white mb-0">
                                    $ <?php echo !empty($monthData[0]['CMtotal']) ? $monthData[0]['CMtotal'] : 0; ?>

                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-4">
                <div class="card bg-info border-info">
                    <div class="card-body" onclick="location.href='manageOrders'" style="cursor: pointer;">
                        <div class="mb-4">
                            <span class="badge badge-soft-light float-right">All Time</span>
                            <h5 class="card-title mb-0 text-white">Total Orders</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-12">
                                <h2 class="d-flex align-items-center text-white mb-0">
                                    <?php echo $Countdata[0]['totalOrders']; ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col-->
        </div>
        <!-- end row -->

        <div class="row">

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-right position-relative">
                            <a href="#" class="dropdown-toggle h4 text-muted" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#" class="dropdown-item">Action</a></li>
                                <li><a href="#" class="dropdown-item">Another action</a></li>
                                <li><a href="#" class="dropdown-item">Something else here</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a href="#" class="dropdown-item">Separated link</a></li>
                            </ul>
                        </div>
                        <h4 class="card-title d-inline-block">Current Month (Sales)</h4>

                        <div id="morris-bar-example" class="morris-chart" style="height: 260px;"></div>

                        <div class="row text-center mt-4">
                            <div class="col-6">
                                <h4>$1875.54</h4>
                                <p class="text-muted mb-0">Revenue</p>
                            </div>
                            <div class="col-6">
                                <h4>541</h4>
                                <p class="text-muted mb-0">Total Sales</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-right position-relative">
                            <a href="#" class="dropdown-toggle h4 text-muted" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#" class="dropdown-item">Action</a></li>
                                <li><a href="#" class="dropdown-item">Another action</a></li>
                                <li><a href="#" class="dropdown-item">Something else here</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a href="#" class="dropdown-item">Separated link</a></li>
                            </ul>
                        </div>
                        <h4 class="card-title d-inline-block">Daily Sales</h4>

                        <div id="morris-donut-example" class="morris-chart" style="height: 260px;"></div>

                        <div class="row text-center mt-4">
                            <div class="col-6">
                                <h4>5,459</h4>
                                <p class="text-muted mb-0">Total Sales</p>
                            </div>
                            <div class="col-6">
                                <h4>18</h4>
                                <p class="text-muted mb-0">Open Compaign</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-right position-relative">
                            <a href="#" class="dropdown-toggle h4 text-muted" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#" class="dropdown-item">Action</a></li>
                                <li><a href="#" class="dropdown-item">Another action</a></li>
                                <li><a href="#" class="dropdown-item">Something else here</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a href="#" class="dropdown-item">Separated link</a></li>
                            </ul>
                        </div>
                        <h4 class="card-title d-inline-block">Current Month Invoices</h4>

                        <div id="morris-line-example" class="morris-chart" style="height: 260px;"></div>

                        <div class="row text-center mt-4">
                            <div class="col-6">
                                <h4>$7841.12</h4>
                                <p class="text-muted mb-0">Total Revenue</p>
                            </div>
                            <div class="col-6">
                                <h4>17</h4>
                                <p class="text-muted mb-0">Open Compaign</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row-->
          <!-- End Page Content -->

        </div>
      </div>
    </div>
  </div>

<?php include('includes/footer.php'); ?>

</body>
</html>