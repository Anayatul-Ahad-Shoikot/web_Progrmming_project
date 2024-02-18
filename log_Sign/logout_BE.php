<?php
    session_start();
    unset($_SESSION['acc_id']);
    unset($_SESSION['username']);
    unset($_SESSION['prior']);
    unset($_SESSION['red']);
    unset($_SESSION['green']);
    header("Location: /log_Sign/Login.php");
    exit(0);
?>