<?php 
include("../crudop/crud.php");
$crud = new Crud();

$tableName = "prod_images";

$randomId = substr(uniqid(), 0,10);

$image  = '';
$image_targetDir = "../assets/images/";

 if(isset($_POST["action"]) && $_POST['action'] == 'save')
{
   foreach($_FILES['image']['name'] as $key => $value){
        if(isset($_FILES['image'])){

        $imagefileName = basename($_FILES["image"]["name"][$key]);
        $targetimageFilePath = $image_targetDir . "image_".$imagefileName;
     if(move_uploaded_file($_FILES["image"]["tmp_name"][$key], $targetimageFilePath)){
        $image = $targetimageFilePath;
     }
   }
 
     $ins_qry = "insert into ".$tableName." set image = '".$image."', randomId = '".$randomId."' ";
     $ins_data = $crud->execute($ins_qry);
}

    if ($ins_data){
        echo "true";
      }
      else{
        echo "false";
      }
}


// if(isset($_POST["action"]) && $_POST['action'] == 'show')
// {
 
// $sql_show = "select * from ".$tableName." order by id desc";
// // exit;
//       $show_data = $crud->getData($sql_show);        
//        $response = array(
//         "draw" => 1,
//         "recordsTotal" => count($show_data),
//         "data" => $show_data
//     );
//     echo json_encode($response);
// }

 ?>