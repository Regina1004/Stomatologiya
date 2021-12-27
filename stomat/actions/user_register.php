<?php
ob_start();
require_once('../db/db.php'); 

session_start();    // открытие сесии

/*echo "<pre>";                      
   var_dump($_POST);              
echo "</pre>";


ВЫВЕДЕТ:   (все в переменной POST)
array(3) {
  ["login"]=>
  string(6) "qweqwe"
  ["password"]=>
  string(4) "1004"
  ["email"]=>
  string(21) "gulnara110378@mail.ru"
}*/

if ($_POST['login'])
{
	$login = $_POST['login'];
	$email = $_POST['email'];
	$pass = $_POST['password'];

	$newUser= $connection->query("INSERT INTO users(login,pass,email) VALUES ('$login', '$pass', '$email')")->fetchAll(PDO::FETCH_ASSOC);

	$_SESSION['login'] = $login;
	$_SESSION['status'] = 'user';

	ob_clean();
	header('Location: ../index.php');
}
?>