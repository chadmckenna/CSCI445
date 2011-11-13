<?xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<?php
require_once(dirname(__FILE__) . "/beer.php");
require_once(dirname(__FILE__) . "/customer.php");
require_once(dirname(__FILE__) . "/order.php");
require_once(dirname(__FILE__) . "/order_item.php");

$order = new Order();
$orders = $order->getAll();

?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="screen.css" />
	<title>Chad's Orders Page</title>
</head>
<body>
	<div class="container">
	  <div class="nav">
      <a href="index.php">Place an Order</a>
    </div>
		<h1>Chad's Beer Shop</h1>
		<h2>All Orders</h2>
		<div class="order">
			<?php
			$size = mysql_num_rows($orders);
			if ($size == 0) {
			  echo "<h3>There are no orders in the database.</h3>";
			} else {
			  while ($row = mysql_fetch_assoc($orders)) {
			    
			    echo "<div class=\"order\">";
			    $customer = new Customer($row['customer_id']);
			    echo "<p>" . $customer->name . " - </p>";
			   
			    $item = new Order_Item();
			    $items = $item->getAllByOrderId($row['id']);

			    echo "<div class=\"order-list\">";
			    while ($row2 = mysql_fetch_assoc($items)) {
			      $beer = new Beer($row2['beer_id']);
			      echo "<p>" . $beer->name . " - " . $row2['count'] . "</p>";
			    }
			    unset($item);
			    echo "</div>"; 
			    
			    echo "<p>Subtotal: $" . number_format($row['sub_total'], 2) . "</p>";
			    echo "<p>Total   : $" . number_format($row['total'], 2) . "</p>"; 
          
          echo "</div>";
		    }
			}
			?>
		</div>
	</div>
</body>