<?php 
session_start();

include_once("../crudop/crud.php");
$crud = new Crud();
$tableName = 'customers';

if(isset($_POST["action"]) && $_POST['action'] == 'Display'){

    $sql_show = "SELECT * FROM customers where customer_type='Normal' order by id  desc";
 
    $show_data = $crud->getData($sql_show);        
       $response = array(
        "draw" => 1,
        "recordsTotal" => count($show_data),
        "data" => $show_data
    );
    echo json_encode($response);
}

?>