<?php
session_start();
?>
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
		<div class="tagline">
			<h1>Students Want to Make a Difference and We Want to Help!</h1>
		</div>
		<div class="testimonials">
			<div class="column" id="left">
				<blockquote>
				<p>When the disaster in Haiti happened, I wanted to help, but being a college student I found it difficult to contribute financially. 
				Donating books has been an easy and convenient way to help even though I couldn't go to Haiti.</p>
				</blockquote>
				<p id="client">Cynthia Miranda, Nursing Student</p>
			</div>
			<div class="column" id="center">
				<blockquote>
				<p>After the Haiti earthquake, a couple of our student organizations shared with me that they were working with Kurtis to raise money
				for Haiti by selling textbooks. We took the message to the school about this unique opportunity to make a difference and we were able 
				to raise over $3,000 for the American Red Cross!</p>
				</blockquote>
				<p id="client">Derek Morgan, Associate Dean of Students and Director of Student Activities</p>
			</div>
			<div class="column" id="right">
				<blockquote>
				<p>This is the best fundraiser I have ever encountered, both for the minimal effort and the maximum return. I remember being skeptical
				when Kurtis first approached me, but I figured I didn't have much to lose. When only five people donated books and we saw a return of
				over $1000, I was truly amazed.</p>
				</blockquote>
				<p id="client">Ryan Rowlette, Area Director, Colorado and Wyoming</p>
			</div>
			<div class="clear"></div>
		</div>
		<div class="blog">
			<h1>Latest News</h1>
			<h2>Update on Fundraisers Underway!</h2>
			<h3>September 1st, 2011</h3>
			<p>There are three groups set up and running textbook fundraisers this semester (as of yesterday it became four!). The total amount 
			fundraised by our students is over $6,000 in the last three weeks alone. This is exciting news for many reasons. 1) Compassion by the Book 
			is fulfilling its mission of empowering college students. 2) A year of planning and organizing is paying ...</p>
			<a id="right" href="#">Continue Reading</a>
			<div class="clear"></div>
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
