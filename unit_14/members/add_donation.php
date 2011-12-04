<?php
session_start();

<<<<<<< HEAD
if(!$_SESSION['logged_in']){
	header("Location: ../login.php");
}

$book_id = $_GET['book_id'];
$donor_id = $_GET['donor_id'];

$db = new mysqli(localhost, team04, apple, team04_cbtb_db);
=======
$book_id = $_GET['book_id'];
$donor_id = $_GET['donor_id'];

$db = new mysqli("localhost:3306", "jdinges", "colosuss", "cbtb_db");
>>>>>>> df3749cb5dd1da0142bcd49c274454aa09faac7a

$stmt = $db->prepare("INSERT INTO books (name, email, organization_id) VALUES (?, ?, ?)");
$stmt = $db->prepare("UPDATE books SET donor_id = ? WHERE id = ?");

$stmt->bind_param("ii", $donor_id, $book_id);

$stmt->execute();

$_SESSION['error'] = "{$donor_id} has been updated as a donor of {$book_id}.";

header("Location: donations.php");

<<<<<<< HEAD
?>
=======
?>
>>>>>>> df3749cb5dd1da0142bcd49c274454aa09faac7a
