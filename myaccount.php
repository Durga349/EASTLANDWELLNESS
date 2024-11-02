<!DOCTYPE html>
<html>
<?php include('includes/header.php');

//Should Write Select query to display your order details

$sel_Bid = "SELECT * FROM orders WHERE user_id = '".$_SESSION['UserID']."'";
$Bid_data = $crud->getData($sel_Bid);

$Bill_Id = $Bid_data[0]['billing_id'];
$odrsId = $Bid_data[0]['id'];

  $sel_prod ="SELECT p.price,c.quantity,oi.order_item_id,o.total_amount,o.shipping_amount, MAX(CASE WHEN om.meta_key = 'ProductID' THEN om.meta_value END) AS ProductID, MAX(CASE WHEN om.meta_key = 'ProductName' THEN om.meta_value END) AS ProductName, MAX(CASE WHEN om.meta_key = 'ProductImage' THEN om.meta_value END) AS ProductImage, MAX(CASE WHEN om.meta_key = 'Quantity' THEN om.meta_value END) AS Quantity ,MAX(CASE WHEN om.meta_key = 'ProductCode' THEN om.meta_value END) AS ProductCode FROM orders o JOIN orderitems oi ON o.id = oi.order_id JOIN orderitemmeta om ON oi.order_item_id = om.order_item_id  left join cart as c on c.cart_id =o.cart_id left join products as p on p.id =c.item_id WHERE oi.order_id = '".$odrsId."' and o.user_id ='".$_SESSION['UserID']."' GROUP BY oi.order_item_id";
$prod_data = $crud->getData($sel_prod);

?>
<body id="page_content">
<?php include('includes/navbar.php'); ?>

<section id="paymentSuccess" style="margin-top: 50px;">
	<div class="container">
		<div class="row">
			<h1>My Orders</h1>
			<?php foreach ($prod_data as $row) {
				$row['ProductImage'] = str_replace('../', '', $row['ProductImage']);
    		$image = 'http://eastland-wellness.com/EadminWellLand/' . $row['ProductImage'];
    	?>
			<div class="col-md-1"></div>
			<div class="col-md-10 mt-2">
				<div class="card">
					<div class="card-body">
						<div class="row my-3">
						  <div class="col-3"><img src="<?php echo $image; ?>" height="100"></div>
						  <div class="col-3"><b><?php echo $row['ProductName']; ?></b><br>Product Code:
						  	<?php echo $row['ProductCode']; ?>
						  </div>
						  <div class="col-3">$<?php echo $row['total_amount'];  ?></div>  
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-1"></div>
			<?php } ?>
		</div>
	</div>
</section>

<?php include('includes/footer.php'); ?>

</body>
</html>