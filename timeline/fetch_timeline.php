<?php
    include("/xampp/htdocs/web_Progrmming_project/db_con.php");
    $query = "SELECT * FROM timeline WHERE present = 1";
    $result = $con->query($query);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $f_code = $row["f_code"];
            $c_code = $row["c_code"];
            $ratioQuery = "SELECT f_name, f_current_T, f_max_T, f_current_L, f_max_L FROM faculty WHERE f_code = '$f_code'";
            $courseInfo = "SELECT c_name, c_type FROM course WHERE c_code = '$c_code'";
            $ratioResult = $con->query($ratioQuery);
            if($ratioRow = $ratioResult->fetch_assoc()) {
                $f_name =  $ratioRow['f_name'];
                $f_current_T = $ratioRow["f_current_T"];
                $f_max_T = $ratioRow["f_max_T"];
                $f_current_L = $ratioRow["f_current_L"];
                $f_max_L = $ratioRow["f_max_L"];
            }
            $courseResult = $con->query($courseInfo);
            if($courseRow = $courseResult->fetch_assoc()) {
                $c_name = $courseRow["c_name"];
                $c_type = $courseRow["c_type"];
            }
            echo "<tr>";
            echo "<td>" . $f_name . "</td>";
            echo "<td>" . $c_name . "</td>";
            if ($row['day1'] == 'Sat') {
                if($c_type == 'Theory') {
                    echo "<td>&#10003</td>";
                    echo "<td>&#10007</td>";
                    echo "<td>&#10003</td>";
                    echo "<td>&#10007</td>";
                } else {
                    echo "<td>&#10003</td>";
                    echo "<td>&#10007</td>";
                    echo "<td>&#10007</td>";
                    echo "<td>&#10007</td>";
                }
            }
            else if ($row['day1'] == 'Sun') {
                if ($c_type == 'Theory') {
                    echo "<td>&#10007</td>";
                    echo "<td>&#10003</td>";
                    echo "<td>&#10007</td>";
                    echo "<td>&#10003</td>";
                } else {
                    echo "<td>&#10007</td>";
                    echo "<td>&#10003</td>";
                    echo "<td>&#10007</td>";
                    echo "<td>&#10007</td>";
                }
            }
            else if ($row['day1'] == 'Tue') { 
                if($c_type == 'Theory') {
                    echo "<td>&#10003</td>";
                    echo "<td>&#10007</td>";
                    echo "<td>&#10003</td>";
                    echo "<td>&#10007</td>";
                } else {
                    echo "<td>&#10007</td>";
                    echo "<td>&#10007</td>";
                    echo "<td>&#10003</td>";
                    echo "<td>&#10007</td>";
                }
            }
            else {
                if($c_type == 'Theory') {
                    echo "<td>&#10003</td>";
                    echo "<td>&#10007</td>";
                    echo "<td>&#10003</td>";
                    echo "<td>&#10007</td>";
                } else {
                    echo "<td>&#10007</td>";
                    echo "<td>&#10007</td>";
                    echo "<td>&#10007</td>";
                    echo "<td>&#10003</td>";
                }
            }
            echo "<td>" . $f_current_T . " / " . $f_max_T . "</td>";
            echo "<td>" . $f_current_L . " / " . $f_max_L. "</td>";
            echo "<td><button>Edit</button></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No data found</td></tr>";
    }
    $con->close();
?>