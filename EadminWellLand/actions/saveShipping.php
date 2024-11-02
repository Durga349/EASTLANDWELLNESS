<?php 
session_start();

include_once("../crudop/crud.php");
$crud = new Crud();
$tableName = 'shipping';

$shipping_type   = isset($_POST['shipping_type'])?trim($_POST['shipping_type']):'';
$shipping_amount   = isset($_POST['shipping_amount'])?trim($_POST['shipping_amount']):'';

$hdn_id      = isset($_POST['hdn_id'])?trim($_POST['hdn_id']):'';

$randomId    = uniqid(substr(0, 10));

if(isset($_POST['action']) && $_POST['action'] == 'save'){

   $ins_ship = "insert into ".$tableName." set shipping_type = '".$shipping_type."',shipping_amount = '".$shipping_amount."', randomId = '".$randomId."'";

   $shipData = $crud->execute($ins_ship);

    if ($shipData){
        echo "true";
    }else{
        echo "false";
    }
}


if(isset($_POST["action"]) && $_POST['action'] == 'Display'){

    $sql_show = "SELECT * FROM `shipping`  order by id desc";
 
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
      
    $Upd_Data = "UPDATE ".$tableName."  SET shipping_type = '".$shipping_type."',shipping_amount = '".$shipping_amount."'WHERE randomId ='".$hdn_id."' ";

   $Upd_res = $crud->execute($Upd_Data);
   if ($Upd_res) {
        echo "true";
   }else{
        echo"false";
   }
}

?>