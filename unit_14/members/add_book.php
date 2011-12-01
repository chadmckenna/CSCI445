<?php
session_start();

$cause_id = $_GET['cause'];
$isbn     = $_GET['isbn'];
$title    = $_GET['title'];
$author   = $_GET['author'];
$donor_id = $_GET['donor'];
$value    = $_GET['value'];
$status   = $_GET['status'];
$for_sale = $_GET['for_sale'];
$location = $_GET['location'];

$db = new mysqli("localhost:3306", "jdinges", "colosuss", "cbtb_db");

$stmt = $db->prepare("INSERT INTO books (isbn, title, author, value) VALUES (?, ?, ?, ?)");

$stmt->bind_param("ssss", $isbn, $title, $author, $value);

$stmt->execute();
echo $status;
$_SESSION['error'] = "Your book {$title} by {$author} has been added.";

header("Location: books.php");

?>
