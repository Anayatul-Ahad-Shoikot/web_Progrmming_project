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
            $content = 'Deleted a note [Note id = '. $note_id. '] '. date('Y/m/d  H:i').' ---'.$user;
            $content_key = 'note';
            $content_activity = 'delete';
            $stmt2 = $con->prepare("INSERT INTO history (content_key, content, user, content_activity) VALUES (?, ?, ?, ?)");
            $stmt2->bind_param("ssss", $content_key, $content, $user, $content_activity);
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
