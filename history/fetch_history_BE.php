<?php  
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    
    $sql = "SELECT key_word, content FROM history ORDER BY his_id DESC";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<li class="not-completed">
                    <div class="notice-container">
                        <p>' .htmlspecialchars($row["content"]). '</p>
                    </div>
                </li>';
        }
    }
    $con->close();
?>
<!-- 
<div class="notice-date">
    <div class="date">
    <h1>' .htmlspecialchars($row["key_word"]). '</h1>
    </div>
    </div> -->
