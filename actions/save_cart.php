<?php
include("../crudop/crud.php");
$crud = new Crud;
$tableName = 'cart';

session_start(); 
// print_r($_SESSION);
//  exit;
        $UserID = isset($_SESSION['UserID']) ? $_SESSION['UserID'] : 0;
        $hid_id = isset($_POST['hid_id']) ? trim($_POST['hid_id']) : '';
        $quantity = isset($_POST['quantity']) ? trim($_POST['quantity']) : '';
        $hidProdCode = isset($_POST['hidProdCode']) ? trim($_POST['hidProdCode']) : '';
        $randomId = uniqid(substr(0, 10));
        $cart_ID = 0;
     
        if (isset($_SESSION['cartID'])) 
        {
            $cart_ID = $_SESSION['cartID'];
        }else 
            {   
                // here  maintain maxid in session 
                $maxIdQuery = "SELECT MAX(cart_id) AS max_id FROM ".$tableName." ";
                 
                $maxIdResult = $crud->getData($maxIdQuery);


                if (!empty($maxIdResult)) 
                {
                    $cart_ID = $maxIdResult[0]['max_id'] + 1;
                // exit;
                } 
                else 
                {
                     $cart_ID = 1;
                   
                }
                // maintain the cart id in session
                $_SESSION['cartID'] = $cart_ID;
            }

//  insert query for cart table form Add to cart

if (isset($_POST['action']) && $_POST['action'] == 'save') 
{

        $select_query = "SELECT * FROM " . $tableName . " WHERE item_id = '" . $hid_id . "' AND cart_id = '" . $cart_ID . "'";
        $result_query = $crud->getData($select_query);

        if (count($result_query) > 0) 
        {
           // update the Quantity in cart table
             $update_query = "UPDATE " . $tableName . " SET quantity = quantity + " . $quantity . " WHERE item_id = '" . $hid_id . "' AND cart_id = '" . $cart_ID . "'";
            $update_result = $crud->execute($update_query);

            if ($update_result) 
            {
             echo "true";
            }else {
                echo "false";
            }
        } else 
            {
                // there is no items in cart table the products will be inserting

               $ins_reg = "INSERT INTO " . $tableName . " SET cart_id = '" . $cart_ID . "',user_id = '" . $UserID . "', prod_code = '" . $hidProdCode . "', item_id = '" . $hid_id . "', quantity = '" . $quantity . "', randomId = '" . $randomId . "'";
              $reg_data = $crud->execute($ins_reg);

                if ($reg_data) 
                {
                    echo "true";
                }else {
                    echo "false";
                }
            }
}

//  insert query for cart table form Buynow

// if (isset($_POST['Submit']) && $_POST['Submit'] == 'Save') 
// {
  

//         $select_buyquery = "SELECT * FROM " . $tableName . " WHERE item_id = '" . $hid_id . "' AND cart_id = '" . $cart_ID . "'";
//         $result_buyquery = $crud->getData($select_buyquery);

//         if (count($result_buyquery) > 0) 
//         {
//            // update the Quantity in cart table
//             $update_buyquery = "UPDATE " . $tableName . " SET quantity = quantity + " . $quantity . " WHERE item_id = '" . $hid_id . "' AND cart_id = '" . $cart_ID . "'";
//             $update_buyresult = $crud->execute($update_buyquery);

//             if ($update_buyresult) 
//             {
//              echo "true";
//             }else {
//                 echo "false";
//             }
//         } else 
//             {
//                 // there is no items in cart table the products will be inserting

//                $insBuyProduct = "INSERT INTO " . $tableName . " SET cart_id = '" . $cart_ID . "',user_id = '" . $UserID . "',prod_code = '" . $hidProdCode . "', item_id = '" . $hid_id . "', quantity = '" . $quantity . "', randomId = '" . $randomId . "'";
//                 $resBuyProduct = $crud->execute($insBuyProduct);

//                 if ($resBuyProduct) 
//                 {
//                     echo "true";
//                 }else{
//                     echo "false";
//                 }
//             }
      
// }

//delete query for cart table

if (isset($_POST['action']) && $_POST['action'] == 'delete') 
{
        $id = $_POST['id'];
        $selDis = "delete from " . $tableName . " where id='" . $id . "'";
        $resSel = $crud->execute($selDis);

        if ($resSel)
        {
            echo "true";
        }else{
            echo "false";
        }
}

//update query in cart page for cart table 

if (isset($_POST['action']) && $_POST['action'] == 'update_cart') 
{
    
        $quantity = isset($_POST['quantity']) ? trim($_POST['quantity']) : '';
        $id = $_POST['id'];

        $up_data = "update  " . $tableName . " set quantity ='" . $quantity . "'where id='" . $id . "'";
        $resSel = $crud->execute($up_data);

        if ($resSel) 
        {
            echo "true";
        }else{
            echo "false";
        }
}
?>
