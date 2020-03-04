<?php

    if(isset($_GET['logout']) && $_GET['logout'] == 1){
    session_start();
    unset($_SESSION['IDMOTORISTA']);
    unset($_SESSION['NOME']);
    unset($_SESSION['isAdmin']);
    
    header("location: ../views/page-login.php");
    exit;
}
?>