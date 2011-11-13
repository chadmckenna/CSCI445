<?php
require_once(dirname(__FILE__) . "/beer.php");
require_once(dirname(__FILE__) . "/customer.php");
require_once(dirname(__FILE__) . "/order.php");
require_once(dirname(__FILE__) . "/order_item.php");

$images = array("images/image0.jpg", "images/image1.png", "images/image2.jpg", "images/image3.png", "images/image4.jpg");
shuffle($images);

$beer = new Beer();
$all_beers = $beer->getAll();
?>
<?xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="screen.css" />
	<script src="javascript/script.js"></script>
	<title>Chad's Party Purchase Page</title>
</head>
<body onload="random_images()">
	<div class="container">
	  <div class="nav">
	    <a href="all_orders.php">View All Orders</a>
	  </div>
		<h1>Chad's Beer Shop</h1>
		<div id="images">
	  <?php
	    for ($i = 0; $i < 3; $i++) {
	      echo "<img src='". $images[$i] ."' />";
	    }
	  ?>
		</div>
		<div id="prices">
		  <?php
		    while ($row = mysql_fetch_assoc($all_beers)) {
		      echo $row["name"] . " - $" . number_format($row["price"], 2) . ", ";
		    }
		  ?>
		</div>
		<form action="display_order.php" method="POST">
			<table>
			  <tr>
			    <td>Customer Name</td>
			    <td><input type="text" name="customer"></td>
			    <td></td>
			  </tr>
			  <tr>
			    <td></td>
			    <td></td>
			    <td></td>
			  </tr>
				<tr>
					<th>Beer</th>
					<th>Quantity</th>
					<th>Case Size</th>
				</tr>
				<tr>
					<td>Coors Banquet</td>
					<td>
						<input type="text" name="coors" />
					</td>
					<td>
						<select name="coors_size">
							<option value="6">6 Pack</option>
							<option value="12">12 Pack</option>
							<option value="18">18 Pack</option>
							<option value="24">24 Pack</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Pabst Blue Ribbon</td>
					<td>
						<input type="text" name="pbr" />
					</td>
					<td>
						<select name="pbr_size">
							<option value="6">6 Pack</option>
							<option value="12">12 Pack</option>
							<option value="18">18 Pack</option>
							<option value="24">24 Pack</option>
							<option value="30">30 Rack</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Trout Slayer</td>
					<td>
						<input type="text" name="ts" />
					</td>
					<td>
						<select name="ts_size">
							<option value="6">6 Pack</option>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>
						<input type="submit" value="submit" />
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>