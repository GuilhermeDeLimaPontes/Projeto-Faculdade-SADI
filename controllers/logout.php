<?php

    if(isset($_GET['logout']) && $_GET['logout'] == 1){
    session_start();
    $_SESSION['IDMOTORISTA'] = NULL;
    $_SESSION['NOME'] = NULL;
    header("location: ../views/page-login.php");
    exit;
}
?>