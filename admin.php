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
</form>
</div>
</section>
</body>
</html>