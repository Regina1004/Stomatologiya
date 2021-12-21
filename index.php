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
</html>