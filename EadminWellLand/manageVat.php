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
                <h4 class="mb-0 font-size-18">VAT Rates</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="home.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">VAT Rates</li>
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
                      <!-- <h4 class="card-title">VAT Rates Data</h4> -->
                    </div>
                    <div class="col-6">
                      <a href="addVat" class="btn btn-info" style="float: right;">Add VAT Rate</a>
                    </div>
                  </div>
                  
                  <table id="Form_Table" class="table dt-responsive nowrap">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>VAT Rate Title</th>
                        <th>VAT Rate(%)</th>
                        <th>Mark as default</th>
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
          url      : "actions/saveVat",
          type     : 'post',
          data     : { 'action' : 'Display'},
      },

        "columns": [
          {
            render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          { "data" : "vat_title" },
          { "data" : "vat_rate" },
          { "data" : "id",
             fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                let bnTd = '';
                bnTd = ``;

                  if (oData.status == '1') {
                        bnTd += `<input type="radio" name="status" onclick="Statusenable(${oData.id}, 0)" checked>`;
                    } else {
                        bnTd += `<input type="radio" name="status" onclick="Statusenable(${oData.id}, 1)">`;
                    } 

                        $(nTd).html(bnTd);
                }
          
           },

          { "data" : "id",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                let bnTd = '';
                bnTd = `<a href="editVat?&randomId=${oData.randomId}" title="Edit"><i class="far fa-edit" aria-hidden="true"></i></a>&nbsp;&nbsp;

                    <a href="#" title="Delete" onclick="RemoveAccount(${oData.id})"><i class="fas fa-trash"></i></a>&nbsp;&nbsp;`;

                //   if (oData.status == '1'){

                //   bnTd += `<a href="#" title="Status" onclick="Statusenable(${oData.id},0)"><i class="fa fa-check text-success fa-lg" aria-hidden="true"></i></a>&nbsp;&nbsp;`;
                // }else{

                //       bnTd += `<a href="#" title="Status" onclick="Statusenable(${oData.id},1)"><i class="fa fa-times text-danger fa-lg" aria-hidden="true"></i></a>`;
                //         }
                        $(nTd).html(bnTd);
                },
                "orderable": false
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


function Statusenable(id,status){
  // alert(id);
   //alert(status);
  $.ajax({
      url  : "actions/saveVat",
      type : "post",
      data : { id : id, status:status, 'action' : 'StatusChange'},
      success: function(data) {
        if(data == 'true') {
          toastr.success('Status Changed Successfully...!');
          loadData();
        }
        else{
          toastr.error(data);
        }
      }
    });
}

  function RemoveAccount(id) {
  let check = confirm('Are You Sure You Want To Delete This Data..?');
  if(check) {
    $.ajax({
      url  : "actions/saveVat",
      type : "post",
      data : { id : id, action : 'delete' },
      success: function(data) {
        if(data == 'true') {
          toastr.success('Deleted Successfully...!');
         location.href = "manageVat";
        }
      }
    });
  }
  return false;
}

</script>
</html>