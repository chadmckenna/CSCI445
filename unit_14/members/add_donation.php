<?php
session_start();

$book_id = $_GET['book_id'];
$donor_id = $_GET['donor_id'];

$db = new mysqli("localhost:3306", "jdinges", "colosuss", "cbtb_db");

$stmt = $db->prepare("INSERT INTO books (name, email, organization_id) VALUES (?, ?, ?)");
$stmt = $db->prepare("UPDATE books SET donor_id = ? WHERE id = ?");

$stmt->bind_param("ii", $donor_id, $book_id);

$stmt->execute();

$_SESSION['error'] = "{$donor_id} has been updated as a donor of {$book_id}.";

header("Location: donations.php");

?>