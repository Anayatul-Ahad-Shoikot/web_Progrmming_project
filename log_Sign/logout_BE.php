<?php
    session_start();
    unset($_SESSION['acc_id']);
    unset($_SESSION['username']);
    unset($_SESSION['prior']);
    header("Location: /log_Sign/Login.php");
    exit(0);
?>