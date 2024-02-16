<?php  
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');

    $sql = "SELECT note_id, note_for, note_content FROM notes where visibility = 1";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<li>
                    <div class="hdr">
                        <div><p>' . htmlspecialchars($row["note_for"]) . '</p></div>
                        <div>
                        <a href="javascript:void(0);" class="edit-note" data-note-id="'.$row["note_id"].'"><i class=\'bx bxs-edit-alt\'></i></a>
                        <a href="/home/remove_note_BE.php?note_id='.$row["note_id"].'" ><i class=\'bx bxs-message-square-x\'></i></a>
                        </div>
                    </div>
                    <div class="dsrptn">
                        <p>' . htmlspecialchars($row["note_content"]) . '</p>
                    </div>
                </li>';
        }
    } else if ($result->num_rows == 0){
        echo '<div class="blur">
        <h1>No Notes to Show</h1>
        </div>';
    }
    $con->close();
?>
