<?xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<?php
require_once(dirname(__FILE__) . "/beer.php");
require_once(dirname(__FILE__) . "/customer.php");
require_once(dirname(__FILE__) . "/order.php");
require_once(dirname(__FILE__) . "/order_item.php");

$customer           = new Customer();
$customer->name     = $_POST['customer'];
$customer->save();

$order              = new Order();
$order->customer_id = $customer->getId();
if ($_POST['pbr'] == 0 && $_POST['coors'] == 0 && $_POST['ts'] == 0) {
  echo "Here";
} else {
  $order->save();
}

$pbr                = new Order_Item();
$pbr->order_id      = $order->getId();
$pbr->beer_id       = 1;
$pbr->count         = $_POST['pbr'] * $_POST['pbr_size'];
if ($pbr->count != 0) {
  $pbr->save();
}

$coors              = new Order_Item();
$coors->order_id    = $order->getId();
$coors->beer_id     = 2;
$coors->count       = $_POST['coors'] * $_POST['coors_size'];
if ($coors->count != 0) {
  $coors->save();
}

$trout_s            = new Order_Item();
$trout_s->order_id  = $order->getId();
$trout_s->beer_id   = 3;
$trout_s->count     = $_POST['ts'] * $_POST['ts_size'];
if ($trout_s->count != 0) {
  $trout_s->save();
}

$pbr_beer           = new Beer(1);
$coors_beer         = new Beer(2);
$ts_beer            = new Beer(3);

$order->sub_total   = ($pbr_beer->price * $pbr->count) + ($coors_beer->price * $coors->count) + ($ts_beer->price * $trout_s->count);
$order->total       = $order->sub_total * 1.07;
if ($order->total != 0) {
  $order->save();
}
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
		<p><?php echo $customer->name ?>'s Order Contains:</p>
		<div class="order">
			<?php
				if ($pbr->count != 0) {
			?>
			<p><?php echo $pbr_beer->name . " - " . $pbr->count . " beers" ?></p>
			<?php
				}
			?>
			
			<?php
				if ($coors->count != 0) {
			?>
			<p><?php echo $coors_beer->name . " - " . $coors->count . " beers" ?></p>
			<?php
				}
			?>
			
			<?php
				if ($trout_s->count != 0) {
			?>
			<p><?php echo $ts_beer->name . " - " . $trout_s->count . " beers" ?></p>
			<?php
				}
			?>
		</div>
		<p>Your sub total is: <?php echo '$'.number_format($order->sub_total, 2) ?></p>
		<p>Your total with tax is: <?php echo '$'.number_format($order->total, 2) ?></p>
	</div>
</body>