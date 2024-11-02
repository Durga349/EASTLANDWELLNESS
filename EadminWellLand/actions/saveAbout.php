<?php
session_start();
include_once("../crudop/crud.php");
$crud = new Crud();

$tableName ='about_content';
    
extract($_POST);


    $title       = isset($title) ? $title : '';
    $description = isset($description) ? $description : '';
    $old_image   = isset($old_image) ? $old_image : '';
    $hdn_id      = isset($hdn_id) ? $hdn_id : '';
   
    $randomId = substr(uniqid(), 0,10); 

    $image = '';
    $image_targetDir = "../assets/images/";

    if(isset($_FILES['image'])){

    $imagefileName = basename($_FILES["image"]["name"]);
     $targetimageFilePath = $image_targetDir.$randomId. "image"
            .$imagefileName;
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetimageFilePath)){ 
            $image = $targetimageFilePath;
        }
    } else {
        $image = $old_image;
    }

  if (isset($_POST['action']) && $_POST['action'] == 'save'){ 

   $save_content = "insert into about_content set title='".$title."',description='".$description."',image='".$image."', randomId='".$randomId."'";
   
    $res_content = $crud->execute($save_content);

        
          if ($res_content){
     		echo "true";
       }else{
       	echo "false";
       }
 }
 //    show 

  if (isset($_POST['action']) && $_POST['action'] == 'show'){          
         $slidershow = "select * from about_content order by id desc"; 
        $slider_showdata = $crud->getData($slidershow);       

       $response = array(
        "draw" => 1,
        "recordsTotal" => count($slider_showdata),
        "data" => $slider_showdata
    );

    echo json_encode($response);
 }




if (isset($_POST['action']) && $_POST['action'] == 'update') {
    
    $up_slider = "UPDATE about_content SET  title='".$title."',description='".$description."',image='".$image."' WHERE randomId='$hdn_id';";
     $up_reslider = $crud->execute($up_slider);

   if ($up_reslider ) {
        echo "true";
    } else {
        echo "false";
    }
}



  if (isset($_POST['action']) && $_POST['action'] == 'delete'){

    $pubdelete = "delete from about_content where id='".$_POST['id']."'";
    $pub_data = $crud->execute($pubdelete);

     if ($pub_data){
       		echo "true";
         }else{
         	echo "false";
         }
 }

 
  ?>