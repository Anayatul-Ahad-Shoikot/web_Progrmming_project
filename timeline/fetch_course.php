<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    $sql = "SELECT * FROM course WHERE Allocation = 'Not Assigned'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['c_name'] . '" data-code="' . $row['c_code'] . '" data-type="' . $row['c_type'] . '" data-sec="' . $row['c_sec'] . '" data-time="' . $row['c_time'] . '" data-day="' . $row['c_day'] . '">' . $row['c_name'] . '['.$row['c_type'].'] - '.$row['c_sec'].'</option>';
        }
    }
    $con->close();
?>