<?php
if(($_SERVER["REQUEST_METHOD"] == "POST")){
	include('config.php');

	date_default_timezone_set("America/Bogota");
	$fecha   = date("Y-m-d H:i:A");

    $name_people        = htmlspecialchars($_REQUEST['name_people']); 
    $saludo 		    = $_REQUEST['saludo'];
    $myquestion_id 		= 1; 
    //    $myquestion_id 		= htmlspecialchars($_REQUEST['myquestion_id']); 

    /*
    $queryInsert  = ("INSERT INTO people_surveyed(
        name_people,
        saludo,
        myquestion_id
        ) 
    VALUES (
        '$name_people',
        '$saludo',
        '$myquestion_id'
    )");
    */

    $queryInsert  = ("INSERT INTO people_surveyed(
        name_people,
        saludo
        ) 
    VALUES (
        '$name_people',
        '$saludo'
    )");
   $resultInsert = mysqli_query($con, $queryInsert);
   
    header('Location: ./home.php');
    exit;

}
?>