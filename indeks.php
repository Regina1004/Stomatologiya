<?

require_once('db/db.php'); /*подключение файла*/

$doctors = $connection->query("SELECT * FROM doctors")->fetchAll(PDO::FETCH_ASSOC);
/*SELECT * FROM doctors = выбрать *(все) из doctors
SELECT name FROM doctors - только имена
fetchAll(PDO::FETCH_ASSOC) - ВАЖНО*/

$types = $connection->query("SELECT * FROM types")->fetchAll(PDO::FETCH_ASSOC);
$numbers = $connection->query("SELECT * FROM numbers")->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>"; /*echo - вывод на экран*/
// var_dump($doctors); /*($doctors[0]['name']) - обращение к 0 доктуру и к его имени*/
// echo "</pre>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style/style.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>

<? require_once('assets/header.php'); ?>

<? require_once('assets/login.php'); ?>

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

<a href="#" class="doctor-name"><?=$doctor['name']?></a>

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

<script src="js/main.js"></script>

</body>
</html>