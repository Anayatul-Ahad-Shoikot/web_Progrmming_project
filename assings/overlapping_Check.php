<?php
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
    // Check if the time is in the PM range and adjust if necessary
    if ($hours >= 1 && $hours <= 4) {
        $hours += 12; // Convert PM hour to 24-hour format
    }
    return sprintf("%02d:%02d", $hours, $minutes); // Returns formatted time
}

// Given individual time points with adjustment for PM times
$time11 = convertTo24Hour("2:00");
$time12 = convertTo24Hour("4:30"); // Convert "1:40" to 24-hour format
$time21 = convertTo24Hour("12:31");
$time22 = convertTo24Hour("1:50");

// Format these into the expected "start - end" format
$timePeriod1 = $time11 . " - " . $time12;
$timePeriod2 = $time21 . " - " . $time22;

// Check for overlap
if (timesOverlap($timePeriod1, $timePeriod2)) {
    echo "Times overlap";
} else {
    echo "No overlap";
}
?>
