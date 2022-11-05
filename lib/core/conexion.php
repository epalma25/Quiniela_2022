<?php
	
	//$con=new mysqli("localhost:3307","root","","worldcup_db"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	$con=new mysqli("localhost","twiceeig_twiceeig","2T[-7Hj0W7Ugwj","twiceeig_twiceeig"); //servidor, usuario de base de d
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	mysqli_set_charset($con,'utf8');
?>