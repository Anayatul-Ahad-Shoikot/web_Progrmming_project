<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $postData = json_decode(file_get_contents('php://input'), true);
        $c_id = $postData['c_id'];
        $data = $postData['data'];
        $stmt = $con->prepare("UPDATE course SET c_name = ?, c_code = ?, c_type = ?, c_sec = ? WHERE c_id = ?");
        $stmt->bind_param("ssssi", $data['name'] ,$data['code'], $data['type'], $data['sec'], $c_id);
        if ($stmt->execute()) {
            $_SESSION['green'] = "Updated successfully";
            header("Location: /course/course.php");
        } else {
            $_SESSION['red'] = "Update failed";
            header("Location: /course/course.php");
        }
        $stmt->close();
        $con->close();
    }
?>

