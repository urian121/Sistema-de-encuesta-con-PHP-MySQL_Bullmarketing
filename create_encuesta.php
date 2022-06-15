<?php
if(($_SERVER["REQUEST_METHOD"] == "POST")){
	include('config.php');

	date_default_timezone_set("America/Bogota");
	$fecha   = date("Y-m-d H:i:A");    

    $people_surveyed_id 	= htmlspecialchars($_REQUEST['people_surveyed_id']); 
    /*$myquestion_id 	        = ($_REQUEST['myquestion_id']); 
    $resp                   = htmlspecialchars($_REQUEST['resp']);*/


    $queryInsert  = ("INSERT INTO answer(
        people_surveyed_id,
        myquestion_id,
        resp,
        fecha
        ) 
    VALUES (
        '" .$people_surveyed_id. "',
        '1',
        '" .$_REQUEST['preguntaOne']. "',
        '" .$fecha. "'
    ),
    (
        '" .$people_surveyed_id. "',
        '2',
        '" .$_REQUEST['preguntaTwo']. "',
        '" .$fecha. "'
    ),
    (
        '" .$people_surveyed_id. "',
        '3',
        '" .$_REQUEST['preguntaThree']. "',
        '" .$fecha. "'
    )
    ");
   $resultInsert = mysqli_query($con, $queryInsert);
   
    header("Location: ./agradecimientos.php?id=$people_surveyed_id");
    exit;

}
?>