<?php

session_start();

$name  	  = strip_tags($_POST['full_name']);
$email		= strip_tags($_POST['username']);
$password	= strip_tags($_POST['password']);

$db = new mysqli("localhost:3306", "jdinges", "colosuss", "cbtb_db");

$result = $db->query("SELECT * FROM users WHERE email='{$email}'");
$num_rows = mysqli_num_rows($result);

if ($num_rows > 0) {
	$_SESSION['error'] = "There already exists an account with this email.";
	header("Location: ../signup.php");
} else {
	$stmt = $db->prepare("INSERT INTO users (email, password, name) VALUES (?, ?, ?)");

	$stmt->bind_param('sss', $email, md5($password), $name);
  
	$stmt->execute();
  
	$_SESSION['logged_in']	= true;
	$_SESSION['username']	= $email;
	
	$_SESSION['user_id']	= $user['user_id'];
	
	header("Location: members/index.php");
}
?>
