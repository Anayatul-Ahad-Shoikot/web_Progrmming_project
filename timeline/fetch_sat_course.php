<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');

    if (!empty($_GET['faculty'])) {
        $selectedFaculty = $_GET['faculty'];
        $stmt = $con->prepare("SELECT course.c_id, course.c_code, course.c_name, course.c_type, course.c_sec, course.c_time, course.c_day1, course.c_day2, course.Allocation
        FROM course
        LEFT JOIN timeline ON course.c_code = timeline.c_code AND course.c_sec = timeline.section AND timeline.f_code = ?
        WHERE timeline.c_code IS NULL
        AND course.Allocation = 'Not Assigned'
        AND (course.c_day1 = 'Sat' OR course.c_day2 = 'Sat')
        AND NOT EXISTS (
            SELECT 1
            FROM timeline t2
            WHERE t2.f_code = ?
            AND (t2.day1 = 'Sat' OR t2.day2 = 'Sat')
            AND (t2.day1 = course.c_day1 OR t2.day1 = course.c_day2 OR t2.day2 = course.c_day1 OR t2.day2 = course.c_day2)
            AND (
                SUBSTRING_INDEX(course.c_time, ' - ', 1) <= SUBSTRING_INDEX(t2.time, ' - ', -1)
                AND SUBSTRING_INDEX(course.c_time, ' - ', -1) >= SUBSTRING_INDEX(t2.time, ' - ', 1)
            )
        )");
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
