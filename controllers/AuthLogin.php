<?php
	
	require_once '../classes/Motorista.php';
	
	if(isset($_POST['submit']))
	{
		
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
		$senha = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
		session_start();
		$_SESSION['email_retry'] = $email;
	
		if(isset($email) && isset($senha) && filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$motorista = new Motorista();
			$motorista->__set('email', $email);
			$motorista->__set('senha', $senha);
			$motorista->logarSistema();
			
		}else{
			session_start();

			$_SESSION['loginErro'] = "Login ou Senha Inválida";
			header("location: ../views/page-login.php");
			exit;
		}
	}else{
			header("location: ../views/page-login.php");
			exit;
	}
?>