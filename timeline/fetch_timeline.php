<?php
// Include your database connection file
include("/xampp/htdocs/web_Progrmming_project/db_con.php");

// Query to fetch data from timeline table
$query = "SELECT faculty_code, course_code, section, time, day FROM timeline";
$result = $con->query($query);


    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["t_id"]."</td>
                <td>".$row["faculty_code"]."</td>
                <td>".$row["course_code"]."</td>
                <td>".$row["section"]."</td>
                <td>".$row["time"]."</td>
                <td>".$row["day"]."</td>
            </tr>";
    }
    echo "</table>";
// Close database connection
$con->close();
?>
