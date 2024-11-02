<?php 
session_start();

include_once("../crudop/crud.php");
$crud = new Crud();

$tableName = 'vat_rates';

$vat_title   = isset($_POST['vat_title'])?trim($_POST['vat_title']):'';
$vat_rate    = isset($_POST['vat_rate'])?trim($_POST['vat_rate']):'';

$hdn_id      = isset($_POST['hdn_id'])?trim($_POST['hdn_id']):'';

$randomId    = uniqid(substr(0, 10));

if(isset($_POST['action']) && $_POST['action'] == 'save'){

  $insCatg = "insert into ".$tableName." set vat_title = '".$vat_title."', vat_rate = '".$vat_rate."', randomId = '".$randomId."'";

    $catgData = $crud->execute($insCatg);

    if ($catgData){
        echo "true";
    }else{
        echo "false";
    }
}


if(isset($_POST["action"]) && $_POST['action'] == 'Display'){

    $sql_show = "SELECT * FROM `vat_rates` order by id desc";
 
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
      
    $Upd_Data = "UPDATE ".$tableName."  SET vat_title = '".$vat_title."', vat_rate = '".$vat_rate."' WHERE randomId ='".$hdn_id."' ";

   $Upd_res = $crud->execute($Upd_Data);
   if ($Upd_res) {
        echo "true";
   }else{
        echo"false";
   }
}

if (isset($_POST['action']) && $_POST['action'] == 'StatusChange'){

        $Update_status ="update vat_rates set status = 0";
        $Status_data = $crud->execute($Update_status);

        $Upd_Status = "UPDATE vat_rates SET status='".$_POST['status']."' WHERE id='".$_POST['id']."'";
//exit;
        $Status_data = $crud->execute($Upd_Status);

        if ($Status_data){
            echo "true";
        }else{
            echo "false";
        }

}

?>