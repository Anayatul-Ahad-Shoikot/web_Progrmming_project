<?php

include('/xampp/htdocs/web_Progrmming_project/db_con.php');
session_start();
$user = $_SESSION['username'];

if (isset($_SESSION['ac_id']) && isset($_SESSION['prior'])) {
    $ac_id = $_SESSION['ac_id'];
    $prior = $_SESSION['prior'];
        if (isset($_POST['removed_id'])) {
            $admin_id_to_remove = $_POST['removed_id'];
            if (($prior == 1) && ($prior !== $admin_id_to_remove)) {
                $sql_remove = "DELETE FROM accounts WHERE ac_id = ?";
                $stmt_remove = $con->prepare($sql_remove);
                $stmt_remove->bind_param("i", $admin_id_to_remove);
                $stmt_remove->execute();
                $stmt_remove->close();
                if ($con->affected_rows > 0) {
                    $content = 'Admin removed (' . date('Y/m/d H:i') . ') ---' . $user;
                    $content_key = 'admin';
                    $content_activity = 'remove';
                    $stmt2 = $con->prepare("INSERT INTO history (content_key, content, user, content_activity) VALUES (?, ?, ?, ?)");
                    $stmt2->bind_param("ssss", $content_key, $content, $user, $content_activity);
                    $stmt2->execute();
                    $stmt2->close();
                    $_SESSION['green'] = "Admin removed successfully";
                } else {
                    $_SESSION['red'] = "Failed to remove admin";
                }

                header("Location: /accounts/account.php");
                exit(0);
            } else {
                $_SESSION['red'] = "You don't have permission to remove admin";
                header("Location: /accounts/account.php");
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
