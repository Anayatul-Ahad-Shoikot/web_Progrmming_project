<?php

    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    if (!empty($selectedFaculty)) {
        $stmt = $con->prepare("SELECT f_current_T, f_max_T, f_current_L, f_max_L FROM faculty WHERE f_name = ?");
        $stmt->bind_param("s", $selectedFaculty);
        $stmt->execute();
        $stmt->bind_result($current_T, $max_T, $current_L, $max_L);
        $stmt->fetch();
        $stmt->close();
        $facultyInfo = array(
            'current_T' => $current_T,
            'max_T' => $max_T,
            'current_L' => $current_L,
            'max_L' => $max_L
        );
        echo json_encode($facultyInfo);
    }
    if (!empty($selectedCourse)) {
        $stmt = $con->prepare("SELECT * FROM course WHERE c_name = ?");
        $stmt->bind_param("s", $selectedCourse);
        $stmt->execute();
        $stmt->bind_result($c_code, $c_name, $c_type, $c_sec, $c_time, $c_day);
        $stmt->fetch();
        $stmt->close();
        $courseInfo = array(
            'c_code' => $c_code,
            'c_name' => $c_name,
            'c_type' => $c_type,
            'c_sec' => $c_sec,
            'c_time' => $c_time,
            'c_day' => $c_day
        );
        echo json_encode($courseInfo);
    }
    $con->close();
?>