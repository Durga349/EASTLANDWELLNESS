 <?php 
session_start();
include("crudop/crud.php");
$crud = new Crud;

if(isset($_POST['submit']) && $_POST['submit'] == 'Save'){
if(!$_SESSION['username']){
  $user_id = 0;
}else{
  $user_id = 1;
}

$email         = isset($_POST['email'])?trim($_POST['email']):'';
$first_name    = isset($_POST['first_name'])?trim($_POST['first_name']):'';
$last_name     = isset($_POST['last_name'])?trim($_POST['last_name']):'';
$address       = isset($_POST['address'])?trim($_POST['address']):'';
$city          = isset($_POST['city'])?trim($_POST['city']):'';
$state         = isset($_POST['state'])?trim($_POST['state']):'';
$zip_code      = isset($_POST['zip_code'])?trim($_POST['zip_code']):'';
$ph_number     = isset($_POST['ph_number'])?trim($_POST['ph_number']):'';
$shipping_type = isset($_POST['shipping_type'])?trim($_POST['shipping_type']):'';
$payment_type  = isset($_POST['payment_type'])?trim($_POST['payment_type']):'';
$randomId      = uniqid(substr(0, 10));
$OrderNo = "EW" . substr(str_shuffle('0123456789'), 0,15);
$subTotal =$_POST['subTotal'];
$shippingAmountElement = $_POST['shippingAmountElement'];
$ProId =$_POST['ProId'];
$proCount =$_POST['proCount'];

if ($shippingAmountElement == 'Free'){
  $shippingAmountElement = 0;
}

  /* insert query  for billing address table */

  $insBillAdd = "INSERT INTO billing_address SET email = '".$email."',first_name = '".$first_name."', last_name = '".$last_name."', address = '".$address."', city = '".$city."', state = '".$state."', zip_code = '".$zip_code."', ph_number = '".$ph_number."',shipping_type ='".$shipping_type."', randomId = '".$randomId."'";
  $resBillAdd =$crud->insertLastId($insBillAdd);
   
 /* Insert query for shipping address table*/

  $insShipAdd ="INSERT INTO shipping_address SET billing_id ='".$resBillAdd."',address = '".$address."', city = '".$city."', state = '".$state."', zip_code = '".$zip_code."', randomId = '".$randomId."'";

  $resShipAdd =$crud->insertLastId($insShipAdd);

  /* Insert query for Orders table*/

  $insOrders="INSERT INTO orders SET order_id ='".$OrderNo."',billing_id ='".$resShipAdd."',shipping_id ='".$resShipAdd."',shipping_type ='".$shipping_type."',user_id = '".$user_id."', cart_id ='".$_SESSION['cartID']."',payment_type ='".$payment_type."',shipping_amount ='".$shippingAmountElement."', total_amount ='".$subTotal."',randomId ='".$randomId."'";

  $order_Id=$crud->insertLastId($insOrders);

  /* maintaining the orderID in session */

  $_SESSION['orderID'] = $OrderNo;

  /*defining the function for ordermeta table */

 function insertRows($tableName, $orderItemId, $metaKey, $metaValue, $randomId, $crud) {
    $insOrderMeta = "INSERT INTO ".$tableName." SET order_item_id = '" . $orderItemId . "', meta_key  = '" . $metaKey . "', meta_value = '" . $metaValue . "', randomId = '" . $randomId . "'";
  $resOrderMeta = $crud->execute($insOrderMeta);

   
 }

  for ($i = 0; $i < $proCount; $i++) {

    /* Getting data form cart and products table */

    $selProduct="select c.quantity,p.prod_name,c.* from cart  as c left join products as p on c.item_id=p.id where c.cart_id ='".$_SESSION['cartID']."'";
    $resProduct=$crud->getData($selProduct);
    $prodCode = isset($resProduct[$i]['prod_code']) && $resProduct[$i]['prod_code'] != '' ? $resProduct[$i]['prod_code'] : '';
    $Quantity = isset($resProduct[$i]['quantity']) && $resProduct[$i]['quantity'] != '' ? $resProduct[$i]['quantity'] : '';
    
    $randomid = $randomId . $i;
    $prodName = $resProduct[$i]['prod_name'];
    $cartId = $_SESSION['cartID'];

    /* insert query for orderitems table */

    $insOrderItem = "INSERT INTO orderitems SET order_id = '" . $order_Id . "', order_item_name = '" . $prodName . "', cart_id = '" . $cartId . "', randomId = '" . $randomid . "'";
    
    $orderItemId = $crud->insertLastId($insOrderItem);


   if ($prodName !== '') {
        $metaKey = 'ProductName';
        $metaValue = $prodName;
        insertRows('orderitemmeta', $orderItemId, $metaKey, $metaValue, $randomId, $crud);
    }
    if ($prodCode !== '') {
        $metaKey = 'ProductCode';
        $metaValue = $prodCode;
        insertRows('orderitemmeta', $orderItemId, $metaKey, $metaValue, $randomId, $crud);
    }
    if ($Quantity !== '') {
        $metaKey = 'Quantity';
        $metaValue = $Quantity;
        insertRows('orderitemmeta', $orderItemId, $metaKey, $metaValue, $randomId, $crud);
    }
    if ($shipping_type !== '') {
        $metaKey = 'ShippingType';
        $metaValue = $shipping_type;
        insertRows('orderitemmeta', $orderItemId, $metaKey, $metaValue, $randomId, $crud);
    }
    if ($shippingAmountElement !== '') {
        $metaKey = 'ShippingAmount';
        $metaValue = $shippingAmountElement;
        insertRows('orderitemmeta', $orderItemId, $metaKey, $metaValue, $randomId, $crud);
    }
    
   
  }


  if($resBillAdd && $resShipAdd && $order_Id && $orderItemId){
    echo "true";
  }else{
    echo "false";
  }
}


 ?>