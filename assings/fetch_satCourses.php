<?php
    include '/xampp/htdocs/web_Progrmming_project/db_con.php';
    $query = "SELECT c.*
    FROM course c
    WHERE c.Allocation = 'Not Assigned'
    AND NOT EXISTS (
      SELECT 1
      FROM timeline t
      WHERE t.f_code = ?
      AND t.c_code = c.c_code
      AND t.c_sec = c.c_sec
      AND (
        STR_TO_TIME(t.c_startTime) < STR_TO_TIME(c.c_startTime) AND STR_TO_TIME(t.c_endTime) > STR_TO_TIME(c.c_startTime)
        OR STR_TO_TIME(t.c_startTime) < STR_TO_TIME(c.c_endTime) AND STR_TO_TIME(t.c_endTime) > STR_TO_TIME(c.c_endTime)
        OR STR_TO_TIME(t.c_startTime) >= STR_TO_TIME(c.c_startTime) AND STR_TO_TIME(t.c_endTime) <= STR_TO_TIME(c.c_endTime)
      )
    )";

$stmt = $con->prepare($query);
$stmt->bind_param("s", $facultyId);
$stmt->execute();
$result = $stmt->get_result();

$availableCourses = []; // Initialize an array to store available courses

while ($row = $result->fetch_assoc()) {
$availableCourses[] = $row; // Add each course row to the array
}

echo '<pre>';
print_r($availableCourses); // Print the array of available courses
echo '</pre>';

$con->close();
?>