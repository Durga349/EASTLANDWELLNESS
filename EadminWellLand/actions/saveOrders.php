<?php 
session_start();

include_once("../crudop/crud.php");
$crud = new Crud();
$tableName = 'orders';
extract($_POST);


$order_id         = isset($_POST['order_id'])?trim($_POST['order_id']):'';
$transactiondate   = isset($_POST['transactiondate'])?trim($_POST['transactiondate']):'';
$transaction_id      =isset($_POST['transaction_id'])?trim($_POST['transaction_id']):'';
$payment_type      =isset($_POST['payment_type'])?trim($_POST['payment_type']):'';
$total_amount      =isset($_POST['total_amount'])?trim($_POST['total_amount']):'';


$hdn_id      = isset($_POST['hdn_id'])?trim($_POST['hdn_id']):'';

$randomId    = uniqid(substr(0, 10));





if(isset($_POST["action"]) && $_POST['action'] == 'show'){

     $sql_show = "SELECT c.customer_type,ba.email,ba.first_name,o.*,(o.total_amount + o.shipping_amount) as TotalWithShipping from orders as o left join billing_address as ba on ba.id=o.billing_id left join customers as c on c.id =o.user_id ORDER BY id DESC";
 
    $show_data = $crud->getData($sql_show);        
       $response = array(
        "draw" => 1,
        "recordsTotal" => count($show_data),
        "data" => $show_data
    );
    echo json_encode($response);
}



if (isset($_POST['action']) && $_POST['action'] == 'update'){   
      
  $Upd_Data = "UPDATE ".$tableName."  SET  title = '".$title."',description = '".$description."',image = '".$image."'  WHERE randomId ='".$hdn_id."'";

  $Upd_res = $crud->execute($Upd_Data);

   if ($Upd_res) {
        echo "true";
   }else{
        echo"false";
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