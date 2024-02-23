<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
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
<?php 
    include('/xampp/htdocs/web_Progrmming_project/accounts/fetch_info_BE.php');
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="/timeline/timeline.css" />
        <title>Timeline</title>
    </head>
    <body>

        <section class="sidebar">
            <a href="#" class="logo">
                <img src="#"/>
            </a>
            <ul class="side-menu top">
                <li>
                <a href="/home/Home.php" class="nav-link">
                    <i style="font-size: 1.7rem;" class='bx bxs-home' ></i>
                    <span class="text">Home</span>
                </a>
                </li>
                <li>
                <a href="/faculty/Faculty.php" class="nav-link">
                    <i style="font-size: 1.7rem;" class='bx bxs-graduation' ></i>
                    <span class="text">Faculties</span>
                </a>
                </li>
                <li>
                <a href="/course/course.php" class="nav-link">
                    <i style="font-size: 1.6rem;" class='bx bxs-book-open'></i>
                    <span class="text">Courses</span>
                </a>
                </li>
                <li class="active">
                <a href="/timeline/timeline.php" class="nav-link">
                    <i style="font-size: 1.4rem;" class="fa-regular fa-rectangle-list"></i>
                    <span class="text">TimeLine</span>
                </a>
                </li>
                <li>
                    <a href="/history/history.php" class="nav-link">
                        <i style="font-size: 1.7rem;" class='bx bx-history' ></i>
                        <span class="text">History</span>
                    </a>
                </li>
                <li>
                <a href="/log_Sign/logout_BE.php" class="logout">
                    <i style="font-size: 1.7rem; font-weight:900;" class='bx bx-power-off' ></i>
                    <span class="text">Logout</span>
                </a>
                </li>
            </ul>
        </section>

        <section class="content_out">
            <nav class="e">
                <i class="fas fa-bars menu-btn"></i>
                <form action="#">
                    <div class="form-input">
                        <input type="search" placeholder="search..." />
                        <button class="search-btn">
                        <i class="fas fa-search search-icon"></i>
                        </button>
                    </div>
                </form>
                <input type="checkbox" hidden id="switch-mode" />
                <label for="switch-mode" class="switch-mode"></label>
                <a href="/accounts/account.php" class="profile"><img src="../accounts/<?php echo $img ?>" alt="profile"/></a>
            </nav>
            <main class="table" id="customers_table">
                <div class="head-title">
                    <div class="left">
                        <h1>TimeLine (Spring 24')</h1>
                        <ul class="breadcrumb">
                            <li><a class="active" href="/home/Home.php">Home</a></li>
                            <li>></li>
                            <li><a href="">Timeline</a></li>
                        </ul>
                    </div>
                    
                </div>
            <section class="table__body">
            <table>
        <thead>
            <tr>
                <th> Faculty <span class="icon-arrow">&UpArrow;</span></th>
                <th> Load <span class="icon-arrow">&UpArrow;</span></th>
                <th> Course <span class="icon-arrow">&UpArrow;</span></th>
                <th> C_Code <span class="icon-arrow">&UpArrow;</span></th>
                <th> C_Type <span class="icon-arrow">&UpArrow;</span></th>
                <th> Section <span class="icon-arrow">&UpArrow;</span></th>
                <th> Time <span class="icon-arrow">&UpArrow;</span></th>
                <th> Day <span class="icon-arrow">&UpArrow;</span></th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            <tr id="first_row">
                <form method="POST" action="#">
                    <td id="col_1">
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
                    <td id="load"></td>
                    <td id="col_2">
                        <input type="text" id="searchInputCourse" oninput="filterDropdownCourse()" placeholder="Search Course">
                        <select name="course" id="courseSelect" onchange="updateCourseInfo()">
                            <option value="">Select Course</option>
                            <?php
                                include('/xampp/htdocs/web_Progrmming_project/db_con.php');
                                $sql = "SELECT * FROM course";
                                $result = $con->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['c_name'] . '" data-code="' . $row['c_code'] . '" data-type="' . $row['c_type'] . '" data-sec="' . $row['c_sec'] . '" data-time="' . $row['c_time'] . '" data-day="' . $row['c_day'] . '">' . $row['c_name'] . ' - '.$row['c_type'].' - '.$row['c_sec'].'</option>';
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
            </section>
        </main>
        </section>

        <div class="notification-container">
            <?php
                if(isset($_SESSION['red'])){
                    echo '<div class="alert one">
                            <h5>'.$_SESSION['red'].'</h5>
                        </div>';
                    unset($_SESSION['red']);
                }
                if(isset($_SESSION['green'])){
                    echo '<div class="alert two">
                            <h5>'.$_SESSION['green'].'</h5>
                        </div>';
                    unset($_SESSION['green']);
                }
            ?>
        </div>


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
            var load = document.getElementById("load");
            var ratioT = selectedOption.getAttribute("data-current_T") + " / " + selectedOption.getAttribute("data-max_T");
            var RatioL = selectedOption.getAttribute("data-current_L") + " / " + selectedOption.getAttribute("data-max_L");
            load.innerHTML = "Theory: " + ratioT + "<br> Lab: " + RatioL;
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

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const alerts = document.querySelectorAll('.notification-container > div');
                alerts.forEach(function(alert) {
                    setTimeout(function() {
                        alert.style.opacity = '1';
                        setTimeout(function() {
                            alert.style.opacity = '0';
                            setTimeout(function() {
                                alert.style.display = 'none';
                                }, 500);
                        }, 6000);
                    }, 500);
                });
            });
        </script>
        <script src="/home/Home.js"></script>
        <script src="/faculty/scripts.js"></script>
    </body>
</html>