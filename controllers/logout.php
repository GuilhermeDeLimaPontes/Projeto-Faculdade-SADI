<?php

    if(isset($_GET['logout']) && $_GET['logout'] == 1){
    session_start();
    $_SESSION['IDMOTORISTA'] = NULL;
    header("location: ../views/page-login.php");
    exit;
}
?>