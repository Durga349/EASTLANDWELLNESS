<?php
include("crudop/crud.php");
$crud = new Crud;
$tableName = 'cart';

session_start(); 

$hid_id = isset($_POST['hid_id']) ? trim($_POST['hid_id']) : '';
$quantity = isset($_POST['quantity']) ? trim($_POST['quantity']) : '';
$hidProdCode = isset($_POST['hidProdCode']) ? trim($_POST['hidProdCode']) : '';
$randomId = uniqid(substr(0, 10));
$cart_ID = 0;

if (isset($_SESSION['cartID'])) 
{
    $cart_ID = $_SESSION['cartID'];
} 
else 
{
    $maxIdQuery = "SELECT MAX(cart_id) AS max_id FROM " . $tableName;
    $maxIdResult = $crud->getData($maxIdQuery);

    if (!empty($maxIdResult)) {
        $cart_ID = $maxIdResult[0]['max_id'] + 1;
    } else {
        $cart_ID = 1;
    }

    $_SESSION['cartID'] = $cart_ID;
}

if (isset($_POST['action']) && $_POST['action'] == 'save') 
{
   $select_query = "SELECT * FROM " . $tableName . " WHERE item_id = '" . $hid_id . "' AND cart_id = '" . $cart_ID . "'";
   $result_query = $crud->getData($select_query);

    if (count($result_query) > 0)
    {
        $update_query = "UPDATE " . $tableName . " SET quantity = quantity + " . $quantity . " WHERE item_id = '" . $hid_id . "' AND cart_id = '" . $cart_ID . "'";
        $update_result = $crud->execute($update_query);

        if ($update_result) 
        {
            echo "true";
        } else {
            echo "false";
        }
    } 
    else 
    {
      $ins_reg = "INSERT INTO " . $tableName . " SET cart_id = '" . $cart_ID . "', prod_code = '" . $hidProdCode . "', item_id = '" . $hid_id . "', quantity = '" . $quantity . "', randomId = '" . $randomId . "'";
      $reg_data = $crud->execute($ins_reg);

       if ($reg_data) 
       {
        echo "true";
       }
       else 
       {
            echo "false";
       }
    }
}

if (isset($_POST['Submit']) && $_POST['Submit'] == 'Save') 
{
    /*insert query for cart table*/
    
    $insBuyProduct = "INSERT INTO " . $tableName . " SET cart_id = '" . $cart_ID . "', prod_code = '" . $hidProdCode . "', item_id = '" . $hid_id . "', quantity = '" . $quantity . "', randomId = '" . $randomId . "'";
    $resBuyProduct = $crud->execute($insBuyProduct);

    if ($resBuyProduct) 
    {
      echo "true";
    } 
    else 
    {
        echo "false";
    }
}


if (isset($_POST['action']) && $_POST['action'] == 'delete') 
{
    $id = $_POST['id'];
    $selDis = "delete from " . $tableName . " where id='" . $id . "'";
    $resSel = $crud->execute($selDis);

    if ($resSel) 
    {
    echo "true";
    } 
    else 
    {
        echo "false";
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'update_cart') 
{
    $quantity = isset($_POST['quantity']) ? trim($_POST['quantity']) : '';
    $id = $_POST['id'];

    $up_data = "update  " . $tableName . " set quantity ='" . $quantity . "'where id='" . $id . "'";
    $resSel = $crud->execute($up_data);

    if ($resSel) 
    {
        echo "true";
    } 
    else 
    {
        echo "false";
    }
}
?>
