<?php
include('../crudop/crud.php');
$crud = new Crud;

if(isset($_POST['action']) && $_POST['action'] == 'update'){
	 $update = "UPDATE shop_settings 
            SET meta_value = CASE 
                WHEN meta_key = 'free_shipping_charges' THEN '".$_POST['meta_value']."'
                WHEN meta_key = 'sales_order_email' THEN '".$_POST['meta_value']."'
                ELSE meta_value 
            END
            WHERE meta_key = '".$_POST['meta_key']."'";
    $upd_data = $crud->execute($update);

    if ($upd_data){
    	echo "true";
    }else{
    	echo "false";
    }
}
?>