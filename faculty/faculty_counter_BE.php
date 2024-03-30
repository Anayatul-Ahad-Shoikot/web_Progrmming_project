<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    $facultyCount = 0;
    if (isset($_SESSION['ac_id']) && isset($_SESSION['prior'])) {
        $sql = "SELECT * FROM faculty";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $facultyCount++;
                $_SESSION['f_total'] = $facultyCount;
            }
        }
    }
    $con->close();
?>