<?php
	include('config.php');
	$idPersona = $_REQUEST['id']; 

	$sqlPersona      = ("SELECT * FROM people_surveyed WHERE id='$idPersona'");
	$querypersona    = mysqli_query($con, $sqlPersona);
	$dataPersona     = mysqli_fetch_array($querypersona);
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--metas de Whatsapp-->
    <meta property="og:title" content="Bullmarketing - Agencia Digital"/>
    <meta property="og:image" content="https://www.bullmarketing.com.co/wp-content/uploads/2022/02/Logo-bull-negro_2.png"/>
    <meta property="og:description" content="Encuesta realizada por Bullmarketing"/>
    <meta property="og:type"  content="https://www.bullmarketing.com.co/"/>
    <meta property="og:url"   content="https://bullmarketing.com.co/"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link type="text/css" rel="shortcut icon" href="assets/images/favicon.png"/>
    <title>Muchas gracias!!</title>
    <style>
	  	.bi-arrow-counterclockwise{
		    font-size: 20px;
		    font-weight: bold;
	  	}
	  	#linkSalir:hover{
	    	cursor: pointer;
	    	color: #f05a22 !important;
	  	}
	  	.btnSpecial{
		    width: 100%;
		    background-color: #f05a22;
		    color: #fff;
		    border: none;
	  	}
	  	.btnSpecial:hover{
	        cursor: pointer;
	        background-color: #f05a22 !important;
	        color: #f9f9f9;
	        opacity: 0.9;
		}
	  	.bi{
	        font-size: 25px;
	  	}
	  	.bi-whatsapp:hover{
	        cursor: pointer;
	        color: green;
	  	}
	  	.bi-file-earmark-code:hover{
	        cursor: pointer;
	        color: #888;
	  	}
    </style>
  </head>
  <body>
		<div class="container" style="padding: 15%;">
			<div class="row text-center">
				<div class="col col-md-12 p-md-12 mb-12" style="background-color: #f9f9f9; border-radius:5px;">
					<h2 style="color: #f05a22; font-weight:800;">Felicidades <?php echo $dataPersona['name_people']; ?></h2>
					<strong>
			           Ya has terminado tu encuenta. <br> Muchas gracias por tus respuestas. 
			           <h5 style="color: #f05a22; font-weight:800;">
			           		Te redireccionaremos en <span id="countdowntimer">5 </span> segundos.
			           </h5>
			      	</strong>				
				</div>
			</div>
		</div>
		<script type="text/javascript">
		    var timeleft = 5;
		    var downloadTimer = setInterval(function(){
		    timeleft--;
		    document.getElementById("countdowntimer").textContent = timeleft;
		    if(timeleft <= 0)
		        clearInterval(downloadTimer);
		    	window.location.replace("http://www.bullmarketing.com.co/");
		    },1000);
		</script>
	</body>
</html>