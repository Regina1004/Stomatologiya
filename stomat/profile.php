<?php 

ob_start();
require_once('db/db.php'); 

session_start();

$user_id = $_SESSION['user_id'];
$numbers_id = $connection->query("SELECT * FROM users_numbers WHERE user_id='$user_id'")->fetchAll(PDO::FETCH_ASSOC);

if (count($numbers_id) > 0)
{
	$numbers_query = "SELECT * FROM numbers n
	                    JOIN doctors d ON n.doctor = d.doctor_id
	                    JOIN types t ON d.type = t.type_id WHERE ";
	// Выбираем все из таблицы numbers и соединяем таблицы в одну 

    foreach ( $numbers_id as $id )
    {
    	$numbers_query .= "number_id='" . $id['number_id'] . "' OR ";
    }

    $numbers_query = trim($numbers_query, " OR ");    // trim - удаляет то, что нам надо с начала и с конца 

    $numbers_query .= " ORDER BY `date`, `time`";

    $numbers = $connection->query($numbers_query)->fetchAll(PDO::FETCH_ASSOC);

    $dates = array();
    $doctors = array();
    $types = array();

    foreach ( $numbers as $num )
    {
    	if (!in_array($num['date'], $dates))
    	{
    		$dates[] = $num['date'];
    		$doctors[] = $num['name'];
    		$types[] = $num['title'];
    	}
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style/style.css">
	<title>Профиль</title>
</head>
<body>

	<? require_once('assets/header.php');  ?>

	<div class="container">
		
		<a href="/">&larr; Вернуться на главную</a>
		<h1>Записи</h1>

		<div class="numbers">
			
			<? if (count($numbers_id)>0) { ?>
				
				<? foreach ($dates as $key => $date) { ?>

					<div class="day">
						
						<div class="day-title">
							
							<p class="date"><?=date('d.m.Y', strtotime($date))?></p>
							<p class="doctor">Стоматолог - <?=$types[$key]?> <?=$doctors[$key]?></p>

						</div>

						<? foreach ($numbers as $num) 
						{ 
							if ( $num['date'] == $date ) { ?>

								<div class="number__value number__value_reg">
									<?=date('H:i', strtotime($num['time']))?>
								</div>





							<? } ?>

						<? } ?>

					</div>
					
				<? } ?>

			<? } else { ?>

				<h2>Номерков нет</h2>

			<? } ?>
		</div>

	</div>
	
</body>
</html>