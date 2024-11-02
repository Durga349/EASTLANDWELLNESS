  <?php 

include("crudop/crud.php");
$crud = new Crud;
$tableName = 'email_verification';


if(isset($_POST['submit']) && $_POST['submit'] == 'Save'){

$footerEmail    = isset($_POST['footerEmail'])?trim($_POST['footerEmail']):'';
$randomId       = uniqid(substr(0, 10));


    
   $ins_reg =" INSERT INTO " .$tableName." SET email = '".$footerEmail."', randomId = '".$randomId."'";

  $reg_data =$crud->execute($ins_reg);

  if($reg_data){
    echo "true";
  }else{
    echo "false";
  }
}


if (isset($_POST['action1']) && $_POST['action1'] == 'user_email') {
  
      $email_qry = "select * from " .$tableName." where email = '".$_POST['email']."'";
    //exit;
      $email_data = $crud->getData($email_qry);


    if (count($email_data)>0){
      // echo "count($email_data)";
      // exit;
      echo "true";
    }
    else{
      echo "false";
    }
  }

 ?>