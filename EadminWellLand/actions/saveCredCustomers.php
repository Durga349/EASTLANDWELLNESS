<?php 
session_start();

include_once("../crudop/crud.php");
$crud = new Crud();
$tableName = 'customers';
$tableName1 ='user_logins';

$first_name    = isset($_POST['first_name'])?trim($_POST['first_name']):'';
$last_name     = isset($_POST['last_name'])?trim($_POST['last_name']):'';
$email         = isset($_POST['email'])?trim($_POST['email']):'';
$phone_number  = isset($_POST['phone_number'])?trim($_POST['phone_number']):'';
$password      = isset($_POST['password'])?trim($_POST['password']):'';
$hdn_id        = isset($_POST['hdn_id'])?trim($_POST['hdn_id']):'';
$randomId      = uniqid(substr(0, 10));
$encpassword   = md5($password);

if(isset($_POST["action"]) && $_POST['action'] == 'save'){

	 $insUserReg = "INSERT INTO ".$tableName." SET customer_type='Credited',first_name = '".$first_name."',last_name = '".$last_name."',email = '".$email."',phone_number = '".$phone_number."',password = '".$password."', randomId = '".$randomId."'";
	  $UserRegData =$crud->execute($insUserReg);

      $ins_login = "INSERT INTO ".$tableName1." SET user_type='Credited', email ='".$email."',password = '".$password."',encpassword = '".$encpassword."', randomId = '".$randomId ."'";
      $log_data = $crud->execute($ins_login);
  
        if($UserRegData && $log_data)
        {
          echo "true";
        } else{
          echo "false";
        }
}

if(isset($_POST["action"]) && $_POST['action'] == 'Display'){

    $sql_show = "SELECT * FROM customers where customer_type='Credited' order by id  desc";
 
    $show_data = $crud->getData($sql_show);        
       $response = array(
        "draw" => 1,
        "recordsTotal" => count($show_data),
        "data" => $show_data
    );
    echo json_encode($response);
}

if(isset($_POST["action"]) && $_POST['action'] == 'update'){

     $UpdateQuery = "UPDATE ".$tableName." SET customer_type ='Credited',first_name = '".$first_name."',last_name = '".$last_name."',email = '".$email."',phone_number = '".$phone_number."',password = '".$password."' where  randomId = '".$hdn_id."'";
    $UserUpdateData = $crud->execute($UpdateQuery);

   // save userlogins
       $UpdateLogin = "UPDATE ".$tableName1." SET user_type ='Credited', email ='".$email."',password = '".$password."',encpassword = '".$encpassword."'  where  randomId = '".$hdn_id."'";
      $UpdateLogData = $crud->execute($UpdateLogin);

        if($UserUpdateData && $UpdateLogData)
        {
          echo "true";
        } else{
          echo "false";
        }
}

if(isset($_POST["action"]) && $_POST['action'] == 'delete'){

  $del_cust = "DELETE FROM ".$tableName." where id = '".$_POST['id']."'";
    $cust_del = $crud->execute($del_cust);

  $del_log = "DELETE FROM ".$tableName1." where id = '".$_POST['id']."'";
    $log_del = $crud->execute($del_log);

    if ($cust_del && $log_del){
      echo "true";
    }else{
      echo "false";
    }
}

?>