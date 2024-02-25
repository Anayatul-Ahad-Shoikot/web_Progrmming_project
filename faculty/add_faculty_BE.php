<?php 
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    session_start();
    $user = $_SESSION['username'];
    if (isset($_SESSION['ac_id']) && isset($_SESSION['prior'])) {
        $ac_id = $_SESSION['ac_id'];
        $prior = $_SESSION['prior'];
        if (isset($_POST['add_btn'])) {
            $f_name = ucwords(strtolower($_POST['f_name']));
            $f_code = strtoupper($_POST["f_code"]);
            $f_designation = ucwords(strtolower($_POST["f_designation"]));
            $f_dept = strtoupper($_POST["f_dept"]);
            $faculty_max_TL = $_POST["faculty_max_TL"];
            $f_contact = $_POST["f_contact"];
            $f_mail = $_POST["f_mail"];
            $Values = explode(',', $faculty_max_TL);
            $f_max_T = trim($Values[0]);
            $f_max_L = trim($Values[1]);

            $sql = "INSERT INTO faculty (f_name, f_code, f_mail, f_contact, f_designation, f_dept ,f_max_T, f_max_L) 
                    VALUES ('$f_name', '$f_code', '$f_mail', '$f_contact', '$f_designation', '$f_dept', $f_max_T, $f_max_L)";
            if ($con->query($sql) === TRUE) {
                $content = 'Faculty "'. $f_name. '" added ('. date('Y/m/d  H:i').') ---'.$user;
                $content_key = 'faculty';
                $content_activity = 'add';
                $stmt2 = $con->prepare("INSERT INTO history (content_key, content, user, content_activity) VALUES (?, ?, ?, ?)");
                $stmt2->bind_param("ssss", $content_key, $content, $user, $content_activity);
                $stmt2->execute();
                $_SESSION['green'] = "New faculty added successfully";
                header("Location: /faculty/Faculty.php");
                exit(0);
            } else {
                $_SESSION['red'] = "Faculty adding failed";
                header("Location: /faculty/Faculty.php");
                exit(0);
            }
        }
    }
    $con->close();
?>