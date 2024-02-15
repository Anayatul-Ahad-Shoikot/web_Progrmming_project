<?php
    session_start();
    unset($_SESSION['acc_id']);
    header("Location: /log_Sign/Login.php");
    exit(0);
?>