<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    $sql = "SELECT * FROM course WHERE Allocation = 'Not Assigned' AND (c_day1 = 'Tue' OR c_day2 = 'Tue')";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['c_name'] . '" data-code="' . $row['c_code'] . '" data-type="' . $row['c_type'] . '" data-sec="' . $row['c_sec'] . '" data-time="' . $row['c_time'] . '" data-day1="' . $row['c_day1'] . '" data-day2="' . $row['c_day2'] . '">' . $row['c_name'] . '['.$row['c_type'].'] - '.$row['c_sec'].'</option>';
        }
    }
    $con->close();
?>