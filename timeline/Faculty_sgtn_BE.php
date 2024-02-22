<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
        $sql = "SELECT * FROM faculty";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row['f_name'] . '" data-current_T="' . $row['f_current_T'] . '" data-max_T="' . $row['f_max_T'] . '" data-current_L="' . $row['f_current_L'] . '" data-max_L="' . $row['f_max_L'] . '">' . $row['f_name'] . '</option>';
                }
        }
        $con->close();
?>
