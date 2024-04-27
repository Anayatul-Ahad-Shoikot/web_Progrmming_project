<?php
    session_start();
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    $user = $_SESSION['username'];
        if(isset($_POST['add_btn'])) {
            $f_code = $_POST['faculty'];
            $course_data = $_POST['course'];
            list($c_code, $c_sec) = explode('|', $course_data, 2);
            $stmt0 = $con->prepare("SELECT c_time, c_day1, c_day2, c_type FROM course WHERE c_code = ? AND c_sec = ?");
            $stmt0->bind_param("ss", $c_code, $c_sec);
            $stmt0->execute();
            $result0 = $stmt0->get_result();
            if ($row0 = $result0->fetch_assoc()) {
                $c_time = $row0['c_time'];
                $c_day1 = $row0['c_day1'];
                $c_day2 = $row0['c_day2'];
                $c_type = $row0['c_type'];
            }
            $stmt0->close();
            $stmt = $con->prepare("INSERT INTO timeline (f_code, c_code, section, time, day1, day2) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $f_code, $c_code, $c_sec, $c_time, $c_day1, $c_day2);
            if ($stmt->execute()) {
                if($c_type == 'Theory'){
                    // $updateFacultyInfo = "UPDATE faculty SET f_current_T = f_current_T + 1  WHERE f_name = '$f_name' LIMIT 1";
                    // $updateFacultyInfoResult = mysqli_query($con, $updateFacultyInfo);
                    // $updateCourseInfo = "UPDATE course SET Allocation = 'Assigned' WHERE c_name = '$c_name' AND c_type = '$c_type' AND c_sec = '$c_sec' LIMIT 1";
                    // $updateCourseInfoResult = mysqli_query($con, $updateCourseInfo);
                    // if ($updateCourseInfoResult && $updateFacultyInfoResult) {
                    //     $content = 'Faculty['. $f_name .'] assigned to '. $c_name .' ('  . date('Y/m/d  H:i').') ---' . $user;
                    //     $content_key = 'Facult course';
                    //     $content_activity = 'Assigned';
                    //     $stmt2 = $con->prepare("INSERT INTO history (content_key, content, user, content_activity) VALUES (?, ?, ?, ?)");
                    //     $stmt2->bind_param("ssss", $content_key, $content, $user, $content_activity);
                    //     $stmt2->execute();
                    //     $stmt2->close();
                    $_SESSION['green'] = "Couese Assigned successfully!";
                    header("Location: /timeline/timeline.php");
                    exit(0);
                    // } else {
                    //     $_SESSION['green'] = "Couese Assigned but faculty-course not updated";
                    //     header("Location: /timeline/timeline.php");
                    // }
                } else {
                    // $updateFacultyInfo = "UPDATE faculty SET f_current_L = f_current_L + 1  WHERE f_name = '$f_name' LIMIT 1";
                    // $updateFacultyInfoResult = mysqli_query($con, $updateFacultyInfo);
                    // $updateCourseInfo = "UPDATE course SET Allocation = 'Assigned' WHERE c_name = '$c_name' AND c_type = '$c_type' AND c_sec = '$c_sec' LIMIT 1";
                    // $updateCourseInfoResult = mysqli_query($con, $updateCourseInfo);
                    // if ($updateCourseInfoResult && $updateFacultyInfoResult) {
                    //     $content = 'Faculty['. $f_name .'] assigned to '. $c_name .' ('  . date('Y/m/d  H:i').') ---' . $user;
                    //     $content_key = 'Facult course';
                    //     $content_activity = 'Assigned';
                    //     $stmt2 = $con->prepare("INSERT INTO history (content_key, content, user, content_activity) VALUES (?, ?, ?, ?)");
                    //     $stmt2->bind_param("ssss", $content_key, $content, $user, $content_activity);
                    //     $stmt2->execute();
                    //     $stmt2->close();
                    $_SESSION['green'] = "Couese Assigned successfully!";
                    header("Location: /timeline/timeline.php");
                    exit(0);
                    // } else {
                    //     $_SESSION['green'] = "Couese Assigned but faculty-course not updated";
                    //     header("Location: /timeline/timeline.php");
                    // }
                }
            } else {
                $_SESSION['red'] = "Faild to Assign course.";
                header("Location: /timeline/timeline.php");
            }
            $stmt->close();
        } else {
            $_SESSION['red'] = "Please Insert Data First";
            header("Location: /timeline/timeline.php");
        }
    $con->close();
?>