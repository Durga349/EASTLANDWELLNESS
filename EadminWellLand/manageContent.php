<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <h4 class="mb-0 font-size-18">Home Content</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                      <a href="home.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Home Content</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- end breadcrumb -->


          <!-- Page Content -->
          <div class="row">
                <div class = "col-12">
                    <div class = "card">
                        <div class="card-header" style="padding: 5px 15px;">
                          <div class = "row">
                              <div class = "col-6">
                                  <!-- <h3 style="line-height: 20px;" class="card-title p-2">Manage Content</h3> -->
                              </div>
                              <div class = "col-6">
                                  <a href="addContent" class="btn btn-info" style="float: right;"><i class="fa-solid fa-plus"></i></a>
                              </div>
                          </div>
                      </div>
                      <div class = "card-body">
                        <div class = row>
                          <div class = "col-12 table-responsive">
                              <table width="100%" align="center" id="Form_Table" class="table table-striped">
                                <thead>
                                  <tr>
                                  
                                    <th align="center">S.No</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                     <th>Image</th>
                                    <th align="center">Actions</th>
                                  </tr>
                                </thead>
                              </table>
                          </div>
                        </div>
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
  <script type="text/javascript">
    function loadData() {
    $("#Form_Table").dataTable().fnDestroy();
    var table=$('#Form_Table').DataTable(
    {
        "processing" : true,
        "serverSide" : false,
        "pagingType" : "full_numbers",
        "ajax"       : {
            url      : "actions/saveContent",
            type     : 'post',
            data     : { 'action' : 'show'},
        },

        "columns": [
            /*{
              "data" : "id",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                 $(nTd).html(`<input type="checkbox" name="uniqueId[]" id="trxn_chk${oData.id}" value="${oData.id}">`);
                  }
            },*/
            {
              render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
              }
            },
            { "data" : "title"},

            { "data" : "description"},
           
            { "data" : "image",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  $(nTd).html(`<img width="100%" height="100px" src="admin/${oData.image}"/>`);
                } 
              },
            { "data" : "id",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                bnTd = `<a href="editContent?type=view&randomId=${oData.randomId}" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;
               
                <a href="editContent?type=edit&randomId=${oData.randomId}" title="Edit"><i class="far fa-edit" aria-hidden="true"></i></a>&nbsp;&nbsp;

                <a href="#" title="Delete" onclick="RemoveAccount(${oData.id})"><i class="fas fa-trash"></i></a>&nbsp;&nbsp; `;
                        $(nTd).html(bnTd);
                },
                "orderable": false
              }
        ],
        //dom: 'lBfrtip',
        select: true,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        columnDefs: [
            { className: 'text-center', targets: [0,4] },

            {
              width: 200, targets: 1
            },
          ],
        //"order": [[ 1, "asc" ]],
        aoColumnDefs : [{'bSortable' : false, 'aTargets' : ['no-sort']}], // make the actions column unsortable
        sPaginationType : 'full_numbers',
    } );
}


    $(document).ready(function() {
      //alert('hiii');
  loadData();
});


function RemoveAccount(id) {
  let check = confirm('Are You Sure You want To delete This Data..?');
  if(check) {
    $.ajax({
      url  : "actions/saveContent",
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
</body>
</html>