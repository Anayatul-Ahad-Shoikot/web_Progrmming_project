<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    $CourseCount = 0;
    $_SESSION['C_total'] = $CourseCount;
    if (isset($_SESSION['ac_id']) && isset($_SESSION['prior'])) {
        $sql = "SELECT * FROM course";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $CourseCount++;
                $_SESSION['C_total'] = $CourseCount;
            }
        }
    }
    $con->close();
?>