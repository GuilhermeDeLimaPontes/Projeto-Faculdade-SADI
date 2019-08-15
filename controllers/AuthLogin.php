<?php
	require_once('../db/conexao.php');
	session_start();

	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['password']);

	if(isset($email) && isset($senha)){ 
		
		$sql = "SELECT * from motorista where email= '$email' and senha = '$senha' LIMIT 1";

		$db->query($sql);

		$results = $db->query($sql);

		$row = $results->fetch_object();
		$_SESSION['IDMOTORISTA'] = $row->IDMOTORISTA;
		$row_count = $results->num_rows;

		if($row_count <=0){
			$_SESSION['loginErro'] = "Login ou senha invalida";
			header("location: ../views/page-login.php ");
			return false;
		}else{
			header("location: ../views/index.php");
			return true;
		}
	}else{
		header("location: ../views/page-login.php ");
		exit;
	}
	
?>