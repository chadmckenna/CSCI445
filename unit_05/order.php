<?xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<?php
$sub_total = 0;
$total = 0;

$pbr_quantity = $_POST['pbr'];
$coors_quantity = $_POST['coors'];
$ts_quantity = $_POST['trout_slayer'];

$pbr_size = $_POST['pbr_size'];
$coors_size = $_POST['coors_size'];
$ts_size = $_POST['ts_size'];

$sub_total = (.5 * $pbr_quantity * $pbr_size) + (.75 * $coors_quantity * $coors_size) + (1 * $ts_quantity * $ts_size);
$total = $sub_total * 1.07;
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="screen.css" />
	<title>Chad's Order Page</title>
</head>
<body>
	<div class="container">
		<h1>Chad's Beer Shop</h1>
		<h2>Your Order</h2>
		<p>Order processed at <?php echo date("F j, Y, g:i a"); ?></p>
		<p>Your Order Contains:</p>
		<div class="order">
			<?php
				if ($pbr_quantity > 0) {
			?>
			<p><?php echo '('.$pbr_quantity.')'.' Pabst Blue Ribbon - '.$pbr_size.' Pack ' ?></p>
			<?php
				}
			?>
			
			<?php
				if ($coors_quantity > 0) {
			?>
			<p><?php echo '('.$coors_quantity.')'.' Coors Banquet - '.$coors_size.' Pack ' ?></p>
			<?php
				}
			?>
			
			<?php
				if ($ts_quantity > 0) {
			?>
			<p><?php echo '('.$ts_quantity.')'.' Trout Slayer - '.$ts_size.' Pack ' ?></p>
			<?php
				}
			?>
		</div>
		<p>Your sub total is: <?php echo '$'.number_format($sub_total, 2) ?></p>
		<p>Your total with tax is: <?php echo '$'.number_format($total, 2) ?></p>
	</div>
</body>