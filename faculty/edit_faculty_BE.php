<?php

    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $postData = json_decode(file_get_contents('php://input'), true);
        $f_id = $postData['f_id'];
        $data = $postData['data'];
        $stmt = $con->prepare("UPDATE faculty SET f_name = ?, f_code = ?, f_mail = ?, f_contact = ?, f_max_T = ?, f_max_L = ? WHERE f_id = ?");
        $stmt->bind_param("ssssiii", $data['name'] ,$data['code'], $data['mail'], $data['contact'], $data['theory'], $data['lab'], $f_id);
        if ($stmt->execute()) {
            $_SESSION['green'] = "Updated successfully";
            header("Location: /faculty/Faculty.php");
        } else {
            $_SESSION['red'] = "Update failed";
            header("Location: /faculty/Faculty.php");
        }
        $stmt->close();
        $con->close();
    }
?>

