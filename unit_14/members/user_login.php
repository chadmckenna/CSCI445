<?php

session_start();

$username = strip_tags($_POST['username']);
$password = md5(strip_tags($_POST['password']));

$db = new mysqli(localhost, team04, apple, team04_cbtb_db);

//if(!$db){die("Could not connect: ".mysql_error())};

//mysql_select_db("team04_cbtb_db", $db);

$result = $db->query("SELECT * FROM users WHERE email='{$username}' AND password='{$password}'");
$num_rows = mysqli_num_rows($result);

if($num_rows > 0){
	$user = $result->fetch_assoc();
	$_SESSION['logged_in'] = true;
	$uname = $user['email'];
	$_SESSION['username'] = $uname;
	$uid = $user['user_id'];
	$_SESSION['user_id'] = $uid;
	
	header("Location: index.php");
}
else{
	$_SESSION['logged_in'] = false;
	$_SESSION['error'] = "Could not log you in.";
//echo "<script>alert('some_message');</script>";
	header("Location: ../login.php");
}
?>