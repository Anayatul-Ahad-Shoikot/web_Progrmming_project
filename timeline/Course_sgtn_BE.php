<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    $sql = "SELECT * FROM courses";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['c_id'] . '" data-current_T="' . $row['current_T'] . '" data-max_T="' . $row['max_T'] . '" data-current_L="' . $row['current_L'] . '" data-max_L="' . $row['max_L'] . '">' . $row['course_name'] . '</option>';
        }
    }
    $con->close();
?>