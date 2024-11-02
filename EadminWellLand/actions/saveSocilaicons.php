<?php
session_start();
include_once("../crudop/crud.php");
$crud = new Crud();
$tableName = "socialicons";

$SelSocailicons = "select title from icons order by id asc";
$Resocailiocns = $crud->getData($SelSocailicons);
$count = count($Resocailiocns);

if (isset($_POST['action']) && $_POST['action'] == 'save') {
    for ($i = 0; $i < $count; $i++) {
        $title = $_POST['title'][$i];
        $links = $_POST['link'][$i];

         $saveSocial = "insert into socialicons set title ='".$title."', link='" . $links . "'";
         $resSocial = $crud->execute($saveSocial);

     }

        if ($resSocial) {
            echo "true";
        } else {
            echo "false";
        }
    
}

if(isset($_POST["action"]) && $_POST['action'] == 'show'){

    $sql_show = "SELECT * FROM `socialicons` order by id desc";
 
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

    $links  = $_POST['link'];
   $hdn_id      = isset($_POST['hdn_id'])?trim($_POST['hdn_id']):'';

      
    echo $Upd_Data = "UPDATE ".$tableName."  SET  link = '".$links."' WHERE id ='".$hdn_id."' ";

    //$Upd_res = $crud->execute($Upd_Data);


   if ($Upd_res) {
        echo "true";
   }else{
        echo"false";
   }
}

?>
