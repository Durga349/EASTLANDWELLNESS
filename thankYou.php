<!DOCTYPE html>
<html>
<?php include('includes/header.php');
include('includes/functions.php');
$transId = $_REQUEST['tId'];
$transDate = $_REQUEST['date'];
$transStatus = $_REQUEST['stus'];

if (!$_SESSION['orderID'] || !$_SESSION['cartID']){
	header("location:index");
}

$ordersUpdateQry = "UPDATE orders SET transaction_id ='".$transId."', transactiondate ='".$transDate."', payment_status='".$transStatus."' WHERE order_id='".$_SESSION['orderID']."'";
$ordersUpdateData = $crud->execute($ordersUpdateQry);


$sel_Bid = "SELECT * FROM orders WHERE order_id = '".$_SESSION['orderID']."'";
$Bid_data = $crud->getData($sel_Bid);
// exit;

$Bill_Id = $Bid_data[0]['billing_id'];
$odrsId = $Bid_data[0]['id'];

 $UpdateOrderStatus = "UPDATE cart SET status = 0 WHERE cart.cart_id IN ( SELECT c.cart_id FROM orders o JOIN orderitems oi ON o.id = oi.order_id JOIN orderitemmeta om ON oi.order_item_id = om.order_item_id LEFT JOIN cart c ON c.cart_id = o.cart_id LEFT JOIN products p ON p.id = c.item_id WHERE oi.order_id = '".$odrsId."' AND om.meta_key = 'ProductCode' AND c.prod_code = om.meta_value )";

$ResOrderStatus = $crud->execute($UpdateOrderStatus);

if($Bid_data[0]['transactiondate'] == ''){
	$Bid_data[0]['transactiondate'] = date("Y-m-d");
}

if($Bid_data[0]['shipping_amount'] == 0){
	$shipAmount = "Free";
}else{
	$shipAmount = "$ ".$Bid_data[0]['shipping_amount'];
}
$Sel_BillAdrs = "SELECT * FROM billing_address where id ='".$Bill_Id."'";
$BillAdrs_Data = $crud->getData($Sel_BillAdrs);

$custEmail = $BillAdrs_Data[0]['email'];
$custName  = $BillAdrs_Data[0]['first_name']." ";
$custName  .= $BillAdrs_Data[0]['last_name'];

$admEmailQry = "SELECT * FROM shop_settings WHERE meta_key = 'sales_order_email'";
$admEmailData = $crud->getData($admEmailQry);

$sel_prod = "SELECT o.shipping_type,o.payment_type,p.price,p.vat_rate,c.quantity,oi.order_item_id,o.total_amount,o.shipping_amount, MAX(CASE WHEN om.meta_key = 'ProductID' THEN om.meta_value END) AS ProductID, MAX(CASE WHEN om.meta_key = 'ProductName' THEN om.meta_value END) AS ProductName, MAX(CASE WHEN om.meta_key = 'ProductImage' THEN om.meta_value END) AS ProductImage, MAX(CASE WHEN om.meta_key = 'Quantity' THEN om.meta_value END) AS Quantity FROM orders o JOIN orderitems oi ON o.id = oi.order_id JOIN orderitemmeta om ON oi.order_item_id = om.order_item_id  left join cart as c on c.cart_id = o.cart_id left join products as p on p.id = c.item_id WHERE oi.order_id = '".$odrsId."' GROUP BY oi.order_item_id";
// exit;
$prod_data = $crud->getData($sel_prod);

$rawImG = str_replace("../", "", $prod_data[0]['ProductImage']);
$ImG = "https://eastland-wellness.com/EadminWellLand/".$rawImG;

?>
<body id="page_content">
<?php include('includes/navbar.php'); ?>

