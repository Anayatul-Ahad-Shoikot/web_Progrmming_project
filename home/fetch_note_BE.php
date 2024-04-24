<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');

    $sql = "SELECT * FROM notes WHERE visibility = 1";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $f_code = $row['f_code'];
            $sql2 = "SELECT f_name FROM faculty WHERE f_code = ?";
            $stmt = $con->prepare($sql2);
            $stmt->bind_param("s", $f_code);
            $stmt->execute();
            $result2 = $stmt->get_result();
            $facultyRow = $result2->fetch_assoc();
            $facultyname = $facultyRow['f_name'];
            echo '<li>
                    <div class="hdr">
                        <div><p>' . htmlspecialchars($facultyname) . ' ['. $f_code .'] </p></div>
                        <div>
                            <a href="#" class="edit-note"><i class=\'bx bxs-edit-alt\'></i></a>
                            <a href="/home/remove_note_BE.php?note_id=' . $row["note_id"] . '" ><i class=\'bx bxs-message-square-x\'></i></a>
                        </div>
                    </div>
                    <div class="dsrptn">
                        <p>' . htmlspecialchars($row["note_content"]) . '</p>
                    </div>
                </li>';
            $stmt->close();
        }
    } else {
        echo '<div class="blur"><h1>No Notes to Show</h1></div>';
    }
    $con->close();
?>