<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    session_start();

    if (isset($_SESSION['ac_id']) && isset($_SESSION['prior'])) {
        $ac_id = $_SESSION['ac_id'];
        $prior = $_SESSION['prior'];

        if (isset($_POST['submit1'])) {
            if (isset($_POST['userpassword'])) {
                $userpassword = $_POST['userpassword'];
                $Name_Check_Query = "SELECT userpassword FROM accounts WHERE ac_id = $ac_id AND priority = $prior LIMIT 1";
                $Name_Check_Query_Result = mysqli_query($con, $Name_Check_Query);
                if(mysqli_num_rows($Name_Check_Query_Result) == 1) {
                    $row = mysqli_fetch_array($Name_Check_Query_Result);
                    $stored_hashed_acc_pass = $row['userpassword'];    
                    if (password_verify($userpassword, $stored_hashed_acc_pass)) {
                        if (isset($_POST['username']) && !empty($_POST['username'])) {
                            $username = $_POST['username'];
                            $Name_Check_Query = "SELECT username FROM accounts WHERE username = '$username' LIMIT 1";
                            $Name_Check_Query_Result = mysqli_query($con, $Name_Check_Query);
                            if (mysqli_num_rows($Name_Check_Query_Result) > 0) {
                                $_SESSION['red'] = "Warning: Username Already Exists.";
                                header("Location: /accounts/account.php");
                                exit(0);
                            } else {
                                $SQL = "UPDATE accounts SET username = ? WHERE ac_id = ? AND priority = ? LIMIT 1";
                                $stmt = mysqli_prepare($con, $SQL);
                                mysqli_stmt_bind_param($stmt, "sii", $username, $ac_id, $prior);
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_close($stmt);
                                $_SESSION['green'] = "Success: Username Updated.";
                                header("Location: /accounts/account.php");
                                exit(0);
                            }
                            
                        }
                        if (isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])) {
                            $image_name = $_FILES["image"]["name"];
                            $image_tmp_name = $_FILES["image"]["tmp_name"];
                            $image_path = "img/" . $image_name;
                            move_uploaded_file($image_tmp_name, $image_path);
                            $SQL2="UPDATE accounts SET img = '$image_path' WHERE ac_id = $ac_id AND priority = $prior LIMIT 1";
                            mysqli_query($con, $SQL2);
                            $_SESSION['green'] = "Success: Image Updated.";
                            header("Location: /accounts/account.php");
                            exit(0);
                        }
                        if (isset($_POST['useremail']) && !empty($_POST['useremail'])) {
                            $useremail = $_POST['useremail'];
                            $Email_Check_Query = "SELECT useremail FROM accounts WHERE useremail = '$useremail' LIMIT 1";
                            $Email_Check_Query_Result = mysqli_query($con, $Email_Check_Query);
                            if (mysqli_num_rows($Email_Check_Query_Result) > 0) {
                                $_SESSION['red'] = "Warning: Useremail Already Exists.";
                                header("Location: /accounts/account.php");
                                exit(0);
                            } else {
                                $SQL = "UPDATE accounts SET useremail = ? WHERE ac_id = ? AND priority = ? LIMIT 1";
                                $stmt = mysqli_prepare($con, $SQL);
                                mysqli_stmt_bind_param($stmt, "sii", $useremail, $ac_id, $prior);
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_close($stmt);
                                $_SESSION['green'] = "Success: Useremail Updated.";
                                header("Location: /accounts/account.php");
                                exit(0);
                            }
                        }
                        if ((isset($_POST['newpass']) && !empty($_POST['newpass'])) && (isset($_POST['re-pass']) && !empty($_POST['re-pass'])) ) {
                            $newpass = $_POST['newpass'];
                            $re_pass = $_POST['re-pass'];
                            if ($newpass !== $re_pass) {
                                $_SESSION['red'] = "Warning: Password Doesn't Match";
                                header("Location: /accounts/account.php");
                                exit(0);
                            } else {
                                $hashed_password = password_hash($newpass, PASSWORD_BCRYPT);
                                $SignUp_Query = "UPDATE accounts SET userpassword = '$hashed_password' WHERE ac_id = $ac_id AND priority = $prior LIMIT 1";
                                mysqli_query($con, $SignUp_Query);
                                $_SESSION['green'] = "Success: Password Updated.";
                                header("Location: /accounts/account.php");
                                exit(0);
                            }
                        }
                    } else {
                        $_SESSION['red'] = "Warning: Wrong password";
                        header("Location: /accounts/account.php");
                        exit(0);
                    }
                }
            }
        }
    } else {
        $_SESSION['red'] = "Warning: Login first";
        header("Location: /log_Sign/Login.php");
        exit(0);
    }

    mysqli_close($con);
?>