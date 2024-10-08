<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['query'])) {
        $search = $_GET['query'];
        if (!empty($search)) {
            $query = "SELECT * FROM notes WHERE (note_content LIKE '%$search%') OR (f_code LIKE '%$search%') AND visibility = 1";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<li>
                    <div class="hdr">
                        <div><p>' . htmlspecialchars($row["f_code"]) . '</p></div>
                        <div>
                        <a href="" class="edit-note"><i class=\'bx bxs-edit-alt\'></i></a>
                        <a href="/home/remove_note_BE.php?note_id='.$row["note_id"].'" ><i class=\'bx bxs-message-square-x\'></i></a>
                        </div>
                    </div>
                    <div class="dsrptn">
                        <p>' . htmlspecialchars($row["note_content"]) . '</p>
                    </div>
                </li>';
                }
                $_SESSION['green'] = "Search found";
            } else {
                $_SESSION['red'] = "No result found";
            }
        } else {
            $_SESSION['red'] = "Nothing to search with empty word !";
        }
    } else {
        $_SESSION['red'] = "Invalid request !";
        exit(0);
    }
    mysqli_close($con);
?>
