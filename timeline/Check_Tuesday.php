<?php
    function timeToMinutes($time) {
        list($hours, $minutes) = explode(':', $time);
        return (int)$hours * 60 + (int)$minutes;
    }
    function isOverlap($startTime1, $endTime1, $startTime2, $endTime2) {
        $s1 = timeToMinutes($startTime1);
        $e1 = timeToMinutes($endTime1);
        $s2 = timeToMinutes($startTime2);
        $e2 = timeToMinutes($endTime2);
        return $s1 < $e2 && $e1 > $s2;
    }
    include '/xampp/htdocs/web_Progrmming_project/db_con.php';
    $facultyId = $_GET['facultyId'];
    $courseId = $_GET['courseId'];
    $sql = "SELECT c_name, c_startTime, c_endTime, c_type FROM course WHERE c_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $courseId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $selected_c_startTime = $row['c_startTime'];
        $selected_c_endTime = $row['c_endTime'];
        $selected_c_type = $row['c_type'];
        $selected_c_name = $row['c_name'];
    }
    $sql1 = "SELECT f_code, c_id FROM timeline WHERE f_code = '$facultyId'";
    $result1 = $con->query($sql1);
    $isConflict = "NO";
    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            $id = $row1['c_id'];
            $sql2 = "SELECT c_name, c_type, c_startTime, c_endTime FROM course WHERE c_id = ?";
            $stmt2 = $con->prepare($sql2);
            $stmt2->bind_param("i", $id);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            while ($row2 = $result2->fetch_assoc()) {
                if (isOverlap($selected_c_startTime, $selected_c_endTime, $row2['c_startTime'], $row2['c_endTime'])) {
                    $isConflict = "YES";
                    break 2;
                }
            }
        }
    }
    echo $isConflict == "NO" ? "NO" : "YES";
    $con->close();
?>
