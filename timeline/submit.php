<?php
session_start();
include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    if(isset($_POST['add_btn'])) {
        $faculty = $_POST['faculty'];
        $course = $_POST['course'];
        $codeInput = $_POST['codeInput'];
        $typeInput = $_POST['typeInput'];
        $secInput = $_POST['secInput'];
        $timeInput = $_POST['timeInput'];
        $dayInput = $_POST['dayInput'];
        $stmt = $con->prepare("INSERT INTO timeline (faculty_code, course_code, section, time, day) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $faculty, $codeInput, $secInput, $timeInput, $dayInput);
        if ($stmt->execute()) {
                $_SESSION['green'] = "Data added successfully!";
        } else {
            $_SESSION['red'] = "Error adding data: " . $con->error;
        }
        $stmt->close();
    }
$con->close();
header("Location: /timeline/timeline.php");
?>
