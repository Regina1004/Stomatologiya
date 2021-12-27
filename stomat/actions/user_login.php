<?php
ob_start();
require_once('../db/db.php'); 

session_start();    // открытие сесии

if ($_POST['login'])
{
	$login = $_POST['login'];
	$pass = $_POST['password'];

	$user= $connection->query("SELECT * FROM users WHERE login='$login' AND pass='$pass'")->fetchAll(PDO::FETCH_ASSOC);

	if (count($user) == 0)
	{
		ob_clean();
		header('Location: ../index.php');
		return;
	}

	$_SESSION['user_id'] = $user[0]['user_id'];
	$_SESSION['login'] = $login;
	$_SESSION['status'] = $user[0]['status'];

	ob_clean();
	header('Location: ../index.php');
}

?>