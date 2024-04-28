<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link rel="stylesheet" href="/assings/style.css">
</head>
<body>
    <form id="myForm" method="POST" action="/assings/submit.php">
        <div class="form-group">
            <label for="facultySelect">Faculty</label>
            <select name="faculty" id="facultySelect" class="form-control">
                <option selected disabled>Select Faculty</option>
                <?php
                    include '/xampp/htdocs/web_Progrmming_project/db_con.php';
                    $sql = "SELECT f_code, f_name FROM faculty WHERE visible = 1";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row["f_code"] . '">' . $row["f_name"] . '</option>';
                        }
                    } else {
                        echo '<option>No faculty found</option>';
                    }
                    $con->close();
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="saturdaySelect">Select Saturday Class</label>
            <select id="saturdaySelect" name="saturdaySelect" class="form-control">
                <option selected disabled>Select Course</option>
                <?php
                    $faculty_id = 'selected_faculty_id'; // This should be set based on user input or session

                    // Step 1: Fetch all Saturday courses (List "L")
                    $sqlL = "SELECT c_code, c_name, c_sec, c_type, c_time FROM course WHERE (c_day1 = 'Sat' OR c_day2 = 'Sat') AND Allocation = 'Not Assigned'";
                    $resultL = $con->query($sqlL);
                    // Step 2: Fetch assigned Saturday courses for the faculty (List "M")
                    $sqlM = "SELECT c_code, c_sec, c_time FROM timeline WHERE f_code = ? AND (c_day1 = 'Sat' OR c_day2 = 'Sat')";
                    $stmtM = $con->prepare($sqlM);
                    $stmtM->bind_param("s", $faculty_id);
                    $stmtM->execute();
                    $resultM = $stmtM->get_result();
                    $assignedCourses = [];
                    while ($rowM = $resultM->fetch_assoc()) {
                        $assignedCourses[$rowM['c_code'] . '-' . $rowM['c_sec']] = $rowM['c_time'];
                    }
                    $stmtM->close();
                    // Step 3 & 4: Identify and filter out conflicting courses from "L"
                    $filteredCourses = [];
                    if ($resultL->num_rows > 0) {
                        while ($rowL = $resultL->fetch_assoc()) {
                            $courseKey = $rowL['c_code'] . '-' . $rowL['c_sec'];
                            $timeL = $rowL['c_time'];
                            $conflict = false;
                            foreach ($assignedCourses as $assignedTime) {
                                if (timesOverlap($timeL, $assignedTime)) {
                                    $conflict = true;
                                    break;
                                }
                            }
                            if (!$conflict) {
                                $filteredCourses[] = $rowL;
                            }
                        }
                    } else {
                        echo '<option>No courses available</option>';
                    }

                    // Step 5: Display the filtered courses
                    foreach ($filteredCourses as $course) {
                        echo '<option value="' . $course["c_code"] . '-' . $course["c_sec"] . '" title="' . $course["c_time"] . ', ' . $course["c_type"] . '">' . $course["c_name"] . ' (Sec: ' . $course["c_sec"] . ')</option>';
                    }

                    $con->close();
                ?>
            </select>
        </div>
        <div class="form-group">
    <label for="sundaySelect">Select Sunday Class</label>
    <select id="sundaySelect" name="sundaySelect" class="form-control">
        <option selected disabled>Select Course</option>
        <?php
        include '/xampp/htdocs/web_Progrmming_project/db_con.php';
        $sql = "SELECT c_code, c_name, c_sec, c_type, c_time FROM course WHERE (c_day1 = 'Sun' OR c_day2 = 'Sun') AND Allocation = 'Not Assigned'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["c_code"] . '-' . $row["c_sec"] . '" title="' . $row["c_time"] . ', ' . $row["c_type"] . '">' . $row["c_name"] . ' (Sec: ' . $row["c_sec"] . ')</option>';
            }
        } else {
            echo '<option>No courses available</option>';
        }
        $con->close();
        ?>
    </select>
</div>
<div class="form-group">
    <label for="tuesdaySelect">Select Tuesday Class</label>
    <select id="tuesdaySelect" name="tuesdaySelect" class="form-control">
        <option selected disabled>Select Course</option>
        <?php
        include '/xampp/htdocs/web_Progrmming_project/db_con.php';
        $sql = "SELECT c_code, c_name, c_sec, c_type, c_time FROM course WHERE (c_day1 = 'Tue' OR c_day2 = 'Tue') AND Allocation = 'Not Assigned'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["c_code"] . '-' . $row["c_sec"] . '" title="' . $row["c_time"] . ', ' . $row["c_type"] . '">' . $row["c_name"] . ' (Sec: ' . $row["c_sec"] . ')</option>';
            }
        } else {
            echo '<option>No courses available</option>';
        }
        $con->close();
        ?>
    </select>
</div>
<div class="form-group">
    <label for="wednesdaySelect">Select Wednesday Class</label>
    <select id="wednesdaySelect" name="wednesdaySelect" class="form-control">
        <option selected disabled>Select Course</option>
        <?php
        include '/xampp/htdocs/web_Progrmming_project/db_con.php';
        $sql = "SELECT c_code, c_name, c_sec, c_type, c_time FROM course WHERE (c_day1 = 'Wed' OR c_day2 = 'Wed') AND Allocation = 'Not Assigned'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["c_code"] . '-' . $row["c_sec"] . '" title="' . $row["c_time"] . ', ' . $row["c_type"] . '">' . $row["c_name"] . ' (Sec: ' . $row["c_sec"] . ')</option>';
            }
        } else {
            echo '<option>No courses available</option>';
        }
        $con->close();
        ?>
    </select>
</div>
        <button type="submit" name="add_btn" class="btn btn-primary">ADD</button>
    </form>



    <script>
$(document).ready(function() {
    // Initialize Select2 for each select element
    $('#facultySelect').select2({
        placeholder: "Select Faculty",
        allowClear: true
    });
    $('#saturdaySelect').select2({
        placeholder: "Select Saturday Course",
        allowClear: true
    });
    $('#sundaySelect').select2({
        placeholder: "Select Sunday Course",
        allowClear: true
    });
    $('#tuesdaySelect').select2({
        placeholder: "Select Tuesday Course",
        allowClear: true
    });
    $('#wednesdaySelect').select2({
        placeholder: "Select Wednesday Course",
        allowClear: true
    });
    });
    </script>
</body>
</html>