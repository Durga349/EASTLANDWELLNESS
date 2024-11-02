<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php');?>

<body>
<!--   <style>
  #Form_Table {
    width: 100%; /* Set a specific width or use percentage */
  }
</style> -->
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
                <h4 class="mb-0 font-size-18">Orders</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="home.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Orders</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- end breadcrumb -->

          <!-- Page Content -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row mb-2">
                    <div class="col-6">
                      <!-- <h4 class="card-title">Orders Data Table</h4> -->
                    </div>
                    <div class="col-6">
                      <!-- <a href="addProduct.php" class="btn btn-info" style="float: right;">Add Customer</a> -->
                    </div>
                  </div>
                  
                  <table id="Form_Table" class="table dt-responsive nowrap">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Customer Type</th>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <!-- <th>Transcation ID</th> -->
                        <th>Payment Type</th>
                        <th>Total Amount</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                  </table>

                </div>
              </div>
            </div>
          </div>
          <!-- End Page Content -->

        </div>
      </div>
    </div>
  </div>

<?php include('includes/footer.php'); ?>

</body>
<script type="text/javascript">
     
  function loadData() {
  
    $("#Form_Table").dataTable().fnDestroy();
   var table = $('#Form_Table').DataTable({
  "processing": true,
  "serverSide": false,
  "pagingType": "full_numbers",
  "ajax": {
    url: "actions/saveOrders",
    type: 'post',
    data: { 'action': 'show'},
  },
  "columns": [
    {
      render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
      }
    },
    {
      "data": "customer_type",
      render: function (data, type, row) {
        return data ? data : 'Guest'; 
      }
    },
    { "data": "order_id" },
    { "data": "transactiondate" },
    { "data": "first_name" },
    { "data": "email"},
    // { "data": "transaction_id"},
    { "data": "payment_type"},
    { "data": "TotalWithShipping"},
    { "data": "id",
      "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
        let bnTd = '';
        bnTd = `<a href="editOrders?type=view&randomId=${oData.randomId}" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;
            
           
            <a href="#" title="Delete" onclick="RemoveAccount(${oData.id})"><i class="fas fa-trash"></i></a>&nbsp;&nbsp;`;

        $(nTd).html(bnTd);
      },
      "orderable": false
    }
  ],
   "scrollX": true,
  select: true,
  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
  columnDefs: [
    { className: 'text-center', targets: [0, 5] },
  ],
  aoColumnDefs: [{ 'bSortable': false, 'aTargets': ['no-sort'] }],
  sPaginationType: 'full_numbers',
});

  }

  $(document).ready(function() {
    loadData();
  });

  function RemoveAccount(id) {
  let check = confirm('Are You Sure You want To delete This Data..?');
  if(check) {
    $.ajax({
      url  : "actions/saveOrders",
      type : "post",
      data : { id : id, 'action' : 'delete' },
      success: function(data) {
        if(data == 'true') {
          toastr.success('deleted successfully...!');
          loadData();
        }       
      }
    });
  }
  return false;
} 

</script>
</html>