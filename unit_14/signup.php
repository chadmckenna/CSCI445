<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="screen.css" />
	<script language="JavaScript" src="validate.js"></script>
	<title>Sign Up</title>
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
		<div class="content">
		  <h2>Sign Up</h2>
		  <p>This is the page where you add new users to the website. Simply file in the following form and hit submit and you'll
		    be partying with Compassion By The Book in no time flat.</p> 
		  <form action="sign_up.php" method="post" onsubmit="return validate(this);">
		    <table>
		      <tr>
		        <td>Email (also your username):</td>
		        <td><input type="text" name="username" /></td>
		      </tr>
		      <tr>
		        <td>Password:</td>
		        <td><input type="password" name="password" /></td>
		      </tr>
		      <tr>
		        <td>Confirm Password:</td>
		        <td><input type="password" name="password_confirm" /></td>
		      <tr>
		      <tr>
		        <td>Name:</td>
		        <td><input type="text" name="full_name" /></td>
		      </tr>
		      <tr>
		        <td></td>
		        <td><input type="submit" value="Sign Up" /> or <a href="login.php">Login</a>.</td>
		      </tr>
		    </table>
		  </form>
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