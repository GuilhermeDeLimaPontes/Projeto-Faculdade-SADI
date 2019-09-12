<?php
    require_once '../../classes/Motorista.php';

    if(isset($_GET['id']) && is_numeric($_GET['id']))
    {
        $id = (int)$_GET['id'];

        $motorista = new Motorista();
        $motorista->excluir($id);
        header("location: ../../views/funcionarios.php");
    }else{
        echo "erro ao excluir";
    }

?>