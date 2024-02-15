<?php

    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    session_start();
    if (isset($_SESSION['ac_id']) && isset($_SESSION['prior'])) {
        $ac_id = $_SESSION['ac_id'];
        $prior = $_SESSION['prior'];
        if (isset($_POST['submit2'])) {
            $username = $_POST['username'];
            $useremail = $_POST['useremail'];
            $priority = $_POST['priority'];
            $Password = $_POST['Password'];
            $ConfirmPassword = $_POST['ConfirmPassword'];
            $userpassword = $_POST['userpassword'];
            $sql = "SELECT userpassword, priority FROM accounts WHERE ac_id = $ac_id LIMIT 1";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);
                $stored_password = $row['userpassword'];
                $priority = $row['priority'];
                if ($prior == 1){
                    if($Password == $ConfirmPassword){
                        if ($priority !== 1 ) {
                            if (password_verify($userpassword, $stored_password)) {
                                $hashed_password = password_hash($Password, PASSWORD_DEFAULT);
                                $sql = "INSERT INTO accounts (username, useremail, userpassword, priority) VALUES (?, ?, ?, ?)";
                                $stmt  = $con->prepare($sql);
                                $stmt->bind_param("sssi", $username, $useremail, $hashed_password, $priority);
                                $stmt->execute();
                                if ($stmt->execute()) {
                                    $_SESSION['green'] = "Admin Added successfully";
                                    header("Location: /accounts/account.php");
                                    exit(0);
                                } else {
                                    $_SESSION['red'] = "Failed to create admin";
                                    header("Location: /accounts/account.php");
                                    exit(0);
                                }
                                $stmt->close();
                            } else {
                                $_SESSION['red'] = "Incorrect Password";
                                header("Location: /accounts/account.php");
                                exit(0);
                            }
                        } else {
                            $_SESSION['red'] = "Can't create with priority 1";
                            header("Location: /accounts/account.php");
                            exit(0);
                        }
                    } else {
                        $_SESSION['red'] = "Password miss matched";
                        header("Location: /accounts/account.php");
                        exit(0);
                    }
                } else {
                    $_SESSION['red'] = "You don't have permission to create new admin";
                    header("Location: /accounts/account.php");
                    exit(0);
                }
            } else {
                    $_SESSION['red'] = "Please Login First";
                    header("Location: /log_Sign/Login.php");
                    exit(0);
            }
        }
    } else {
        $_SESSION['red'] = "Please Login First";
        header("Location: /log_Sign/Login.php");
        exit(0);
    }

    mysqli_close($con);
?>