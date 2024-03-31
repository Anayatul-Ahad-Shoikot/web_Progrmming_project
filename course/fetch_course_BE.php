<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    if (isset($_SESSION['ac_id']) && isset($_SESSION['prior'])) {
        $sql = "SELECT * FROM course";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr id="row_' . $row['c_id'] . '">' .
                    '<td id="code_' . $row['c_id'] . '">' . $row['c_code'] . '</td>' .
                    '<td id="name_' . $row['c_id'] . '">' . $row['c_name'] . '</td>' .
                    '<td id="type_' . $row['c_id'] . '">' . $row['c_type'] . '</td>' .
                    '<td id="sec_' . $row['c_id'] . '">' . $row['c_sec'] . '</td>' .
                    '<td>' . $row['c_time'] . '</td>' .
                    '<td>' . $row['c_day'] . '</td>' .
                    '<td><p class="' . ($row['Allocation'] == "Assigned" ? "status cancelled" : "status delivered") . '">' . $row['Allocation'] . '</p></td>' .
                    '<td>
                    <button id="edit_' . $row['c_id'] . '" onclick="makeEditable(\'' . $row['c_id'] . '\')">Edit</button>
                    <button type="submit" id="save_' .$row['c_id']. '" onclick="saveData(\'' .$row['c_id'] . '\')" style="display: none;" name="saveBTN" >Save</button>
                    <button type="submit" id="rmv_' .$row['c_id']. '" onclick="rmvData(\'' .$row['c_id'] . '\')" style="display: none;" name="rmvBTN" >Remove</button>
                    </td>' .
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
