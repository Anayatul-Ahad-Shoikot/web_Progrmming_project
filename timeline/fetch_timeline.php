<?php
    include("/xampp/htdocs/web_Progrmming_project/db_con.php");
    $query = "SELECT * FROM timeline WHERE present = 1";
    $result = $con->query($query);

    while($row = $result->fetch_assoc()) {
        $fname = $row["f_name"];
        $cname = $row["c_name"];
        $ratioQuery = "SELECT f_current_T, f_max_T, f_current_L, f_max_L FROM faculty WHERE f_name = '$fname'";
        $courseInfo = "SELECT c_type, c_code FROM course WHERE c_name = '$cname'";

        // Execute the ratioQuery
        $ratioResult = $con->query($ratioQuery);
        if($ratioRow = $ratioResult->fetch_assoc()) {
            $f_current_T = $ratioRow["f_current_T"];
            $f_max_T = $ratioRow["f_max_T"];
            $f_current_L = $ratioRow["f_current_L"];
            $f_max_L = $ratioRow["f_max_L"];
        }

        // Execute the courseInfo query
        $courseResult = $con->query($courseInfo);
        if($courseRow = $courseResult->fetch_assoc()) {
            $c_type = $courseRow["c_type"];
            $c_code = $courseRow["c_code"];
        }

        echo "<tr>
                <td>".$fname."</td>
                <td>
                Theory: ".$f_current_T." / ".$f_max_T." <br>
                Lab: ".$f_current_L." / ".$f_max_L." <br>
                </td>
                <td>".$cname."</td>
                <td>".$c_code."</td>
                <td>".$c_type."</td>
                <td>".$row["section"]."</td>
                <td>".$row["time"]."</td>
                <td>".$row["day"]."</td>
                <td>".$row["rating"]."</td>
                <td><button>Edit</button></td>
            </tr>";
    }
    echo "</table>";
    $con->close();
?>
