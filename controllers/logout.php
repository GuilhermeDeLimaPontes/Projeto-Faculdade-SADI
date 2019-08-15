<?php
    session_start();
    session_destroy();
    header("location: ../views/page-login.php");
    exit;
?>