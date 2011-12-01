<?php
session_start();

$db = new mysqli('localhost:3306', 'jdinges', 'colosuss', 'cbtb_db');

$results = $db->query("SELECT * FROM donors");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../screen.css" />
	<title>Donors Page</title>
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
	    <h1>View Donors</h1>
      <p><a href="add_donors.php">Add a donor.</a></p>
	    
	    <h2>View donors</h2>
	    <table>
	    
	      <thead>
	        <tr>
	          <th>Name</th>
	          <th>Email</th>
	          <th>Organization</th>
	        </tr>
	      </thead>
	      
	      <tbody>
	        <?php
	        while ($donor = $results->fetch_assoc()) {
	          $row = "<tr>";
	          $row .= "<td>" . $donor['name'] . "</td>";
	          $row .= "<td>" . $donor['email'] . "</td>";
	          $row .= "<td>" . $donor['organization_id'] . "</td>";
	          $row .= "</tr>";
	          echo $row;
          }
	        ?>
	      </tbody>
	      
	    </table>
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