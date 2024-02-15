<?php

    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    session_start();
    if (isset($_SESSION['ac_id']) && isset($_SESSION['prior'])) {
        $ac_id = $_SESSION['ac_id'];
        $prior = $_SESSION['prior'];
        if (isset($_POST['submit2'])) {
            $acc_name = $_POST['acc_name'];
            $admin_name = $_POST['admin_name'];
            $acc_email = $_POST['acc_email'];
            $priyority = $_POST['admin_priyority'];
            $acc_pass = $_POST['acc_pass'];
            $con_pass = $_POST['con_pass'];
            $admin_contact = $_POST['admin_contact'];
            $Admin_pass = $_POST['Admin_pass'];
            $image_name = $_FILES["image"]["name"];
            $image_tmp_name = $_FILES["image"]["tmp_name"];
            $image_path = "img/" . $image_name;
            move_uploaded_file($image_tmp_name, $image_path);
            $time = date("Y-m-d H:i:s");
            $role = "admin";
            $sql = "SELECT u.acc_pass ,d.acc_id, d.admin_priyority FROM accounts AS u LEFT JOIN admin_list AS d ON u.acc_id = d.acc_id WHERE u.acc_id = $acc_id";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);
                $stored_password = $row['acc_pass'];
                $admin_priyority = $row['admin_priyority'];
                if (($acc_pass == $con_pass) && ($admin_priyority == 1)){
                    if (password_verify($Admin_pass, $stored_password)) {
                        $hashed_password = password_hash($acc_pass, PASSWORD_DEFAULT);
                        
                        $sql = "INSERT INTO accounts (acc_name, acc_email, acc_pass, role, acc_join_date) VALUES (?, ?, ?, ?, ?)";
                        $stmt  = $con->prepare($sql);
                        $stmt->bind_param("sssss", $acc_name, $acc_email, $hashed_password, $role, $time);
                        $stmt->execute();
                        $userid = $stmt->insert_id;
                        $sql2 = "INSERT INTO admin_list (acc_id, admin_contact, admin_name, admin_priyority, admin_image) VALUES (?, ?, ?, ?, ?)";
                        $stmt2 = $con->prepare($sql2);
                        $stmt2->bind_param("issis", $userid ,$admin_contact, $admin_name, $priyority, $image_path);
                        if ($stmt2->execute()) {
                            $_SESSION['success'] = "Admin Added successfully";
                            header("Location: /Root/Admin_Side/Dash/Admin/ADMIN_PROFILE.php");
                            exit();
                        } else {
                            $_SESSION['error'] = "Failed to add admin";
                            header("Location: /Root/Admin_Side/Dash/Admin/ADMIN_PROFILE.php");
                        }
                        $stmt->close();
                        $stmt2->close();
                    } else {
                        $_SESSION['error'] = "Incorrect Password";
                        header("Location: /Root/Admin_Side/Dash/Admin/ADMIN_PROFILE.php");
                    }
                } else {
                    $_SESSION['error'] = "password not matched";
                    header("Location: /Root/Admin_Side/Dash/Admin/ADMIN_PROFILE.php");
                }
            } else {
                echo "Admin not found";
            }
        }
    } else {
        echo "login first";
    }

    mysqli_close($con);
?>