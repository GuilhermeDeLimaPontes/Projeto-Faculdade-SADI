<?php
    require_once '../../classes/Motorista.php';

    if(isset($_POST['btn-update']))
    {
        $id = $_POST['id_motorista'];
        $nome_update = $_POST['nome_update'];
        $email_update = $_POST['email_update'];

        //VALIDAÇOES PARA FAZER: VERIFICAR SE É UM EMAIL VÁLIDO e se os campos estão todos preenchidos

        $motorista = new Motorista();
        $motorista->__set('nome', $nome_update);
        $motorista->__set('email', $email_update);
        $motorista->editar($id);
        header("location: ../../views/funcionarios.php");
    }
?>