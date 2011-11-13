<?xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<?php
include(dirname(__FILE__) . "/order.php");

$grand_total = 0;

$orders = Order::getOrders("orders.csv");
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="screen.css" />
	<title>Chad's Orders Page</title>
</head>
<body>
	<div class="container">
	  <div class="nav">
      <a href="index.html">Place an Order</a>
    </div>
		<h1>Chad's Beer Shop</h1>
		<h2>All Orders</h2>
		<div class="order">
			<?php
			$size = count($orders);
			if ($size == 0 || $orders == 0) {
			  echo "<h3>There are no orders in the database.</h3>";
			}
			for ($i = 0; $i < $size; $i++) {
			  echo '<p>'.$orders[$i]->displayFullOrder().'</p>';
			  $grand_total += $orders[$i]->getTotal();
			}
			?>
		</div>
		<p>Grand Total: <?php echo '$'.number_format($grand_total, 2) ?></p>
	</div>
</body>