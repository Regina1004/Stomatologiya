<!— Список докторов для отображения создания номерков —>
<?php

require_once('db/db.php');
$doctors = $connection->query("SELECT * FROM doctors")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!— css файлы подключаются здесь —>
<link rel="stylesheet" href="style/style.css">
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/admin.js"></script>
<title>Admin</title> <!-— Отображение названия файла —>
</head>
<body>

<header>
<!— Шапка (верхущка сайта)-->
<!— а - тег ссылки, / - вернуться на главную страницу(index.php, можно вставить любую ссылку), &larr; - стрелочка влево-->
<div class="container">
<a href="/">&larr; Вернуться на главную страницу</a>
</div>
</header>

<!— Окошко создания номерков —>
<section class="creating">
<div class="container">
<h1>Создание номерков</h1>
<!— form - отвечает за отправку данных на сервер —>
<!— GET - получение данных
POST - отправление —>
<form method="POST">
<div class="creating-block">
<!— <fieldset> - даст оконтовку —>
<fieldset>
<!— <legend> - подпись блока (в оконтовке) —>
<legend>Врач:</legend>
<select name="doctor" class="doctors">

<? foreach ($doctors as $doctor) { ?>
<!— = - равно echo (вывод текста) —>
<option data-id="<?=$doctor["doctor_id"]?>" value="<?=$doctor["name"]?>"><?=$doctor["name"]?></option>


<? } ?>

</select>
</fieldset>
</div>


<div class="creating-block">
<!— <fieldset> - даст оконтовку —>
<fieldset>
<!— <legend> - подпись блока (в оконтовке) —>
<legend>Дата:</legend>
<div class="date-radio">
<!— radio - выбор одного блока —>
<!— name="set-date-type" - для того, чтобы работал только один —>
<input type="radio" id="one" name="set-date-type" value="one" checked>
<!— label - связывает название с самой кнопкой (когда тыкаешь на имя, он сам выбирает определенный кружочек "one") —>
<label for="one">Один день</label>

<!— checked - выбор по умолчанию —>
<input type="radio" id="range" name="set-date-type" value="range">
<label for="range">Диапазон</label>

<div class="date-block-one">
<input class="date__one" type="date">
</div>

<div class="date-block-range">
с
<input class="date__range" type="date" data-range="from">
по
<input class="date__range" type="date" data-range="to">
</div>
</div>
</fieldset>
</div>

<div class="creating-block">
<!— <fieldset> - даст оконтовку —>
<fieldset>
<!— <legend> - подпись блока (в оконтовке) —>
<legend>Время:</legend>
<input class="btn__all" type="button" data-action="check" value="Выбрать всё">
<input class="btn__all" type="button" data-action="uncheck" value="Убрать всё">
<?
$minutesAdd = 30;
$time = new DateTime("10:00");
//$time->format("H:i") - форматирует время в строку, где H-часы, i-минуты

while ($time->format("H:i") <= "17:00")
{
?>
<div class="time-block">
<!— Галочка, (номерки) —>
<input class="time" id="<?=$time->format("H:i")?>" type="checkbox" value="<?=$time->format("H:i")?>">
<!— Вывод —>
<label class ="time__label" for="<?=$time->format("H:i")?>"><?=$time->format("H:i")?></label>
</div>

<?
// . - сложение строк
$time->add(new DateInterval("PT".$minutesAdd."M"));
}
?>
</fieldset>
</div>
<!— submit - отправка формы —>
<input class="submit" type="button" value="Создать">
</form>
</div>
</section>
</body>
</html>
