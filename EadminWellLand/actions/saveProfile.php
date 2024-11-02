<?php  
session_start();
include("../crudop/crud.php");
$crud  = new Crud();
$table = 'logins';
// print_r($_POST);
// exit;
$username  = $_POST['username'];
$email     = $_POST['email'];
$password  = $_POST['password'];
$old_image = $_POST['old_image'];
$hdn_id    = $_POST['hdn_id'];

$randomId  = uniqid(substr(0, 10));

$image = '';
$image_target = "../assets/images/";

if(isset($_FILES['image'])){

$imagefileName = basename($_FILES["image"]["name"]);
$targetimageFilePath = $image_target.$randomId."image".$imagefileName;
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetimageFilePath)){
        $image = $targetimageFilePath;
    }
}else{
    $image = $old_image;
}

if(isset($_POST['action']) && $_POST['action'] == 'save'){

    $ins_content = "UPDATE ".$table." set username = '".$username."', email = '".$email."', password = '".$password."', encpassword = '".md5($password)."', image = '".$image."' WHERE randomId = '".$hdn_id."'";

    $res_content = $crud->execute($ins_content);

    if ($res_content){
        echo "true";
    }else{
        echo "false";
    }
}

?>