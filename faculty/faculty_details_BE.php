<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');

if (isset($_SESSION['ac_id']) && isset($_SESSION['prior'])) {
    if (isset($_GET['f_id'])) {
        $f_id = $_GET['f_id'];
        $sql = "SELECT * FROM faculty WHERE f_id = $f_id";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $f_name = $row['f_name'];
                $f_code = $row['f_code'];
                $f_mail = $row['f_mail'];
                $f_contact = $row['f_contact'];
                $dept = $row['dept'];
                $desig = $row['desig'];
                $f_current_T = $row['f_current_T'];
                $f_current_L = $row['f_current_L'];
                $f_max_T = $row['f_max_T'];
                $f_max_L = $row['f_max_L'];
            }
        } else {
            echo 'error';
        }
        $con->close();
    } else {
        echo 'error';
    }
} else {
    echo 'Unauthorized access';
}
?>