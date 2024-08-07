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
        $f_contact = $_POST["f_contact"];
        $f_mail = $_POST["f_mail"];
        $f_max_t = $_POST["f_max_t"];
        $f_max_l = $_POST["f_max_l"];
        $dept = $_POST["dept"];
        $desig = $_POST["desig"];
        $f_room = $_POST[ "f_room"];

        $checkSql = "SELECT * FROM faculty WHERE f_name = ?";
        $stmt = $con->prepare($checkSql);
        $stmt->bind_param("s", $f_name);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $_SESSION['red'] = "Faculty name already exists";
            header("Location: /faculty/Faculty.php");
            exit(0);
        } else {
            $sql = "INSERT INTO faculty (f_name, f_code, f_mail, f_contact, dept, desig, f_room,f_max_T, f_max_L) 
                    VALUES ('$f_name', '$f_code', '$f_mail', '$f_contact',  '$dept', '$desig', $f_room, $f_max_t, $f_max_l)";
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
}
$con->close();
?>
