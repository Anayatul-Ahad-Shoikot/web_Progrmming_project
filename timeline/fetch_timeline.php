<?php
include("/xampp/htdocs/web_Progrmming_project/db_con.php");
$query1 = "SELECT f_code, GROUP_CONCAT(c_id) AS c_ids FROM timeline WHERE present = 1 GROUP BY f_code";
$result = $con->query($query1);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>"; // Open a new row for each faculty
        $f_code = $row['f_code'];
        echo "<td>" . htmlspecialchars($f_code) . "</td>"; // Faculty Code

        $c_ids = $row['c_ids'];
        $c_id_array = explode(',', $c_ids);
        $c_id_list = "'" . implode("','", $c_id_array) . "'";
        $query2 = "SELECT c_id, c_startTime, c_endTime, c_day1, c_day2, c_type FROM course WHERE c_id IN ($c_id_list)";
        
        $days = ['Sat' => 'Saturday', 'Sun' => 'Sunday', 'Tue' => 'Tuesday', 'Wed' => 'Wednesday'];  // Define days
        foreach ($days as $dayKey => $dayName) {
            $result2 = $con->query($query2);
            if ($result2) {
                // Initialize slots
                $slots = ['Slot_1' => '', 'Slot_2' => '', 'Slot_3' => '', 'Slot_4' => '', 'Slot_5' => '', 'Slot_6' => '', 'Slot_7' => ''];
                while ($course = $result2->fetch_assoc()) {
                    if (in_array($dayKey, [$course['c_day1'], $course['c_day2']])) {  // Check if the course is on the current day
                        $type = $course['c_type'];
                        $startTime = $course['c_startTime'];
                        applyStylesBasedOnTime($type, $startTime, $slots);
                    }
                }
                // Output the slots
                echo "<td><table><tbody><tr>";
                foreach ($slots as $slot => $style) {
                    echo "<td id='{$slot}'{$style}></td>";
                }
                echo "</tr></tbody></table></td>";
            } else {
                echo "<td>Error fetching course details: " . $con->error . "</td>";
            }
        }
        echo "<td>Action</td>"; // Placeholder for any actions
        echo "</tr>"; // Close the row
    }
} else {
    echo "Error in fetching faculty courses: " . $con->error;
}
$con->close();


function applyStylesBasedOnTime($type, $startTime, &$slots) {
    // Define start times for Theory slots
    $theoryStartTimes = [
        'Slot_1' => '8:30',
        'Slot_2' => '9:51',
        'Slot_3' => '11:11',
        'Slot_4' => '12:31',
        'Slot_5' => '13:51',
        'Slot_6' => '14:11',
        'Slot_7' => '15:31'
    ];

    // Check conditions for Theory
    if ($type == "Theory") {
        foreach ($theoryStartTimes as $slot => $time) {
            if ($startTime == $time) {
                $slots[$slot] = " style='background-color: red;'";
            }
        }
    }

    // Define start times and slot merges for Lab slots
    $labStartTimes = [
        '8:30'  => ['Slot_1', 'Slot_2'],
        '11:11' => ['Slot_3', 'Slot_4'],
        '14:00' => ['Slot_6', 'Slot_7']
    ];

    // Check conditions for Lab
    if ($type == "Lab") {
        if (array_key_exists($startTime, $labStartTimes)) {
            foreach ($labStartTimes[$startTime] as $slot) {
                $slots[$slot] = " style='background-color: red;'";
            }
        }
    }
}



?>
