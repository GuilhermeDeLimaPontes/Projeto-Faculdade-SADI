<?php

    require_once '../../classes/Motorista.php';

    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if(!isset($nome) || $nome === '' || !isset($email) || $email === '' || !isset($senha) || $senha ==='')
    {
        session_start();
        $_SESSION['camposEmBranco'] = "Preencha Todos os Campos";
        header("location: ../../views/cadastro-motorista.php");
        exit;
        
    }else{
        $motorista = new Motorista();
        $motorista->__set("nome", ucwords($nome));
        $motorista->__set("email", $email);
        $motorista->__set("senha", $senha);
        $motorista->cadastrar();
        header("location: ../../views/cadastro-motorista.php");
    }

?>