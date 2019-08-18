<?php

    require_once '../../classes/Motorista.php';

    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if(isset($nome) && isset($email) && isset($senha))
    {
        $motorista = new Motorista();
        $motorista->__set("nome", $nome);
        $motorista->__set("email", $email);
        $motorista->__set("senha", $senha);
        $motorista->cadastrar();
        header("location: ../../views/cadastro-motorista.php");
    }else{
        header("location: ../../views/cadastro-motorista.php");
        exit;
    }

?>