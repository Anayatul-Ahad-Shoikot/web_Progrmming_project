<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    if (isset($_SESSION['ac_id']) && isset($_SESSION['prior'])) {
        $sql = "SELECT * FROM faculty";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo'<tr id="row_' . $row['f_id'] . '">' .
                    '<td id="name_' . $row['f_id'] . '"><a href="/faculty/faculty_profile.php?f_id=' . htmlspecialchars($row['f_id']) . '">' . htmlspecialchars($row['f_name']) . '</a></td>' .
                    '<td id="code_' . $row['f_id'] . '">[' . $row['f_code'] . ']</td>' .
                    '<td id="mail_' . $row['f_id'] . '">' . $row['f_mail'] . '</td>' .
                    '<td id="contact_' . $row['f_id'] . '">' . $row['f_contact'] . '</td>' .
                    '<td id="theory_' . $row['f_id'] . '">' . $row['f_current_T'] . ' / ' . $row['f_max_T'] . '</td>' .
                    '<td id="lab_' . $row['f_id'] . '">' . $row['f_current_L'] . ' / ' . $row['f_max_L'] . '</td>' .
                    '<td><button id="edit_' . $row['f_id'] . '" onclick="makeEditable(\'' . $row['f_id'] . '\')"><i class="bx bx-edit" ></i></button>
                    <button type="submit" id="save_' .$row['f_id']. '" onclick="saveData(\'' .$row['f_id'] . '\')" style="display: none;" name="saveBTN" ><i class="bx bx-list-check" ></i></button>
                    <button type="submit" id="rmv_' .$row['f_id']. '" onclick="rmvData(\'' .$row['f_id'] . '\')" style="display: none;" name="rmvBTN" ><i class="bx bx-trash" ></i></button>
                    <button type="submit" id="cncl_' .$row['f_id']. '" onclick="cnclData(\'' .$row['f_id'] . '\')" style="display: none;" name="cnclBTN" ><i class="bx bx-x"></i></button>
                    </td>' .
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
