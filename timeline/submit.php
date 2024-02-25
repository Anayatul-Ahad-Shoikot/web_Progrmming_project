<?php
session_start();
include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    if(isset($_POST['add_btn'])) {
        $f_name = $_POST['faculty'];
        $c_name = $_POST['course'];
        $c_code = $_POST['codeInput'];
        $c_type = $_POST['typeInput'];
        $c_sec = $_POST['secInput'];
        $c_time = $_POST['timeInput'];
        $c_day = $_POST['dayInput'];
        $c_t = $_POST['c_t'];
        $m_t = $_POST['m_t'];
        $c_l = $_POST['c_l'];
        $m_l = $_POST['m_l'];
        // $stmt = $con->prepare("INSERT INTO timeline (faculty_code, course_code, section, time, day) VALUES (?, ?, ?, ?, ?)");
        // $stmt->bind_param("sssss", $faculty, $codeInput, $secInput, $timeInput, $dayInput);
        // if ($stmt->execute()) {
        //         $_SESSION['green'] = "Data added successfully!";
        // } else {
        //     $_SESSION['red'] = "Error adding data: " . $con->error;
        // }
        // $stmt->close();
    }
// $con->close();
// header("Location: /timeline/timeline.php");
?>
