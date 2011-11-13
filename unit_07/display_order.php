<?xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<?php
require_once(dirname(__FILE__) . "/order.php");

$items["customer"] = $_POST['customer'];
$items["pbr_q"]    = $_POST['pbr'];
$items["coors_q"]  = $_POST['coors'];
$items["ts_q"]     = $_POST['trout_slayer'];
$items["pbr_s"]    = $_POST['pbr_size'];
$items["coors_s"]  = $_POST['coors_size'];
$items["ts_s"]     = $_POST['ts_size'];
$items["time"]     = date("F j, Y, g:i a");

$order = new Order($items);

if (($items['pbr_q'] > 0) || ($items['coors_q'] > 0) || ($items['ts_q'] > 0)) {
  $order->writeOrder("orders.csv");
}

$arr = $order->getOrders("orders.csv");
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="screen.css" />
	<title>Chad's Order Page</title>
</head>
<body>
	<div class="container">
	  <div class="nav">
	    <a href="index.php">Place an Order</a>
	    <a href="all_orders.php">View All Orders</a>
	  </div>
		<h1>Chad's Beer Shop</h1>
		<h2>All Orders</h2>
		<p>Order processed at <?php echo date("F j, Y, g:i a"); ?></p>
		<p><?php echo $order->displayCustomer() ?>'s Order Contains:</p>
		<div class="order">
			<?php
				if ($order->ifPbr()) {
			?>
			<p><?php echo $order->displayPbr() ?></p>
			<?php
				}
			?>
			
			<?php
				if ($order->ifCoors()) {
			?>
			<p><?php echo $order->displayCoors() ?></p>
			<?php
				}
			?>
			
			<?php
				if ($order->ifTS()) {
			?>
			<p><?php echo $order->displayTS() ?></p>
			<?php
				}
			?>
		</div>
		<p>Your sub total is: <?php echo '$'.number_format($order->getSubTotal(), 2) ?></p>
		<p>Your total with tax is: <?php echo '$'.number_format($order->getTotal(), 2) ?></p>
	</div>
</body>