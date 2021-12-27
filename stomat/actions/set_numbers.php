<?
   /*echo "<pre>";
   		var_dump($_POST);
   echo "</pre>";*/

   require_once('../db/db.php');

   $data = $_POST;
   $doctorId = $data['doctorId'];
   $numbers = $data['numbers'];
   $query = "INSERT INTO `numbers` (`doctor`, `date`, `time`) VALUES ";  
   //Должно выглядеть так: "INSERT INTO numbers (doctor, date, time) VALUES ('6', '21.11.2021', '14:00'), ('6', '22.11.2021', '14:00') и т.д.";

  

   if ($data['isDateRange'] == "true")
   {
   	 $dateFrom = $data['date']['from'];
   	 $dateTo = $data['date']['to'];
   	 $dateNext = $dateFrom;

   	 while(true)
   	 {
   	 	foreach ($numbers as $num) $query .= "('$doctorId', '$dateNext', '$num'), ";

   	 	if ($dateNext == $dateTo) break;

   	 	$dateNext = date('Y-m-d', strtotime($dateNext . ' + 1 days'));
   	 }
   }
   else 
   {
   	 $date = $data['date'];

   	 foreach ($numbers as $num) 
   	 	$query .= "('$doctorId', '$date', '$num'), ";
   }
   
   $query = trim($query, ', '); //Обрезать с конца
   
   $info = $connection->query($query)->fetchAll(PDO::FETCH_ASSOC);