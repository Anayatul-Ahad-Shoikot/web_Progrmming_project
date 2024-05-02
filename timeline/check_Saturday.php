<?php
    include '/xampp/htdocs/web_Progrmming_project/db_con.php';
    $facultyId = $_GET['facultyId'];
    $courseId = $_GET['courseId'];
    $sql = "SELECT c_startTime, c_endTime, c_type, c_day1, c_day2 FROM course WHERE c_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $courseId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $selected_c_startTime = $row['c_startTime'];
        $selected_c_endTime = $row['c_endTime'];
        $selected_c_type = $row['c_type'];
        $selected_c_day1 = $row['c_day1'];
        $selected_c_day2 = $row['c_day2'];
    }

    $sql2 = "SELECT c_id FROM timeline WHERE f_code = ?";
    $stmt2 = $con->prepare($sql2);
    $stmt2->bind_param("i", $facultyId);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    while ($row2 = $result2->fetch_assoc()) {
        $fetched_courseId[] = $row2['c_id'];
        $sql3 = "SELECT c_startTime, c_endTime, c_type, c_day1, c_day2 FROM course WHERE c_id = ? AND (c_day1 = 'Sat' OR c_day1 = 'Tue')";
        $stmt3 = $con->prepare($sql3);
        $stmt3->bind_param("i", $courseId);
        $stmt3->execute();
        $result3 = $stmt3->get_result();
        if ($row3 = $result3->fetch_assoc()) {
            $selected_c_startTime = $row3['c_startTime'];
            $selected_c_endTime = $row3['c_endTime'];
            $selected_c_type = $row3['c_type'];
            $selected_c_day1 = $row3['c_day1'];
            $selected_c_day2 = $row3['c_day2'];
        }

    }
    
    
    // if ($result2->num_rows > 0) {
    //     echo "assigned";
    // } else {
    //     echo "not assigned";
    // }
    $con->close();
?>
