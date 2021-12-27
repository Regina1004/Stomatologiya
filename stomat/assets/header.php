<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="style/style.css">








<!-- ТЕСТЫ -->
<!-- подключаем стили Mocha, для отображения результатов -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mocha/3.0.0/mocha.min.css" integrity="sha512-gvrrgwJ0rnmjXxPWPAaN6eUo7cRy6miwroODngZDNGS/NqRYtmZMqE/ApWLstyWa7jKWy/ufmrDOEEEetIEoBQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!--подключаем библиотеку Mocha -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mocha/3.0.0/mocha.min.js" integrity="sha512-7122sI78Y/d5YO7I2zovfQQTBb+K22KHmHQEEFe/M+v3p2rydlCQTpAmSKdptSnHyWxOrV2m//VnHuwCaoRrXQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- настраиваем Mocha: предстоит BDD-тестирование -->
<script>
 mocha.setup('bdd');
</script>

<!-- подключаем chai -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/chai/4.3.4/chai.min.js" integrity="sha512-gkZWobgJrQevN2HMEeTnSlxWPJ3HS0JJ3nXcgI6XLK/NI0z59jbztRZqbTlIzfl21vIGahQaeW0knwH1az/tbg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- выносим assert в глобальную область -->
<script>
 var assert = chai.assert;
</script>











	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>







<header class="header"> <!-- //шапка -->
	<div class="container">
		<div class="header-nav"> 

			<div class="logo">
				<h3>Стоматология</h3>

				<? if ($_SESSION['status'] == 'admin') { ?>
					<a href="admin.php">Админка</a>
				<? } ?>

			</div>

			<div class="login">

				<? if (isset($_SESSION['login'])) { ?>
				<!-- isset - проверит существование сессии -->

					<a href="profile.php" class="profile__open">Привет, <?=$_SESSION['login']?>!</a>
					<form action="actions/user_unlogin.php" method="POST">
						
						<button class="unlogin" name="unlogin">Выйти</button>

					</form>
					
				<? } else {?>

					<div class="login-block">
						<a href="#" class="auth__open" data-auth="login">Войти</a>             <!-- #- заглушка, никуда не переходим-->
						<a href="#" class="auth__open" data-auth="register">Регистрация</a>
					</div>

				<? } ?>
				
			</div>
			
		</div>
	</div>
</header>