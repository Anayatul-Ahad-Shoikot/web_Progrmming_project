<?php

    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    session_start();
    $user = $_SESSION['username'];
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
            $sql = "SELECT username, useremail, priority FROM accounts WHERE username = '$username' OR useremail = '$useremail' OR priority = $priority LIMIT 1";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                if ($row['username'] == $username) {
                    $_SESSION['red'] = "AdminName already exists";
                } elseif ($row['useremail'] == $useremail) {
                    $_SESSION['red'] = "AdminEmail already exists";
                } elseif ($row['priority'] == $priority) {
                    $_SESSION['red'] = "Admin Priority clashing";
                }
                header("Location: /accounts/account.php");
                exit(0);
            }
            if ($prior == 1) {
                $sql2 = "SELECT userpassword FROM accounts where ac_id = $ac_id LIMIT 1";
                $result2 = mysqli_query($con, $sql2);
                $row = mysqli_fetch_assoc($result2);
                $stored_password = $row['userpassword'];
                    if(password_verify($userpassword, $stored_password)){
                        if ($Password == $ConfirmPassword) {
                            $hashed_password = password_hash($Password, PASSWORD_DEFAULT);
                            $sql = "INSERT INTO accounts (username, useremail, userpassword, priority) VALUES (?, ?, ?, ?)";
                            $stmt  = $con->prepare($sql);
                            $stmt->bind_param("sssi", $username, $useremail, $hashed_password, $priority);
                            $stmt->execute();
                            if ($stmt->execute()) {
                                $content = 'Admin added ('  . date('Y/m/d  H:i').') ---' . $user;
                                $content_key = 'admin';
                                $content_activity = 'add';
                                $stmt2 = $con->prepare("INSERT INTO history (content_key, content, user, content_activity) VALUES (?, ?, ?, ?)");
                                $stmt2->bind_param("ssss", $content_key, $content, $user, $content_activity);
                                $stmt2->execute();
                                $stmt2->close();
                                $stmt->close();
                                $_SESSION['green'] = "Admin Added successfully";
                                header("Location: /accounts/account.php");
                                exit(0);
                            } else {
                                $_SESSION['red'] = "Failed to create admin";
                                header("Location: /accounts/account.php");
                                exit(0);
                            }
                        } else {
                            $_SESSION['red'] = "Password miss matched";
                            header("Location: /accounts/account.php");
                            exit(0);
                        }
                    } else {
                        $_SESSION['red'] = "Wrong Password";
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

    mysqli_close($con);
?>