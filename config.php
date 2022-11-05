<?php
//$dbcon=new mysqli("localhost:3306","servido2","7joi2k3PJ8","store"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
//("localhost","twiceeig_twiceeig","2T[-7Hj0W7Ugwj","twiceeig_twiceeig")
	$DB_HOST = 'localhost';
	$DB_USER = 'twiceeig_twiceeig';
	$DB_PASS = '2T[-7Hj0W7Ugwj';
	$DB_NAME = 'twiceeig_twiceeig';
	
	try{
		$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	
