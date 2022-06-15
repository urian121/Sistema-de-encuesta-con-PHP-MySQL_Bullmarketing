<?php
	include('config.php');
	$email 			= trim($_REQUEST['email']);
	$passwordUser   = trim($_REQUEST['password']);

	/*
	ALTER TABLE users CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
	ALTER DATABASE MyDataBase COLLATE utf8_bin

	/*
	$email 		    = 'alejandro_torres@gmail.com';
	$password    	= 'Bull2022*';
	*/ 

	$sqlVerificandoLogin = ("SELECT *  FROM login_user WHERE email COLLATE utf8_bin='$email'");
	$resultLogin = mysqli_query($con, $sqlVerificandoLogin) or die(mysqli_error($con));
	$numLogin    = mysqli_num_rows($resultLogin);

	if ($numLogin !=0){
		while($rowData  = mysqli_fetch_assoc($resultLogin)){
			$passwordBD = $rowData['password'];
			if(password_verify($passwordUser, $passwordBD)) {
				session_start(); //Creando la sesion ya que los datos son validos
				$_SESSION['id'] 		= $rowData['id']; 
				$_SESSION['fullName']	= $rowData['fullName'];
				$_SESSION['email'] 		= $rowData['email'];

				//echo 'caso 1';
				header("location:home.php?a=1");
				break;
			}else{
				//echo "Login incorecto";
				header("location:index.php?b=1");
				break;
			}
		}
	} 
	else{
		//echo "No existe el correo registrado";
		header("location:./?e=1");
	}
?>
