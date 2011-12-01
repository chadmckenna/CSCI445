<?php
$db = new mysqli("localhost:3306", "jdinges", "colosuss", "cbtb_db");

$books = $db->query("SELECT * FROM books");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../screen.css" />
	<title>Donations Page</title>
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
					<li><a href="donations.html">Donatations</a></li>
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
	    <h1>Donations</h1>
		  <p><a href="donors.php">Add a donor.</a></p>

		  <h2>Add a new Book</h2>
		  <table>
		    <thead>
		      <tr>
		        <th>Book Title</th>
		        <th>ISBN</th>
		        <th>Author</th>
		        <th>Value</th>
		        <th>Donor</th>
		        <th>Cause</th>
		        <th>Update</th>
		      </tr>
		    </thead>
		    
		    <tbody>
          <?php
		      while ($book = $books->fetch_assoc()) {
		        $donors = $db->query("SELECT * FROM donors");
		        
		        $row = "<tr>";
		        $row .= "<form action=\"add_donation.php\" method=\"get\">";
		        $row .= "<input type=\"hidden\" name=\"book_id\" value=\"{$book['id']}\">";
		        $row .= "<td>" . $book['title'] . "</td>";
		        $row .= "<td>" . $book['ISBN'] . "</td>";
		        $row .= "<td>" . $book['author'] . "</td>";
		        $row .= "<td>" . $book['value'] . "</td>";
		        $row .= "<td><select name=\"donor_id\">";
		        $row .= "<option value=\"0\">Nobody</option>";
		        while ($donor = $donors->fetch_assoc()) {
		          if ($book['donor_id'] == $donor['id']) {
		            $selected = " selected=\"true\"";
	            } else {
	              $selected = "";
	            }
		            $row .= "<option value=\"{$donor['id']}\"{$selected}>{$donor['name']}</option>";
		        }
		        $row .= "</select></td>";
		        $row .= "<td><select name=\"cause_id\"><option value=\"1\">Cause Name Here</option></select></td>";
		        $row .= "<td><input type=\"submit\" value=\"update\"/></td>";
		        $row .= "</form></tr>";
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