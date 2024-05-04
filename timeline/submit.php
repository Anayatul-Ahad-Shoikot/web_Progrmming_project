<?php
    session_start();
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    $user = $_SESSION['username'];
        if(isset($_POST['add_btn'])) {
            $faculty = explode('-', $_POST['faculty']);
            $facultyId = $faculty[0];
            $facultyName = $faculty[1];
            if (!empty($_POST['saturday'])) {
                $saturday = explode('-', $_POST['saturday']);
                $saturday_id = $saturday[0];
                $saturday_type = $saturday[1];
                $sql_saturday = "INSERT INTO timeline (f_code, c_id) VALUES ('$facultyId', '$saturday_id')";
                if($con->query($sql_saturday) === TRUE) {
                    if($saturday_type == 'Theory'){
                        $updateFacultyInfo = "UPDATE faculty SET f_current_T = f_current_T + 1  WHERE f_code = '$facultyId'";
                        $updateFacultyInfoResult = mysqli_query($con, $updateFacultyInfo);
                        $updateCourseInfo = "UPDATE course SET Allocation = 'Assigned' WHERE c_id = '$saturday_id'";
                        $updateCourseInfoResult = mysqli_query($con, $updateCourseInfo);
                        if ($updateCourseInfoResult && $updateFacultyInfoResult) {
                            $content = ''. $facultyName .' assigned ['. $saturday_id .'] at ('  . date('Y/m/d  H:i').') ---' . $user;
                            $content_key = 'Assigned';
                            $content_activity = 'Faculty course';
                            $stmt2 = $con->prepare("INSERT INTO history (content_key, content, user, content_activity) VALUES (?, ?, ?, ?)");
                            $stmt2->bind_param("ssss", $content_key, $content, $user, $content_activity);
                            $stmt2->execute();
                            $stmt2->close();
                            $_SESSION['green'] = "Couese Assigned successfully!";
                        }
                    } else {
                        $updateFacultyInfo = "UPDATE faculty SET f_current_L = f_current_L + 1  WHERE f_code = '$facultyId'";
                        $updateFacultyInfoResult = mysqli_query($con, $updateFacultyInfo);
                        $updateCourseInfo = "UPDATE course SET Allocation = 'Assigned' WHERE c_id = '$saturday_id'";
                        $updateCourseInfoResult = mysqli_query($con, $updateCourseInfo);
                        if ($updateCourseInfoResult && $updateFacultyInfoResult) {
                            $content = ''. $facultyName .' assigned ['. $saturday_id .'] at ('  . date('Y/m/d  H:i').') ---' . $user;
                            $content_key = 'Assigned';
                            $content_activity = 'Faculty course';
                            $stmt2 = $con->prepare("INSERT INTO history (content_key, content, user, content_activity) VALUES (?, ?, ?, ?)");
                            $stmt2->bind_param("ssss", $content_key, $content, $user, $content_activity);
                            $stmt2->execute();
                            $stmt2->close();
                            $_SESSION['green'] = "Couese Assigned successfully!";
                        }
                    }
                }  else {
                    $_SESSION['red'] = "Faild to Assign course.";
                    header("Location: /timeline/timeline.php");
                    exit(0);
                }
            }


            if (!empty($_POST['tuesday'])) {
                $tuesday = explode('-', $_POST['tuesday']);
                $tuesday_id = $tuesday[0];
                $tuesday_type = $tuesday[1];
                $sql_tuesday = "INSERT INTO timeline (f_code, c_id) VALUES ('$facultyId', '$tuesday_id')";
                if($con->query($sql_tuesday) === TRUE) {
                    if($tuesday_type == 'Theory'){
                        $updateFacultyInfo = "UPDATE faculty SET f_current_T = f_current_T + 1  WHERE f_code = '$facultyId'";
                        $updateFacultyInfoResult = mysqli_query($con, $updateFacultyInfo);
                        $updateCourseInfo = "UPDATE course SET Allocation = 'Assigned' WHERE c_id = '$tuesday_id'";
                        $updateCourseInfoResult = mysqli_query($con, $updateCourseInfo);
                        if ($updateCourseInfoResult && $updateFacultyInfoResult) {
                            $content = ''. $facultyName .' assigned ['. $tuesday_id .'] at ('  . date('Y/m/d  H:i').') ---' . $user;
                            $content_key = 'Assigned';
                            $content_activity = 'Faculty course';
                            $stmt2 = $con->prepare("INSERT INTO history (content_key, content, user, content_activity) VALUES (?, ?, ?, ?)");
                            $stmt2->bind_param("ssss", $content_key, $content, $user, $content_activity);
                            $stmt2->execute();
                            $stmt2->close();
                            $_SESSION['green'] = "Couese Assigned successfully!";
                        }
                    } else {
                        $updateFacultyInfo = "UPDATE faculty SET f_current_L = f_current_L + 1  WHERE f_code = '$facultyId'";
                        $updateFacultyInfoResult = mysqli_query($con, $updateFacultyInfo);
                        $updateCourseInfo = "UPDATE course SET Allocation = 'Assigned' WHERE c_id = '$tuesday_id'";
                        $updateCourseInfoResult = mysqli_query($con, $updateCourseInfo);
                        if ($updateCourseInfoResult && $updateFacultyInfoResult) {
                            $content = ''. $facultyName .' assigned ['. $tuesday_id .'] at ('  . date('Y/m/d  H:i').') ---' . $user;
                            $content_key = 'Assigned';
                            $content_activity = 'Faculty course';
                            $stmt2 = $con->prepare("INSERT INTO history (content_key, content, user, content_activity) VALUES (?, ?, ?, ?)");
                            $stmt2->bind_param("ssss", $content_key, $content, $user, $content_activity);
                            $stmt2->execute();
                            $stmt2->close();
                            $_SESSION['green'] = "Couese Assigned successfully!";
                        }
                    }
                }  else {
                    $_SESSION['red'] = "Faild to Assign course.";
                    header("Location: /timeline/timeline.php");
                    exit(0);
                }
            }
        } else {
            $_SESSION['red'] = "please login first.";
            header("Location: /xampp/htdocs/web_Progrmming_project/Log_Sign/Login.php");
            exit(0);
        }

        header("Location: /timeline/timeline.php");
        exit(0);

?>
<!-- //             $sunday = explode('-', $_POST['sunday']);
//             $sunday_id = $sunday[0];
//             $sunday_type = $sunday[1];
            
//             $tuesday = explode('-', $_POST['tuesday']);
//             $tuesday_id = $tuesday[0];
//             $tuesday_type = $tuesday[1];
            
//             $wednesday = explode('-', $_POST['wednesday']);
//             $wednesday_id = $wednesday[0];
//             $wednesday_type = $wednesday[1];