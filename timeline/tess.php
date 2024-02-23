<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    
    // Fetch faculty info
    if (!empty($selectedFaculty)) {
        $stmt = $con->prepare("SELECT f_current_T, f_max_T, f_current_L, f_max_L FROM faculty WHERE f_name = ?");
        $stmt->bind_param("s", $selectedFaculty);
        $stmt->execute();
        $stmt->bind_result($current_T, $max_T, $current_L, $max_L);
        $stmt->fetch();
        $stmt->close();
        $facultyInfo = array(
            'current_T' => $current_T,
            'max_T' => $max_T,
            'current_L' => $current_L,
            'max_L' => $max_L
        );
        echo json_encode($facultyInfo);
    }

    // Fetch course info
    if (!empty($selectedCourse)) {
        $stmt = $con->prepare("SELECT c_code, c_name, c_type, c_sec, c_time, c_day FROM course WHERE c_name = ?");
        $stmt->bind_param("s", $selectedCourse);
        $stmt->execute();
        $stmt->bind_result($c_code, $c_name, $c_type, $c_sec, $c_time, $c_day);
        $stmt->fetch();
        $stmt->close();
        $courseInfo = array(
            'c_code' => $c_code,
            'c_name' => $c_name,
            'c_type' => $c_type,
            'c_sec' => $c_sec,
            'c_time' => $c_time,
            'c_day' => $c_day
        );
        echo json_encode($courseInfo);
    }

    $con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/timeline/timeline.css" />
    <title>Timeline</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th> Faculty <span class="icon-arrow">&UpArrow;</span></th>
                <th> Current(T/L) <span class="icon-arrow">&UpArrow;</span></th>
                <th> Max(T/L) <span class="icon-arrow">&UpArrow;</span></th>
                <th> Course <span class="icon-arrow">&UpArrow;</span></th>
                <th> Section <span class="icon-arrow">&UpArrow;</span></th>
                <th> Time <span class="icon-arrow">&UpArrow;</span></th>
                <th> Day <span class="icon-arrow">&UpArrow;</span></th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            <tr id="first_row">
                <form method="POST" action="#">
                    <td>
                        <input type="text" id="searchInput" oninput="filterDropdown()" placeholder="Search Faculty">
                        <select name="faculty" id="facultySelect" onchange="updateFacultyInfo()">
                            <option value="">Select Faculty</option>
                            <?php
                                include('/xampp/htdocs/web_Progrmming_project/db_con.php');
                                $sql = "SELECT * FROM faculty";
                                $result = $con->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['f_name'] . '" data-current_T="' . $row['f_current_T'] . '" data-max_T="' . $row['f_max_T'] . '" data-current_L="' . $row['f_current_L'] . '" data-max_L="' . $row['f_max_L'] . '">' . $row['f_name'] . '</option>';
                                    }
                                }
                                $con->close();
                            ?>
                        </select>
                    </td>
                    <td id="currentTd"></td>
                    <td id="maxTd"></td>
                    <td>
                        <input type="text" id="searchInputCourse" oninput="filterDropdownCourse()" placeholder="Search Course">
                        <select name="course" id="courseSelect" onchange="updateCourseInfo()">
                            <option value="">Select Course</option>
                            <?php
                                include('/xampp/htdocs/web_Progrmming_project/db_con.php');
                                $sql = "SELECT * FROM course";
                                $result = $con->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['c_name'] . '" data-code="' . $row['c_code'] . '" data-type="' . $row['c_type'] . '" data-sec="' . $row['c_sec'] . '" data-time="' . $row['c_time'] . '" data-day="' . $row['c_day'] . '">' . $row['c_name'] . '</option>';
                                    }
                                }
                                $con->close();
                            ?>
                        </select>
                    </td>
                    <td id="codeTd"></td>
                    <td id="typeTd"></td>
                    <td id="secTd"></td>
                    <td id="timeTd"></td>
                    <td id="dayTd"></td>
                    <td>
                        <button type="submit" name="add_btn">ADD</button>
                    </td>
                </form>
            </tr> 
        </tbody>
    </table>

    <script>
        function filterDropdown() {
            var input, filter, select, option, i;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            select = document.getElementById("facultySelect");
            option = select.getElementsByTagName("option");
            for (i = 0; i < option.length; i++) {
                if (option[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    option[i].style.display = "";
                } else {
                    option[i].style.display = "none";
                }
            }
        }

        function filterDropdownCourse() {
            var input, filter, select, option, i;
            input = document.getElementById("searchInputCourse");
            filter = input.value.toUpperCase();
            select = document.getElementById("courseSelect");
            option = select.getElementsByTagName("option");
            for (i = 0; i < option.length; i++) {
                if (option[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    option[i].style.display = "";
                } else {
                    option[i].style.display = "none";
                }
            }
        }

        function updateFacultyInfo() {
            var select = document.getElementById("facultySelect");
            var selectedOption = select.options[select.selectedIndex];
            var currentTd = document.getElementById("currentTd");
            var maxTd = document.getElementById("maxTd");
            currentTd.textContent = selectedOption.getAttribute("data-current_T") + " / " + selectedOption.getAttribute("data-current_L");
            maxTd.textContent = selectedOption.getAttribute("data-max_T") + " / " + selectedOption.getAttribute("data-max_L");
        }

        function updateCourseInfo() {
            var select = document.getElementById("courseSelect");
            var selectedOption = select.options[select.selectedIndex];
            var codeTd = document.getElementById("codeTd");
            var typeTd = document.getElementById("typeTd");
            var secTd = document.getElementById("secTd");
            var timeTd = document.getElementById("timeTd");
            var dayTd = document.getElementById("dayTd");
            codeTd.textContent = selectedOption.getAttribute("data-code");
            typeTd.textContent = selectedOption.getAttribute("data-type");
            secTd.textContent = selectedOption.getAttribute("data-sec");
            timeTd.textContent = selectedOption.getAttribute("data-time");
            dayTd.textContent = selectedOption.getAttribute("data-day");
        }
    </script>
</body>
</html>
