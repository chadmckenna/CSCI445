<?php
session_start();

if(!$_SESSION['logged_in']){
	header("Location: ../login.php");
}

$name = $_GET['name'];
$email = $_GET['email'];
$organization_id = $_GET['organization'];

$db = new mysqli(localhost, team04, apple, team04_cbtb_db);

$stmt = $db->prepare("INSERT INTO donors (name, email, organization_id) VALUES (?, ?, ?)");

$stmt->bind_param("ssi", $name, $email, $organization_id);

$stmt->execute();

$_SESSION['error'] = "{$name} has been added as a donor.";

header("Location: donors.php");

?>