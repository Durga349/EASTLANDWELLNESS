<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php'); ?>

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
                <h4 class="mb-0 font-size-18">Categories</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Categories</li>
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
                      <h4 class="card-title">Categories Data Table</h4>
                    </div>
                    <div class="col-6">
                      <a href="addCategories" class="btn btn-info" style="float: right;">Add Category</a>
                    </div>
                  </div>
                  
                  <table id="Form_Table" class="table dt-responsive nowrap">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Category</th>
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
    var table = $('#Form_Table').DataTable(
    {
      "processing" : true,
      "serverSide" : false,
      "pagingType" : "full_numbers",
      "ajax"       : {
          url      : "actions/saveCategories",
          type     : 'post',
          data     : { 'action' : 'Display'},
      },

        "columns": [
          {
            render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          { "data" : "catg_name" },
          { "data" : "id",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              let bnTd = '';
              bnTd = `<a href="editCategories?randomId=${oData.randomId}" title="Edit"><i class="far fa-edit" aria-hidden="true"></i></a>&nbsp;&nbsp;

                  <a href="#" title="Delete" onclick="RemoveAccount(${oData.id})"><i class="fas fa-trash"></i></a>&nbsp;&nbsp;`;
                $(nTd).html(bnTd);
              }
            }
        ],
        select: true,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        columnDefs: [
          { className: 'text-center', targets: [0,2] },
        ],
        aoColumnDefs : [{'bSortable' : false, 'aTargets' : ['no-sort']}],
        sPaginationType : 'full_numbers',
    } );
  }

  $(document).ready(function() {
    loadData();
  });

  function RemoveAccount(id) {
  let check = confirm('Are You Sure You Want To Delete This Data..?');
  if(check) {
    $.ajax({
      url  : "actions/saveCategories",
      type : "post",
      data : { id : id, action : 'delete' },
      success: function(data) {
        if(data == 'true') {
          toastr.success('Deleted Successfully...!');
         location.href = "categories";
        }
      }
    });
  }
  return false;
}

</script>
</html>