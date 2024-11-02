<?php
include("crudop/crud.php");
$crud = new Crud;
$tableName = 'contact';

$fname        = isset($_POST['fname'])?trim($_POST['fname']):'';
$lname        = isset($_POST['lname'])?trim($_POST['lname']):'';
$email        = isset($_POST['email'])?trim($_POST['email']):'';
$phone        = isset($_POST['phone'])?trim($_POST['phone']):'';
$enq_type     = isset($_POST['enq_type'])?trim($_POST['enq_type']):'';
$message      = isset($_POST['message'])?trim($_POST['message']):'';

$randomId     = uniqid(substr(0, 10));

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

$to           = "info@eastland-wellness.com";
$subject      = "Feedback Report for ".$enq_type. " from Eastland Wellness";
$headers      = "From:" . $email;

if(isset($_POST['submit']) && $_POST['submit'] == 'Save'){

	$ins_reg = "INSERT INTO " .$tableName." SET fname = '".$fname."',lname = '".$lname."',email = '".$email."',phone = '".$phone."',enq_type = '".$enq_type."',message = '".$message."', randomId = '".$randomId."'";

	$reg_data =$crud->execute($ins_reg);

	if(mail($to,$subject,$message, $headers) && $reg_data){
			echo "true";
		} else {
			echo "The Email Message Was Not Sent.";
		}
}


// if (isset($_POST['action1']) && $_POST['action1'] == 'user_email') {
  
//       $email_qry = "select * from " .$tableName." where email = '".$_POST['email']."'";
//     //exit;
//       $email_data = $crud->getData($email_qry);


//     if (count($email_data)>0){
//       // echo "count($email_data)";
//       // exit;
//       echo "true";
//     }
//     else{
//       echo "false";
//     }
//   }


?>