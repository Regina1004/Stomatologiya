<?php 

//echo $_POST['number_id'];

ob_start();
require_once('../db/db.php');        
session_start();

$number_id = $_POST['number_id'];
$user_id = $_SESSION['user_id'];
$new_number = $connection->query("INSERT INTO users_numbers (number_id, user_id) VALUES ('$number_id', '$user_id')")->fetchAll(PDO::FETCH_ASSOC);

$new_number_status = $connection->query("UPDATE numbers SET status='0' WHERE number_id='$number_id'")->fetchAll(PDO::FETCH_ASSOC);

?>