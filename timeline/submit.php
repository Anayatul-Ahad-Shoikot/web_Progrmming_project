<?php
    session_start();
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    $user = $_SESSION['username'];
        if(isset($_POST['add_btn']) && isset($_POST['faculty']) && isset($_POST['course'])) {
            $f_name = $_POST['faculty'];
            $c_name = $_POST['course'];
            $c_type = $_POST['typeInput'];
            $c_sec = $_POST['secInput'];
            $c_time = $_POST['timeInput'];
            $c_day = $_POST['dayInput'];
            $stmt = $con->prepare("INSERT INTO timeline (f_name, c_name, section, time, day) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $f_name, $c_name, $c_sec, $c_time, $c_day);
            if ($stmt->execute()) {
                if($c_type == 'Theory'){
                    $updateFacultyInfo = "UPDATE faculty SET f_current_T = f_current_T + 1  WHERE f_name = '$f_name' LIMIT 1";
                    $updateFacultyInfoResult = mysqli_query($con, $updateFacultyInfo);
                    $updateCourseInfo = "UPDATE course SET Allocation = 'Assigned' WHERE c_name = '$c_name' AND c_type = '$c_type' AND c_sec = '$c_sec' LIMIT 1";
                    $updateCourseInfoResult = mysqli_query($con, $updateCourseInfo);
                    if ($updateCourseInfoResult && $updateFacultyInfoResult) {
                        $content = 'Faculty['. $f_name .'] assigned to '. $c_name .' ('  . date('Y/m/d  H:i').') ---' . $user;
                        $content_key = 'Facult course';
                        $content_activity = 'Assigned';
                        $stmt2 = $con->prepare("INSERT INTO history (content_key, content, user, content_activity) VALUES (?, ?, ?, ?)");
                        $stmt2->bind_param("ssss", $content_key, $content, $user, $content_activity);
                        $stmt2->execute();
                        $stmt2->close();
                        $_SESSION['green'] = "Couese Assigned successfully!";
                        header("Location: /timeline/timeline.php");
                        exit(0);
                    } else {
                        $_SESSION['green'] = "Couese Assigned but faculty-course not updated";
                        header("Location: /timeline/timeline.php");
                    }
                } else {
                    $updateFacultyInfo = "UPDATE faculty SET f_current_L = f_current_L + 1  WHERE f_name = '$f_name' LIMIT 1";
                    $updateFacultyInfoResult = mysqli_query($con, $updateFacultyInfo);
                    $updateCourseInfo = "UPDATE course SET Allocation = 'Assigned' WHERE c_name = '$c_name' AND c_type = '$c_type' AND c_sec = '$c_sec' LIMIT 1";
                    $updateCourseInfoResult = mysqli_query($con, $updateCourseInfo);
                    if ($updateCourseInfoResult && $updateFacultyInfoResult) {
                        $content = 'Faculty['. $f_name .'] assigned to '. $c_name .' ('  . date('Y/m/d  H:i').') ---' . $user;
                        $content_key = 'Facult course';
                        $content_activity = 'Assigned';
                        $stmt2 = $con->prepare("INSERT INTO history (content_key, content, user, content_activity) VALUES (?, ?, ?, ?)");
                        $stmt2->bind_param("ssss", $content_key, $content, $user, $content_activity);
                        $stmt2->execute();
                        $stmt2->close();
                        $_SESSION['green'] = "Couese Assigned successfully!";
                        header("Location: /timeline/timeline.php");
                        exit(0);
                    } else {
                        $_SESSION['green'] = "Couese Assigned but faculty-course not updated";
                        header("Location: /timeline/timeline.php");
                    }
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