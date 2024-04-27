<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    if (!empty($_GET['faculty'])) {
        $selectedFaculty = $_GET['faculty'];
        $stmt = $con->prepare("
        SELECT c.*
        FROM course c
        WHERE c.Allocation = 'Not Assigned'
        AND NOT EXISTS (
            SELECT 1
            FROM timeline t
            WHERE t.f_code = ?
            AND (
                (t.day1 = c.c_day1 OR t.day1 = c.c_day2 OR t.day2 = c.c_day1 OR t.day2 = c.c_day2)
                AND (
                    (STR_TO_DATE(t.time, '%H:%i') <= STR_TO_DATE(c.c_time, '%H:%i') AND STR_TO_DATE(c.c_time, '%H:%i') < ADDTIME(STR_TO_DATE(t.time, '%H:%i'), 'course_duration'))
                    OR
                    (STR_TO_DATE(c.c_time, '%H:%i') <= STR_TO_DATE(t.time, '%H:%i') AND ADDTIME(STR_TO_DATE(t.time, '%H:%i'), 'course_duration') > STR_TO_DATE(c.c_time, '%H:%i'))
                )
            )
        )
        "
    );
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
