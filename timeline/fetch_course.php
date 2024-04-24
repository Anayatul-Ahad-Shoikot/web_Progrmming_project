<?php
    // include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    // $sql = "SELECT * FROM course WHERE Allocation = 'Not Assigned'";
    // $result = $con->query($sql);
    // if ($result->num_rows > 0) {
    //     while ($row = $result->fetch_assoc()) {
    //         echo '<option value="' . $row['c_code'] . '" data-code="' . $row['c_code'] . '" data-type="' . $row['c_type'] . '" data-sec="' . $row['c_sec'] . '" data-time="' . $row['c_time'] . '" data-day1="' . $row['c_day1'] . '" data-day2="' . $row['c_day2'] . '">' . $row['c_name'] . '['.$row['c_type'].'] - '.$row['c_sec'].'</option>';
    //     }
    // }
    // $con->close();
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    if (!empty($_GET['faculty'])) {
        $selectedFaculty = $_GET['faculty'];
        $stmt = $con->prepare("
            SELECT c.c_id, c.c_code, c.c_name, c.c_type, c.c_sec, c.c_time, c.c_day1, c.c_day2, c.Allocation
            FROM course c
            WHERE c.Allocation = 'Not Assigned' AND NOT EXISTS (
                SELECT 1 FROM timeline t
                WHERE t.f_code = ? AND t.c_code = c.c_code AND t.section = c.c_sec
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
