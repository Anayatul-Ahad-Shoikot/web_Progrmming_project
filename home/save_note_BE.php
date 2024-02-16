<?php

    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    session_start();

    $user = $_SESSION['username'];
        if (isset($_POST['save'])) {
            $note_for = $_POST['note_for'];
            $note_content = $_POST['note_content'];
            $stmt = $con->prepare("INSERT INTO notes (note_for, note_content) VALUES (?, ?)");
            $stmt->bind_param("ss", $note_for, $note_content);
            if ($stmt->execute()) {
                $history_content = 'Note created for '. $note_for. ' by '.$user . '('. date('Y/m/d  H:i').').';
                $key_words = 'Note';
                $stmt2 = $con->prepare("INSERT INTO history (key_word, content) VALUES (?, ?)");
                $stmt2->bind_param("ss", $key_words, $history_content);
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