<section id="paymentSuccess" style="margin-top: 50px;">
	<div class="container">
		<div class="row">
			<h3>Thank You for Your Order</h3>
			<div class="col-md-8 mt-2">
				<div class="card">
					<div class="card-header">
						<h5>Order Details</h5>
					</div>
					<div class="card-body">
						<div class="row my-3">
							<div class="col-3">Order ID</div>
							<div class="col-9"><b><?php echo $_SESSION['orderID']; ?></b></div>
						</div>
						<div class="row mb-3">
							<div class="col-3">Order Date</div>
							<div class="col-9"><b><?php echo $Bid_data[0]['transactiondate']; ?></b></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 mt-2">
				<div class="card">
					<div class="card-header">
						<h5>Billing Information</h5>
					</div>
					<div class="card-body">
						<p style="margin-bottom: 0px;">
							<?php echo $custName; ?>, <br>
							<?php echo $BillAdrs_Data[0]['address']; ?>, <br>
							<?php echo $BillAdrs_Data[0]['city'].','.$BillAdrs_Data[0]['state'].','.$BillAdrs_Data[0]['zip_code']; ?> <br>
							<?php echo $custEmail; ?><br>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-12 mt-3">
				<table class="table table-bordered">
					<thead>
						<th class="text-center">Product Image</th>
						<th>Product Name</th>
						<th class="text-center">Quantity</th>
						<th>Price</th>
					</thead>
					<tbody>
				        <?php foreach ($prod_data as $row) :
				                $prodImg = str_replace("../", "", $row['ProductImage']);
				                $itemPrice = product($row['price'], $row['vat_rate'])
				              ?>
				            <tr>
				                <td class="text-center"><img src="http://eastland-wellness.com/EadminWellLand/<?php echo $prodImg; ?>" alt="img" width="100" height="100">
				                </td>
				                <td>
				                    <?php echo $row['ProductName']; ?>
				                </td>
				                <td class="text-center">
				                   <?php echo $row['Quantity']; ?>
				                   
				                </td>
				                <td>$ <?php echo $itemPrice * $row['Quantity']; ?></td>
				              
				            </tr>
				        <?php endforeach; ?>
						

						<tr>
							<td colspan="2" rowspan="3"></td>
							<td>Sub Total</td>
							<td>$ <?php echo $Bid_data[0]['total_amount']; ?></td>
						</tr>
						<tr>
							<td>Shipping Charges</td>
							<td><?php echo $shipAmount; ?></td>
						</tr>
						<tr>
							<td><b>Total</b></td>
							<td><b>$ <?php echo $Bid_data[0]['total_amount'] + $Bid_data[0]['shipping_amount']; ?></b></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<?php include('includes/footer.php'); 

$Saddress = "";
$Saddress .= $BillAdrs_Data[0]['address'].',<br>';
$Saddress .= $BillAdrs_Data[0]['city'].',<br>';
$Saddress .= $BillAdrs_Data[0]['state'].',<br>';
$Saddress .= $BillAdrs_Data[0]['zip_code'];

foreach ($prod_data as $row){

	$rawImG1 = str_replace("../", "", $row['ProductImage']);
	$ImG1 = "https://eastland-wellness.com/EadminWellLand/".$rawImG1;
 $itemPrice1 = product($row['price'], $row['vat_rate']);

	$orderproducts .= '<tr>
  <td height="20">&nbsp;</td>
</tr>
<tr>
  <td>
    <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center">
      <tbody>
        <tr>
          <td width="130"><img width="130" style="display:block;width:100%;max-width:130px;" alt="img" src="'.$ImG1.'"></td>
          <td width="20">&nbsp;</td>
          <td width="250">
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td style="font-family:\'Josefin Sans\', Arial, Helvetica, sans-serif;font-size: 18px;color: #282828;line-height: 21px;">
                  '.$row['ProductName'].'</td>
                </tr>
                <tr>
                  <td style="font-family:\'Open Sans\', Arial, Helvetica, sans-serif;font-size: 14px;color: #282828;line-height: 21px;">Quantity : '.$row['Quantity'].'</td>
                </tr>
              </tbody>
            </table>
          </td>
          <td>&nbsp;</td>
          <td align="right" width="60">
            <table border="0" width="60" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td align="right" style="font-family:\'Open Sans\', Arial, Helvetica, sans-serif;font-size: 18px;color: #282828;">$'.$itemPrice1*$row['Quantity'].'</td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
</tr>
<tr>
  <td height="20" style="border-bottom: 1px solid #e0e0e0">&nbsp;</td>
</tr>';
}

