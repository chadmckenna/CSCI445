<?php
session_start();

if(!($_SESSION['logged_in'])) {
	header("Location: ../login.html");
}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../screen.css" />
	<title>User Page</title>
</head>
<body>
	<div class="index-container">
		<div class="header">
			<div class="logo">
				<img src="../images/apple.png" /><h1><a href="index.php">CompassionByTheBook</a></h1>
			</div>
			<div class="nav">
				<ul>
					<li><a href="books.php">Books</a></li>
					<li><a href="donors.php">Donors</a></li>
					<li><a href="donations.php">Donatations</a></li>
					<li><a href="privilages.html">Privilages</a></li>
				</ul>
			</div>
			<div class="login">
			  <ul>
			    <li><a href="#">Settings</a></li>
			    <li><a href="user_logout.php">Logout</a></li>
			  </ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="content">
			<?php
			$username = $_SESSION['username'];
			$uid = $_SESSION['user_id'];
			//echo"<script>alert('{$_SESSION['username']}')</script>";
			echo"<h1>Welcome, $username!</h1>";
			//<h1>Welcome, $username!</h1>
		  
			?>
		  <h2>General Summary:</h2>
		  <p>Do Something:<p>
		  <ul>
		    <li><a href="books.php">View books in inventory or Add a book</a></li>
		    <li><a href="donors.php">View all donors or Add Donors</a></li>
		    <li><a href="donations.html">Fill an order</a></li>
		    <li><a href="privilages.html">User Privilages</a></li>
		  </ul>
		  <p>You have collected $NUMBER_OF_COLLECTED_BOOKS books. <a href="books.html">Add more books</a>.</p>
		  <p>You have sold $NUMBER_OF_SOLD_BOOKS books.</p>
		  <p>You have recycled $NUMBER_OF_RECYCLED_BOOKS books.</p>
		  <p>You have fulfilled $NUMBER_OF_FULFILLED_ORDERS order.</p>
		  <p>You have raised $DOLLARS_RAISED.</p>
		</div>
	</div>
	<div class="footer-container">
		<div class="column-container">
			<div class="column" id="left">
				<h3>About</h3>
				<ul>
					<li><a href="#">What We Do</a></li>
					<li><a href="#">Your Potential</a></li>
					<li><a href="#">Board of Directors</a></li>
					<li><a href="#">FAQs</a></li>
					<li><a href="#">Contact Us</a></li>
					<li>Design by the K4TZ</li>
				<ul>
			</div>
			<div class="column" id="center">
				<h3>Get Involved</h3>
				<ul>
					<li><a href="#">Causes</a></li>
					<li><a href="#">Sign Up</a></li>
				<ul>
			</div>
			<div class="column" id="right">
				<h3>Donate</h3>
				<ul>
					<li><a href="#">Money</a></li>
					<li><a href="#">Books</a></li>
				<ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</body>	
</html>