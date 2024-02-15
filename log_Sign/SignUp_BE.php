<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    session_start();

    if(isset($_POST['signup_btn'])) {
        
        $username = $_POST['username'];
        $useremail = $_POST['useremail'];
        $userpassword = $_POST['userpassword'];
        $confirm_password = $_POST['confirm_password'];
    
        $Name_Check_Query = "SELECT username FROM accounts WHERE username = '$username' LIMIT 1";
        $Name_Check_Query_Result = mysqli_query($con, $Name_Check_Query);

        if (mysqli_num_rows($Name_Check_Query_Result) > 0) {
            $_SESSION['red'] = "Warning: Username Already Exists.";
            header("Location: /Log_Sign/Signup.php");
            exit(0);
        }

        $Email_Check_Query = "SELECT useremail FROM accounts WHERE useremail = '$useremail' LIMIT 1";
        $Email_Check_Query_Result = mysqli_query($con, $Email_Check_Query);
        if (mysqli_num_rows($Email_Check_Query_Result) > 0) {
            $_SESSION['red'] = "Warning: Email Already Exists.";
            header("Location:  /Log_Sign/Signup.php");
            exit(0);
        }

        if ($userpassword !== $confirm_password) {
            $_SESSION['red'] = "Warning: Password Doesn't Match";
            header("Location: /Log_Sign/Signup.php");
            exit(0);
        }

        $hashed_password = password_hash($userpassword, PASSWORD_BCRYPT);

        $SignUp_Query = "INSERT INTO accounts (username, useremail, userpassword) VALUES ('$username', '$useremail', '$hashed_password')";
        if (mysqli_query($con, $SignUp_Query)) {
            $_SESSION['green'] = "SignUp Successfull! Login to continue.";
            header("Location: /Log_Sign/Login.php");
            exit(0);
        } else {
            $_SESSION['red'] = "Warning: Signup failed.";
            header("Location: /Log_Sign/Signup.php");
            exit(0);
        }
    }

    mysqli_close($con);

    ?>