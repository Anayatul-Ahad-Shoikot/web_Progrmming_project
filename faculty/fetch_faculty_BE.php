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
                echo '<tr>' .
                    '<td><a href="/faculty/faculty_profile.php?f_id='.$row['f_id'].'">' . $row['f_name'] . '</a></td>' .
                    '<td>' . $row['f_code'] . '</td>' .
                    '<td>' . $row['f_designation'] . '</td>' .
                    '<td>' . $row['f_dept'] . '</td>' .
                    '<td><p class="status delivered">'.$row['f_load'].'</p></td>' .
                    '<td>' . $row['f_current_T'] . ' / ' . $row['f_max_T'] . '</td>' .
                    '<td>' . $row['f_current_L'] . ' / ' . $row['f_max_L'] . '</td>' .
                    '<td> ' . $row['f_max_T'] . ' , ' . $row['f_max_L'] . '</td>' .
                    '<td>' . $row['f_contact'] . '</td>' .
                    '<td>' . $row['f_mail'] . '</td>' .
                    '<td><a href="/faculty/faculty_profile.php?f_id=' . $row['f_id'] . '"> view </a></td>' .
                    '</tr>';
                }
        } else {
            echo '<tr><td colspan="11">No faculty records found</td></tr>';
        }

        $con->close();
    } else {
        echo 'Unauthorized access';
    }
?>
