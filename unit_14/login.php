<?php 
session_start();
if($_SESSION['logged_in']){
	header("Location: members/index.php");
}
?>
<?xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="screen.css" />
	<title>Home Page</title>
</head>
<body>
	<div class="index-container">
		<div class="header">
			<div class="logo">
				<img src="images/apple.png" /><h1><a href="index.php">CompassionByTheBook</a></h1>
			</div>
			<div class="nav">
				<ul>
					<li><a href="about.php">About</a></li>
					<li><a href="#">Get Involved</a></li>
					<li><a href="#">Donate</a></li>
					<li><a href="#">Blog</a></li>
				</ul>
			</div>
			<div class="login">
			  <ul>
			    <li><a href="login.php">Login</a></li>
			    <li><a href="signup.php">Sign Up</a></li>
			  </ul>
			</div>
			<div class="clear"></div>
		</div>
		<div id="login-text">
		  <h2>Login</h2>
		  <p>Welcome to the login portion of Compassion By The Book. You can login in here in order to gain access to the
		    back-end of the web server.</p> 
		</div>
		<div id="login-form">
		  <div class="error">
		  <?php
		    echo $_SESSION['error'];
		    $_SESSION['error'] = "";
		  ?>
		  </div>
		  <form action="members/user_login.php" method="post">
		    <p>Username:</p>
		    <input type="text" name="username" /><br />
		    <p>Password:</p>
		    <input type="password" name="password" /><br />
		    <input type="submit" value="Login" /> or <a href="signup.php">Sign up</a>.
		  </form>
		</div>
		<div class="clear"></div>
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