$message   = file_get_contents('email-template.html');
$message1  = file_get_contents('email-template.html');

$message   = str_replace("{ProductsLoopRow}", $orderproducts, $message);
$message   = str_replace("{Title}", 'Order Confirmation', $message);
$message   = str_replace("{TagLine}", 'Thanks for your purchase. We\'ll send tracking info when your order ships.', $message);
$message   = str_replace("{orderNo}", $_SESSION['orderID'], $message);
$message   = str_replace("{subTotal}", $Bid_data[0]['total_amount'], $message);
$message   = str_replace("{shippingAmount}", $shipAmount, $message);
// $message   = str_replace("{vatAmount}", $Bid_data[0]['tax_amount'], $message);
$message   = str_replace("{totalAmount}", $Bid_data[0]['total_amount'] + $Bid_data[0]['shipping_amount'], $message);
$message   = str_replace("{shippingAddress}", $Saddress, $message);
$message   = str_replace("{shippingType}", ucfirst($prod_data[0]['shipping_type']), $message);
$message   = str_replace("{paymenyMethod}", ucfirst($prod_data[0]['payment_type']), $message);
$message   = str_replace("{userEmail}", $custEmail, $message);


$message1   = str_replace("{ProductsLoopRow}", $orderproducts, $message1);
$message1   = str_replace("{Title}", 'New Order Confirmed', $message1);
$message1   = str_replace("{TagLine}", ' ', $message1);
$message1   = str_replace("{orderNo}", $_SESSION['orderID'], $message1);
$message1   = str_replace("{subTotal}", $Bid_data[0]['total_amount'], $message1);
$message1   = str_replace("{shippingAmount}", $shipAmount, $message1);
// $message1   = str_replace("{vatAmount}", $Bid_data[0]['tax_amount'], $message1);
$message1   = str_replace("{totalAmount}", $Bid_data[0]['total_amount'] + $Bid_data[0]['shipping_amount'], $message1);
$message1   = str_replace("{shippingAddress}", $Saddress, $message1);
$message1   = str_replace("{shippingType}", ucfirst($prod_data[0]['shipping_type']), $message1);
$message1   = str_replace("{paymenyMethod}", ucfirst($prod_data[0]['payment_type']), $message1);
$message1   = str_replace("{userEmail}", $custEmail, $message1);

  $dataToSend = array(
          'subject' =>'Order Confirmation From Eastland-Wellness - '.$_SESSION['orderID'],
          'mail' => $custEmail,
          'content' => $message
        );
        // URL of the target page to receive the data
        $targetUrl = 'https://eastland-wellness.com/SMTP/mail.php';
        // Initialize cURL session
        $ch = curl_init($targetUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($dataToSend));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Execute the cURL request and get the response
         $response = curl_exec($ch);
        // Check for cURL errors
        if (curl_errno($ch)) {
          echo 'cURL Error: ' . curl_error($ch);
        }

  $dataToSend = array(
          'subject' =>'New Order Confirmed With Order ID - '.$_SESSION['orderID'],
          'mail' => $admEmailData[0]['meta_value'],
          'content' => $message1
        );
        // URL of the target page to receive the data
        $targetUrl = 'https://eastland-wellness.com/SMTP/mail.php';
        // Initialize cURL session
        $ch = curl_init($targetUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($dataToSend));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Execute the cURL request and get the response
         $response = curl_exec($ch);
        // Check for cURL errors
        if (curl_errno($ch)) {
          echo 'cURL Error: ' . curl_error($ch);
        }

// exit;
unset($_SESSION['orderID']);

if($_SESSION['UserID'] == 0) {
unset($_SESSION['cartID']);
}
?>

</body>
</html>