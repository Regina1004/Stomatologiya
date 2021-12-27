<?php 

ob_start();
require_once('db/db.php'); 

session_start();  
$doctorId = $_GET['doctor_id'];

$doctor = $connection->query("SELECT * FROM doctors WHERE doctor_id='$doctorId'")->fetchAll(PDO::FETCH_ASSOC);
$doctor = $doctor[0];

$typeId = $doctor['type'];  //Выводит тип как цифру 
$type = $connection->query("SELECT title FROM types WHERE type_id='$typeId'")->fetchAll(PDO::FETCH_ASSOC); // Получаем тип как слово
$type = $type[0];

$numbers = $connection->query("SELECT * FROM numbers WHERE doctor='$doctorId' ORDER BY `date`, `time`")->fetchAll(PDO::FETCH_ASSOC);
//ORDER BY - сортировка по 

$dates = array();

foreach ($numbers as $num)
	if (!in_array($num['date'], $dates)) $dates[] = $num['date'];
		//in_array = dates.Contains(), сравнивает есть ли этот элемент в массиве 
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link rel="stylesheet" href="style/style.css">

 	<script src="js/main.js"></script>
 	<script src="js/jquery-3.6.0.min.js"></script>

 	<? if (isset($_SESSION['login'])) { ?>
 		<script src="js/register_numbers.js"></script>
 	<? } ?>

 	<title>Doctor</title>
 </head>
 <body>

	<?require_once('assets/header.php');  ?>

	<?require_once('assets/login.php');  ?>

	<div class="container">
		<a href="/">&larr; Вернуться на главную </a>

		<p class="doctor">Стоматолог - <?=$type['title']?> <?=$doctor['name']?></p>

		<div class="numbers">
			
			<? foreach ($dates as $key => $date) { ?>
			<!-- Key - индексы (0,1,2..) , date - сама дата (2021-12-27) -->

			<div class="day">
				<h3><?=date('d.m.Y', strtotime($date))?></h3>   
				<!-- strtotime - перевод даты в строку -->

				<? foreach ($numbers as $num) { 

					if ( $num['date'] == $date && $num['status'] == '1') { ?>

						<div class="number__value number__value_free" data-id='<?=$num['number_id']?>' data-type='number'>
							<?=date('H:i', strtotime($num['time']))?>
						</div>

					<? } ?>

				<? } ?>

			</div>

			<? } ?>

		</div>
	</div>
 	



<!-- ТЕСТ -->
<div id="mocha"></div>






 </body>
 </html>