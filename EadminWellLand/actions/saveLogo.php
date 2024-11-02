<?php 
session_start();

include_once("../crudop/crud.php");
$crud = new Crud();
$tableName = 'site_logo';
extract($_POST);

$pre_image      = isset($_POST['pre_image'])?trim($_POST['pre_image']):'';
$old_image      = isset($_POST['old_image'])?trim($_POST['old_image']):'';


$hdn_id      = isset($_POST['hdn_id'])?trim($_POST['hdn_id']):'';

$randomId    = uniqid(substr(0, 10));

$image = '';
$image_targetDir = "../assets/images/";

if(isset($_FILES['image'])){

$imagefileName = basename($_FILES["image"]["name"]);
$targetimageFilePath = $image_targetDir.$randomId. "image".$imagefileName;
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetimageFilePath)){
        $image = $targetimageFilePath;
    }
}else{
    $image = $old_image;
}

$image1 = '';
$image1_targetDir = "../assets/images/";

if(isset($_FILES['image1'])){

$image11fileName = basename($_FILES["image1"]["name"]);
 $targetimage1FilePath = $image1_targetDir.$randomId. "image1"
        .$image1fileName;
     if(move_uploaded_file($_FILES["image1"]["tmp_name"], $targetimage1FilePath)){                                                              
    $image1 = $targetimage1FilePath;
  }
}else{
          $image1 = $old_image;
       }


if(isset($_POST['action']) && $_POST['action'] == 'save'){

    $ins_content = "insert into ".$tableName." set header_logo = '".$image."',footer_logo = '".$image1."', randomId = '".$randomId."'";

    $res_content = $crud->execute($ins_content);

    if ($res_content){
        echo "true";
    }else{
        echo "false";
    }
}


if(isset($_POST["action"]) && $_POST['action'] == 'show'){

     $sql_show = "SELECT * from ".$tableName."  ORDER BY id DESC";
 
    $show_data = $crud->getData($sql_show);        
       $response = array(
        "draw" => 1,
        "recordsTotal" => count($show_data),
        "data" => $show_data
    );
    echo json_encode($response);
}

if (isset($_POST['action'])&&$_POST['action'] == 'delete') {
    
     $selDis = "delete from ".$tableName." where id='".$_POST['id']."'";
     $resSel = $crud->execute($selDis);
    
    if ($resSel) {
        echo "true";
    }else{
        echo "false";
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'update'){   
      
  $Upd_Data = "UPDATE ".$tableName."  set header_logo = '".$image."',footer_logo = '".$image1."'  WHERE randomId ='".$hdn_id."'";

  $Upd_res = $crud->execute($Upd_Data);

   if ($Upd_res) {
        echo "true";
   }else{
        echo"false";
   }
}

?>