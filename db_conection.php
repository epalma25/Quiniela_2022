<?php



//$dbcon=mysqli_connect("127.0.0.1","root","");

//mysqli_select_db($dbcon,"store");


//$dbcon=new mysqli("localhost:3306","servido2","7joi2k3PJ8","store"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
$dbcon=new mysqli("localhost","twiceeig_twiceeig","2T[-7Hj0W7Ugwj","twiceeig_twiceeig"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	mysqli_set_charset($dbcon,'utf8');



?>