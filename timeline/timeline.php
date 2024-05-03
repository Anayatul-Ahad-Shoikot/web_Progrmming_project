<?php
include('/xampp/htdocs/web_Progrmming_project/accounts/fetch_info_BE.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/timeline/timeline.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <style>
        .popup {
            display: none;
            position: fixed;
            width: 25%;
            bottom: 45px;
            right: 49px;
            background-color: rgb(143, 179, 169);
            padding: 20px;
            box-shadow: 9px 11px 6px rgba(0, 0, 0, 0.3);
            z-index: 999999;
            border-radius: 5px;
        }

        .popup h3 {
            margin-top: 0;
            margin-bottom: 5px;
            font-family: 'Segoe UI';
        }

        .close-btn {
            position: absolute;
            top: 5px;
            right: 10px;
            cursor: pointer;
        }
    </style>
    <title>Timeline</title>
</head>

<body>
    <section class="sidebar">
        <a href="#" class="logo">
            <img src="/Resource/R.png" />
        </a>
        <ul class="side-menu top">
            <li>
                <a href="/home/Home.php" class="nav-link">
                    <i style="font-size: 1.7rem;" class='bx bxs-home'></i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li>
                <a href="/faculty/Faculty.php" class="nav-link">
                    <i style="font-size: 1.7rem;" class='bx bxs-graduation'></i>
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
                    <i style="font-size: 1.7rem;" class='bx bx-history'></i>
                    <span class="text">History</span>
                </a>
            </li>
            <li>
                <a href="/log_Sign/logout_BE.php" class="logout">
                    <i style="font-size: 1.7rem; font-weight:900;" class='bx bx-power-off'></i>
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
                    <button class="search-btn"><i class="fas fa-search search-icon"></i></button>
                </div>
            </form>
            <input type="checkbox" hidden id="switch-mode" />
            <label for="switch-mode" class="switch-mode"></label>
            <a href="/accounts/account.php" class="profile"><img src="../accounts/<?php echo $img ?>" alt="profile" /></a>
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
                            <th> Faculty </th>
                            <th> Saturday </th>
                            <th> Sunday </th>
                            <th> Tuesday </th>
                            <th> Wednesday </th>
                            <th> Theory </th>
                            <th> Lab </th>
                            <th> Action </th>
                        </tr>
                        <tr id="first_row">
                            <form id="myForm" method="POST" action="/timeline/submit.php">
                                <td>
                                <select name="faculty" id="facultySelect" class="form-control" onchange="updateFacultyInfo()">
                                    <option selected disabled>select faculty </option>
                                        <?php
                                            include '/xampp/htdocs/web_Progrmming_project/db_con.php';
                                            $sql = "SELECT * FROM faculty WHERE visible = 1";
                                            $result = $con->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<option value="' . $row["f_code"] . '" data-current_T="' . $row["f_current_T"] . '" data-max_T="' . $row["f_max_T"] . '" data-current_L="' . $row["f_current_L"] . '" data-max_L="' . $row["f_max_L"] . '">' . $row["f_name"] . '</option>';
                                                }
                                                echo "done";
                                            } else {
                                                echo '<option>No faculty found</option>';
                                            }
                                            $con->close();
                                        ?>
                                </select>
                                </td>
                                <td>
                                    <select name="saturday" id="saturdaySelect" class="form-control" onchange="checkSatCourse()" >
                                        <option selected disabled>select Saturday Course </option>
                                        <?php
                                            include '/xampp/htdocs/web_Progrmming_project/db_con.php';
                                            $sql = "SELECT * FROM course WHERE Allocation = 'Not Assigned' AND c_day1 = 'Sat'";
                                            $result = $con->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $start_time_12hr = date("h:i", strtotime($row["c_startTime"]));
                                                    $end_time_12hr = date("h:i", strtotime($row["c_endTime"]));
                                                echo '<option value="' . $row["c_id"] .'" title="'.$row["c_type"].'; Day:'.$row["c_day1"].'-'.$row["c_day2"].';  '.$row["c_sec"].'"> ' . $row["c_name"] . '- ['.$start_time_12hr.'-'.$end_time_12hr.']</option>';
                                                }
                                            } else {
                                                echo '<option>No Course Found!</option>';
                                            }
                                            $con->close();
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="sunday" id="sundaySelect" class="form-control" onchange="checkSunCourse()">
                                        <option selected disabled>select Sunday Course </option>
                                        <?php
                                            include '/xampp/htdocs/web_Progrmming_project/db_con.php';
                                            $sql = "SELECT c_id, c_name, c_startTime, c_endTime, c_type, c_sec FROM course WHERE Allocation = 'Not Assigned' AND c_day1 = 'Sun'";
                                            $result = $con->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $start_time_12hr = date("h:i", strtotime($row["c_startTime"]));
                                                    $end_time_12hr = date("h:i", strtotime($row["c_endTime"]));
                                                echo '<option value="' . $row["c_id"] .'" title="'.$row["c_type"].';  '.$row["c_sec"].'"> ' . $row["c_name"] . '- ['.$start_time_12hr.'-'.$end_time_12hr.']</option>';
                                                }
                                            } else {
                                                echo '<option>No Course Found!</option>';
                                            }
                                            $con->close();
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="tuesday" id="tuesdaySelect" class="form-control" onchange="checkTueCourse()">
                                        <option selected disabled>select Tuesday Course </option>
                                        <?php
                                            include '/xampp/htdocs/web_Progrmming_project/db_con.php';
                                            $sql = "SELECT c_id, c_name, c_startTime, c_endTime, c_type, c_sec FROM course WHERE Allocation = 'Not Assigned' AND ((c_day1 = 'Sat' AND c_day2 = 'Tue') OR c_day1 = 'Tue')";
                                            $result = $con->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $start_time_12hr = date("h:i", strtotime($row["c_startTime"]));
                                                    $end_time_12hr = date("h:i", strtotime($row["c_endTime"]));
                                                echo '<option value="' . $row["c_id"] .'" title="'.$row["c_type"].';  '.$row["c_sec"].'"> ' . $row["c_name"] . '- ['.$start_time_12hr.'-'.$end_time_12hr.']</option>';
                                                }
                                            } else {
                                                echo '<option>No Course Found!</option>';
                                            }
                                            $con->close();
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="wednesday" id="wednesdaySelect" class="form-control" onchange="checkWedCourse()">
                                        <option selected disabled>select Wednesday Course </option>
                                        <?php
                                            include '/xampp/htdocs/web_Progrmming_project/db_con.php';
                                            $sql = "SELECT c_id, c_name, c_startTime, c_endTime, c_type, c_sec FROM course WHERE Allocation = 'Not Assigned' AND ((c_day1 = 'Sun' AND c_day2= 'Wed') OR c_day1 = 'Wed')";
                                            $result = $con->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $start_time_12hr = date("h:i", strtotime($row["c_startTime"]));
                                                    $end_time_12hr = date("h:i", strtotime($row["c_endTime"]));
                                                echo '<option value="' . $row["c_id"] .'" title="'.$row["c_type"].';  '.$row["c_sec"].'"> ' . $row["c_name"] . '- ['.$start_time_12hr.'-'.$end_time_12hr.']</option>';
                                                }
                                            } else {
                                                echo '<option>No Course Found!</option>';
                                            }
                                            $con->close();
                                        ?>
                                    </select>
                                </td>
                                <td id="theory">
                                    
                                </td>
                                <td id="lab">
                                    
                                </td>
                                <td>
                                    <button type="submit" name="add_btn">ADD</button>
                                </td>
                            </form>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <?php 
                            include('/xampp/htdocs/web_Progrmming_project/timeline/fetch_timeline.php');
                        ?> -->
                    </tbody>
                </table>
            </section>
        </main>
    </section>
    <div class="notification-container">
        <?php
        if (isset($_SESSION['red'])) {
            echo '<div class="alert one">
                            <h5>' . $_SESSION['red'] . '</h5>
                        </div>';
            unset($_SESSION['red']);
        }
        if (isset($_SESSION['green'])) {
            echo '<div class="alert two">
                            <h5>' . $_SESSION['green'] . '</h5>
                        </div>';
            unset($_SESSION['green']);
        }
        ?>
    </div>
    <div class="popup" id="notePopup">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <h3>Proposals:</h3>
        <div id="noteContent"></div>
    </div>




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
        $(document).ready(function() {
            $('#facultySelect').select2({
                placeholder: "Select faculty",
                allowClear: false
            });
        });
        $(document).ready(function() {
            $('#saturdaySelect').select2({
                placeholder: "Select Saturday Course",
                allowClear: false
            });
        });
        $(document).ready(function() {
            $('#sundaySelect').select2({
                placeholder: "Select Sunday Course",
                allowClear: false
            });
        });
        $(document).ready(function() {
            $('#tuesdaySelect').select2({
                placeholder: "Select Tuesday Course",
                allowClear: false
            });
        });$(document).ready(function() {
            $('#wednesdaySelect').select2({
                placeholder: "Select Wednesday Course",
                allowClear: false
            });
        });
    </script>
    <script src="/timeline/InputScript.js"></script>
    <script src="/home/Home.js"></script>
    <script src="/faculty/scripts.js"></script>
    <audio id="popupSound">
        <source src="/Resource/notification.wav" type="audio/mpeg">
    </audio>
</body>

</html>