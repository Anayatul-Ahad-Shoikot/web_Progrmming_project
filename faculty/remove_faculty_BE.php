<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $postData = json_decode(file_get_contents('php://input'), true);
        $f_id = $postData['f_id'];

        if (!empty($f_id)) {
            $stmt = $con->prepare("DELETE FROM faculty WHERE f_id = ?");
            $stmt->bind_param("i", $f_id);
            if ($stmt->execute()) {
                header("Location: /faculty/Faculty.php");
                exit(0);
            } else {
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
