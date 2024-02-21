<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['query'])) {
        $search = $_GET['query'];
        if (!empty($search)) {
            $query = "SELECT content_key, content, user, content_activity FROM history WHERE content_key LIKE '%$search%' OR user LIKE '%$search%' OR content_activity LIKE '%$search%' ORDER BY his_id DESC";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<li class="not-completed">
                            <div class="notice-container">
                                <p>' .htmlspecialchars($row["content"]). '</p>
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
