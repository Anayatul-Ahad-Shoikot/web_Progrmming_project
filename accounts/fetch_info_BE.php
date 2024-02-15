<?php 
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    session_start();
    if (isset($_SESSION['ac_id']) && isset($_SESSION['prior'])) {
        $ac_id = $_SESSION['ac_id'];
        $prior = $_SESSION['prior'];
        $sql = "SELECT username, useremail, img FROM accounts WHERE ac_id = $ac_id AND priority = $prior";
        $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);
                $username = $row['username'];
                $useremail = $row['useremail'];
                $img = $row['img'];
            } else {
                $_SESSION['red'] = "Warning: Failed to fetch data";
                exit(0);
            }
        } else {
            $_SESSION['red'] = "Warning: Please Login First";
            header("Location: /log_Sign/Login.php");
            exit(0);
    }
    mysqli_close($con);
?>