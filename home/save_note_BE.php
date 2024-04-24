<?php

    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    session_start();

    $user = $_SESSION['username'];
        if (isset($_POST['save'])) {
            $f_code = $_POST['f_code'];
            $note_content = $_POST['note_content'];
            $stmt = $con->prepare("INSERT INTO notes (f_code, note_content) VALUES (?, ?)");
            $stmt->bind_param("ss", $f_code, $note_content);
            if ($stmt->execute()) {
                $content = 'Note created for '. $f_code. ' ('. date('Y/m/d  H:i').') ---'.$user;
                $content_key = 'note';
                $content_activity = 'create';
                $stmt2 = $con->prepare("INSERT INTO history (content_key, content, user, content_activity) VALUES (?, ?, ?, ?)");
                $stmt2->bind_param("ssss", $content_key, $content, $user, $content_activity);
                $stmt2->execute();
                header("Location: /home/Home.php");
                exit(0);
            } else {
                header("Location: /home/Home.php");
                exit(0);
            }
            $stmt->close();
            $stmt2->close();
            $con->close();
        } else {
            echo 'failed';
        }

?>