<?php 
session_start();

include_once("../crudop/crud.php");
$crud = new Crud();
$tableName = 'categories';

$catg_name   = isset($_POST['catg_name'])?trim($_POST['catg_name']):'';

$hdn_id      = isset($_POST['hdn_id'])?trim($_POST['hdn_id']):'';

$randomId    = uniqid(substr(0, 10));

if(isset($_POST['action']) && $_POST['action'] == 'save'){

  $insCatg = "insert into ".$tableName." set catg_name = '".$catg_name."', randomId = '".$randomId."'";

    $catgData = $crud->execute($insCatg);

    if ($catgData){
        echo "true";
    }else{
        echo "false";
    }
}


if(isset($_POST["action"]) && $_POST['action'] == 'Display'){

    $sql_show = "SELECT * FROM `categories`  order by id desc";
 
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
      
    $Upd_Data = "UPDATE ".$tableName."  SET catg_name = '".$catg_name."' WHERE randomId ='".$hdn_id."' ";

   $Upd_res = $crud->execute($Upd_Data);
   if ($Upd_res) {
        echo "true";
   }else{
        echo"false";
   }
}

?>