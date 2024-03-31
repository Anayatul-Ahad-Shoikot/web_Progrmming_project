<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $postData = json_decode(file_get_contents('php://input'), true);
        $c_id = $postData['c_id'];

        if (!empty($c_id)) {
            $stmt = $con->prepare("DELETE FROM course WHERE c_id = ?");
            $stmt->bind_param("i", $c_id);
            if ($stmt->execute()) {
                header("Location: /course/course.php");
                exit(0);
            } else {
                header("Location: /course/course.php");
                exit(0);
            }
            $stmt->close();
        } else {
            header("Location: /course/course.php");
            exit(0);
        }
        $con->close();
    }
?>
