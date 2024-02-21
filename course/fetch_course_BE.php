<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    $courseCount = 0;
    if (isset($_SESSION['ac_id']) && isset($_SESSION['prior'])) {
        $sql = "SELECT * FROM course";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $courseCount++;
                $_SESSION['c_total'] = $courseCount;
                echo '<tr>' .
                    '<td>' . $row['c_code'] . '</td>' .
                    '<td>' . $row['c_name'] . '</td>' .
                    '<td>' . $row['c_type'] . '</td>' .
                    '<td>' . $row['c_sec'] . '</td>' .
                    '<td>' . $row['c_time'] . '</td>' .
                    '<td>' . $row['c_day'] . '</td>' .
                    '<td></td>' .
                    '<td><p class="status delivered">' . $row['status'] . '</p></td>' .
                    '<td><button> --:-- </button></td>' .
                    '</tr>';
                }
        } else {
            echo '<tr><td colspan="10">No faculty records found</td></tr>';
        }

        $con->close();
    } else {
        echo 'Unauthorized access';
    }
?>
