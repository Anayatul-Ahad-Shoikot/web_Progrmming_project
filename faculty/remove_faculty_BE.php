<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    session_start();
    $user = $_SESSION['username'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $postData = json_decode(file_get_contents('php://input'), true);
        $f_id = $postData['f_id'];

        if (!empty($f_id)) {
            $stmt = $con->prepare("DELETE FROM faculty WHERE f_id = ?");
            $stmt->bind_param("i", $f_id);
            if ($stmt->execute()) {
                $content = 'Faculty "'. $f_name. '" removed ('. date('Y/m/d  H:i').') ---'.$user;
                $content_key = 'faculty';
                $content_activity = 'add';
                $stmt2 = $con->prepare("INSERT INTO history (content_key, content, user, content_activity) VALUES (?, ?, ?, ?)");
                $stmt2->bind_param("ssss", $content_key, $content, $user, $content_activity);
                $stmt2->execute();
                $_SESSION['green'] = "Faculty removed successfully";
                header("Location: /faculty/Faculty.php");
                exit(0);
            } else {
                $_SESSION['red'] = "Faculty removed failed";
                header("Location: /faculty/Faculty.php");
                exit(0);
            }
            $stmt->close();
        } else {
            header("Location: /faculty/Faculty.php");
            exit(0);
        }
        $con->close();
    }
?>
