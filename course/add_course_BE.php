<?php 
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    session_start();
    $user = $_SESSION['username'];
    if (isset($_SESSION['ac_id']) && isset($_SESSION['prior'])) {
        $ac_id = $_SESSION['ac_id'];
        $prior = $_SESSION['prior'];
            if (isset($_POST['add_btn'])) {
                $c_code = strtoupper($_POST["c_code"]);
                $c_name = ucwords(strtolower($_POST['c_name']));
                $c_type = $_POST["c_type"];
                $c_sec = strtoupper($_POST["c_sec"]);
                $c_time = $_POST["c_time"];
                $time_parts = explode('-', $c_time);
                $c_startTime = trim($time_parts[0]);
                $c_endTime = trim($time_parts[1]);
                $c_day = $_POST["c_day1"];
                $day_parts = explode(' ', $c_day);
                $c_day1 = trim($day_parts[0]);
                $c_day2 = trim($day_parts[1]);
                $checkSection = "SELECT * FROM course WHERE (c_code = '$c_code' && c_name = '$c_name' && c_type = '$c_type' && c_sec = '$c_sec')";
                $checkSectionResult = mysqli_query($con, $checkSection);
                if (mysqli_num_rows($checkSectionResult) > 0) {
                    $_SESSION['red'] = "Section Already Exist.";
                    header("Location: /course/course.php");
                    exit(0);
                } else {
                    $sql = "INSERT INTO course (c_code, c_name, c_type, c_sec, c_startTime, c_endTime, c_day1, c_day2) VALUES ('$c_code', '$c_name', '$c_type', '$c_sec', '$c_startTime', '$c_endTime' ,'$c_day1', '$c_day2')";
                    if ($con->query($sql) === TRUE) {
                        $content = 'Course "'. $c_name. '" added ('. date('Y/m/d  H:i').') ---'.$user;
                        $content_key = 'course';
                        $content_activity = 'add';
                        $stmt2 = $con->prepare("INSERT INTO history (content_key, content, user, content_activity) VALUES (?, ?, ?, ?)");
                        $stmt2->bind_param("ssss", $content_key, $content, $user, $content_activity);
                        $stmt2->execute();
                        $_SESSION['green'] = "Course added successfully";
                        header("Location: /course/course.php");
                        exit(0);
                    } else {
                        $_SESSION['red'] = "Course adding failed";
                        header("Location: /course/course.php");
                        exit(0);
                    }
                }
            }
    }
    $con->close();
?>