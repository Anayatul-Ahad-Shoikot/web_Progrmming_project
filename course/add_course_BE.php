<?php 
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    session_start();
    $user = $_SESSION['username'];
    if (isset($_SESSION['ac_id']) && isset($_SESSION['prior'])) {
        $ac_id = $_SESSION['ac_id'];
        $prior = $_SESSION['prior'];
        if (isset($_POST['add_btn'])) {
            $c_code = $_POST["c_code"];
            $c_name = $_POST["c_name"];
            $c_type = $_POST["c_type"];
            $c_sec = $_POST["c_sec"];
            $c_time = $_POST["c_time"];
            $c_day = $_POST["c_day"];

            $sql = "INSERT INTO course (c_code, c_name, c_type, c_sec, c_time, c_day) 
                    VALUES ('$c_code', '$c_name', '$c_type', '$c_sec', '$c_time', '$c_day')";
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
    $con->close();
?>