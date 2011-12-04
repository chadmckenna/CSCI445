<?php
session_start();

if(!$_SESSION['logged_in']){
	header("Location: ../login.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../screen.css" />
	<title>Books Page</title>
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
		  <div class="error">
		    <?php
		      echo $_SESSION['error'];
		      $_SESSION['error'] = "";
		    ?>
		  </div>
		  <h1>Books</h1>
		  <p><a href="view_books.php">View all books in inventory.</a></p>
		  <form action="add_book.php" method="get">
		    <h2>Add a new Book</h2>
		    <table>
		      <tr>
		        <td>ISBN</td>
		        <td><input type="text" name="isbn" /></td>
		      </tr>
		      <tr>
		        <td>Title</td>
		        <td><input type="text" name="title" /></td>
		      </tr>
		      <tr>
		        <td>Author</td>
		        <td><input type="text" name="author" /></td>
		      </tr>
		      <tr>
		        <td>Value</td>
		        <td><input type="text" name="value" /></td>
		      </tr>
		      <tr>
		        <td></td>
		        <td><input type="submit" value="Add Book" /></td>
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
