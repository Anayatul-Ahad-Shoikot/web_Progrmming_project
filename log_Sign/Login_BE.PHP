<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    session_start();

    if(isset($_POST['login_btn'])) {
            $username = $_POST['username'];
            $userpassword = $_POST['userpassword'];
            $Name_Check_Query = "SELECT username, userpassword, ac_id, priority FROM accounts WHERE BINARY username = '$username' LIMIT 1";
            $Name_Check_Query_Result = mysqli_query($con, $Name_Check_Query);
            if(mysqli_num_rows($Name_Check_Query_Result) == 1) {
                $row = mysqli_fetch_array($Name_Check_Query_Result);
                $stored_hashed_acc_pass = $row['userpassword'];    
                if (password_verify($userpassword, $stored_hashed_acc_pass)) {
                    $_SESSION['ac_id'] = $row['ac_id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['prior'] = $row['priority'];
                    header("Location: /home/Home.php");
                    exit(0);
                } else {
                    $_SESSION['red'] = "Warning: Wrong password";
                    header("Location: /log_Sign/Login.php");
                    exit(0);
                }
            } else {
                $_SESSION['red'] = "Warning: Username does not exist";
                header("Location: /log_Sign/Login.php");
                exit(0);
            }
        }

    mysqli_close($con);
?>