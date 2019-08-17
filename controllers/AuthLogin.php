<?php
	require_once '../classes/Motorista.php';

	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['password']);
	
	if(isset($email) && isset($senha))
	{
		$motorista = new Motorista();
		$motorista->__set('email', $email);
		$motorista->__set('senha', $senha);
		$motorista->logarSistema();
	}else{
		header("location: ../views/page-login");
		exit;
	}
?>