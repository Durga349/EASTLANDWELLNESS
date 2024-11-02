<?php 
session_start();
include('../crudop/crud.php');
$crud = new Crud;

$tableName = 'logins';

if(isset($_POST['action']) && $_POST['action'] == 'login'){

$email       = isset($_POST['email'])?trim($_POST['email']):'';
$password    = isset($_POST['password'])?trim($_POST['password']):'';

	 $res_sql = "select * from ".$tableName." where email = '".$email."' and password = '".$password."' and encpassword = '".md5($password)."' ";

  	$res_data = $crud->getData($res_sql);

  	if (count($res_data) > 0){
    
	 $_SESSION['username']  = $res_data[0]['username'];
	 $_SESSION['password']  = $res_data[0]['password'];

    	echo "true";
    }else{
      	echo "false";
    }
}

?>