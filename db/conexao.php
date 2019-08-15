<?php

//conexão com PDO


	//1ºdbname
	//2ºhost
	//3ºusuario e senha
/*
	try {
		$db = new PDO("mysql:dbname=sadi;host=localhost","root","");
	} 
	catch (PDOException $e) {
		echo "Erro ao se conectar ao banco".$e->getMessage();
		
	}
	catch(Exception $e){
		echo "Erro Genérico".$e->getMessage();
	}
*/
	
$server = "localhost";
$user = "root";
$password = "";
$database = "sadi";
		
$db = new mysqli($server,$user,$password, $database);

?>