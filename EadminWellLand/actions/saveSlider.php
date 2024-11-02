<?php
   include_once("../crudop/crud.php");
    $crud = new Crud();

    session_start();
    $tableName ="slider";
    $tableName1 ="qualifications";

    extract($_POST);


    
    $description  = isset($description) ? $description : '';
   
    $old_image  = isset($old_image) ? $old_image : '';
    $hdn_id  = isset($hdn_id) ? $hdn_id : '';
   
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
    }else{
              $image = $old_image;
           }

  if (isset($_POST['action']) && $_POST['action'] == 'save'){ 

 $save_slider = "insert into slider set description='".$description."',image='".$image."', randomId='".$randomId."'";
   
$res_slider = $crud->execute($save_slider);

        
          if ($res_slider){
     		echo "true";
       }else{
       	echo "false";
       }
 }
 //    show 

  if (isset($_POST['action']) && $_POST['action'] == 'show'){          
         $slidershow = "select * from slider order by id desc"; 
        $slider_showdata = $crud->getData($slidershow);       

       $response = array(
        "draw" => 1,
        "recordsTotal" => count($slider_showdata),
        "data" => $slider_showdata
    );

    echo json_encode($response);
 }




if (isset($_POST['action']) && $_POST['action'] == 'update') {
    
    $up_slider = "UPDATE slider SET  description='".$description."',image='".$image."' WHERE randomId='$hdn_id';";
     $up_reslider = $crud->execute($up_slider);

   if ($up_reslider ) {
        echo "true";
    } else {
        echo "false";
    }
}



  if (isset($_POST['action']) && $_POST['action'] == 'delete'){

    $pubdelete = "delete from slider where id='".$_POST['id']."'";
    $pub_data = $crud->execute($pubdelete);

     if ($pub_data){
       		echo "true";
         }else{
         	echo "false";
         }
 }

 
  ?>