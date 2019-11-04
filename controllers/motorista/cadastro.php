<?php

    require_once '../../classes/Motorista.php';


    if(isset($_POST['cadastrar_motorista']))
    {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            
            if(isset($_POST['adm']))
            {
                $isAdmin = $_POST['adm'] = 1;
            }else{
                $isAdmin = $_POST['adm'] = 0;
            }

            session_start();
            
            if($_SESSION['isAdmin'] == 1)
            {
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
                    $motorista->__set("isAdmin", $isAdmin);
                    $motorista->cadastrar();
                    header("location: ../../views/cadastro-motorista.php");
                }
            }else{
                session_start();
                $_SESSION['permissaoNegada'] = "Apenas Administradores podem cadastrar Motoristas";
                header("location: ../../views/cadastro-motorista.php");
            }
    }
?>