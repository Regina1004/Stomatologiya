<?
ob_start();
require_once('db/db.php');          /*подключение файла*/

session_start();

$doctors = $connection->query("SELECT * FROM doctors")->fetchAll(PDO::FETCH_ASSOC);
                                    /*SELECT * FROM doctors = выбрать *(все) из doctors
                                      SELECT name FROM doctors - только имена
                                      fetchAll(PDO::FETCH_ASSOC) - ВАЖНО*/

$types = $connection->query("SELECT * FROM types")->fetchAll(PDO::FETCH_ASSOC);
$numbers = $connection->query("SELECT * FROM numbers")->fetchAll(PDO::FETCH_ASSOC);

//echo "<pre>";                       /*echo - вывод на экран*/
//   var_dump($_SESSION);              /*($doctors[0]['name']) - обращение к 0 доктуру и к его имени*/
//echo "</pre>";
 ?>




	<? require_once('assets/header.php');  ?>

	<? require_once('assets/login.php');  ?>

	<section class="doctors">
		<div class="container">
			<h1 class="title">Наши специалисты</h1>

			<div class="doctors-wrapper">

				<? foreach($types as $type) {?>

					<div class="type">
						<h3 class="type__title">Стоматолог-<?=$type['title']?></h3>

						<div class="names">
						  <? foreach($doctors as $doctor) {

						  	if ($doctor['type'] == $type['type_id']) {?>	

						  		<a href="doctor.php?doctor_id=<?=$doctor['doctor_id']?>" class="doctor-name"><?=$doctor['name']?></a>   
						  		<!-- doctor.php?doctor_id - после ? то, что мы хотим получить, переходим на другую страницу и с собой забираем doctor_id-->

						  		<span class="numbers_quantity">
						  			(свободных номерков: 

						  			<?
						  					$qualityNumbersThisDoctor = 0;

						  					foreach($numbers as $num)
						  					{
						  						if($num['doctor'] == $doctor['doctor_id'] && $num['status'] == "1") $qualityNumbersThisDoctor++;
						  					}

						  					echo $qualityNumbersThisDoctor;
						  			?>)
						  		</span>
						  		<br>

						  	<? } ?>

						  <? } ?>

						</div>

					</div>

				<? } ?>

			</div>
		</div>
	</section>




<!-- ТЕСТ -->
<div id="mocha"></div>




	<script src="js/main.js"></script>

</body>
</html>