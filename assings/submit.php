<?php
include '/xampp/htdocs/web_Progrmming_project/db_con.php';

// Function to convert time string "H:M" to total minutes since midnight
function timeToMinutes($time) {
    list($hours, $minutes) = explode(':', $time);
    return (int)$hours * 60 + (int)$minutes;
}

// Function to check if two time intervals overlap
function timesOverlap($time1, $time2) {
    list($start_time1, $end_time1) = explode(' - ', $time1);
    list($start_time2, $end_time2) = explode(' - ', $time2);

    $start1 = timeToMinutes($start_time1);
    $end1 = timeToMinutes($end_time1);
    $start2 = timeToMinutes($start_time2);
    $end2 = timeToMinutes($end_time2);

    return ($start1 < $end2 && $end1 > $start2);
}

// Converts PM times in the range of 1:00 PM to 4:30 PM to 24-hour format
function convertTo24Hour($time) {
    list($hours, $minutes) = explode(':', $time);
    $hours = (int)$hours;
    if ($hours >= 1 && $hours <= 4) {
        $hours += 12; // Convert PM hour to 24-hour format
    }
    return sprintf("%02d:%02d", $hours, $minutes);
}

$sqlInsert = "INSERT INTO course_assignments (f_code, c_code, c_sec) VALUES (?, ?, ?)";
$stmtInsert = $conn->prepare($sqlInsert);

$daySelects = ['saturdaySelect', 'sundaySelect', 'tuesdaySelect', 'wednesdaySelect'];

foreach ($daySelects as $selectName) {
    if (isset($_POST[$selectName]) && !empty($_POST[$selectName])) {
        list($c_code, $c_sec, $time_range) = explode('-', $_POST[$selectName], 3);
        list($start_time, $end_time) = explode(' - ', $time_range);
        $start_time = convertTo24Hour($start_time);
        $end_time = convertTo24Hour($end_time);
        $time_range = $start_time . ' - ' . $end_time;

        $sqlCheck = "SELECT c_code, c_sec, c_time FROM course_assignments WHERE f_code = ? AND day = ?";
        $stmtCheck = $conn->prepare($sqlCheck);
        $stmtCheck->bind_param("ss", $_POST['faculty'], $selectName);
        $stmtCheck->execute();
        $result = $stmtCheck->get_result();

        $conflict = false;
        while ($row = $result->fetch_assoc()) {
            if (timesOverlap($time_range, $row['c_time'])) {
                $conflict = true;
                echo "Cannot assign $c_code-$c_sec on $selectName: Time conflict with another course.<br>";
                break;
            }
        }

        if (!$conflict) {
            $stmtInsert->bind_param("sss", $_POST['faculty'], $c_code, $c_sec);
            if (!$stmtInsert->execute()) {
                echo "Error inserting data: " . $stmtInsert->error . "<br>";
            } else {
                echo "Course $c_code-$c_sec assigned successfully on $selectName.<br>";
            }
        }
        $stmtCheck->close();
    }
}
$stmtInsert->close();
$conn->close();
?>
