<?php
include('/xampp/htdocs/web_Progrmming_project/db_con.php');
session_start();
$user = $_SESSION['username'];
if(isset($_GET['note_id'])) {
    $note_id = $_GET['note_id'];
    $sql = "UPDATE notes SET visibility = 0 WHERE note_id = ?";
    if($stmt = $con->prepare($sql)) {
        $stmt->bind_param("i", $note_id);
        if($stmt->execute()) {
            $history_content = $user.' deleted a note(Note id = '. $note_id. ') at '. date('Y/m/d  H:i').'.';
            $key_words = 'Note';
            $stmt2 = $con->prepare("INSERT INTO history (key_word, content) VALUES (?, ?)");
            $stmt2->bind_param("ss", $key_words, $history_content);
            $stmt2->execute();
            header('Location: /home/Home.php');
            exit(0);
        } else {
            $_SESSION['red'] = "Error: " . $con->error;
        }
        $stmt->close();
    } else {
        $_SESSION['red'] = "Error preparing the statement: " . $con->error;
    }
} else {
    $_SESSION['red'] = "Note ID not provided.";
}
$con->close();
?>
