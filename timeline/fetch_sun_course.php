<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');

    if (!empty($_GET['faculty'])) {
        $selectedFaculty = $_GET['faculty'];
        $stmt = $con->prepare("
            SELECT c.c_id, c.c_code, c.c_name, c.c_type, c.c_sec, c.c_time, c.c_day1, c.c_day2, c.Allocation
            FROM course c
            WHERE c.Allocation = 'Not Assigned'
            AND (c.c_day1 = 'Sun' OR c.c_day2 = 'Sun')
            AND NOT EXISTS (
                SELECT 1 FROM timeline t
                WHERE t.f_code = ?
                AND t.c_code = c.c_code
                AND t.section = c.c_sec
                AND (
                    (STR_TO_DATE(REPLACE(SUBSTRING_INDEX(c.c_time, ' - ', 1), ':', ''), '%h%i%p') BETWEEN STR_TO_DATE(REPLACE(SUBSTRING_INDEX(t.time, ' - ', 1), ':', ''), '%h%i%p') AND STR_TO_DATE(REPLACE(SUBSTRING_INDEX(t.time, ' - ', -1), ':', ''), '%h%i%p'))
                    OR
                    (STR_TO_DATE(REPLACE(SUBSTRING_INDEX(c.c_time, ' - ', -1), ':', ''), '%h%i%p') BETWEEN STR_TO_DATE(REPLACE(SUBSTRING_INDEX(t.time, ' - ', 1), ':', ''), '%h%i%p') AND STR_TO_DATE(REPLACE(SUBSTRING_INDEX(t.time, ' - ', -1), ':', ''), '%h%i%p'))
                )
            )
        ");
        $stmt->bind_param("s", $selectedFaculty);
        $stmt->execute();
        $result = $stmt->get_result();
        $courses = [];
        while ($row = $result->fetch_assoc()) {
            $courses[] = $row;
        }
        $stmt->close();
        $con->close();
        echo json_encode($courses);
    } else {
        echo json_encode([]);
    }
?>
