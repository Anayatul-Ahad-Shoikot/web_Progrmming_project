<?php
include('/xampp/htdocs/web_Progrmming_project/timeline/DataHold.php');
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
                            <th> Course </th>
                            <th> Course Code </th>
                            <th> Saturday </th>
                            <th> Sunday </th>
                            <th> Tuesday </th>
                            <th> Wednesday </th>
                            <th> Theory </th>
                            <th> Lab </th>
                            <th> Action </th>
                        </tr>
                        <tr id="first_row">
                            <form id="myForm" method="POST" action="submit.php">
                                <td id="col_1">
                                    <input type="text" id="searchInput" oninput="filterDropdown()" placeholder="Search Faculty">
                                    <select name="faculty" id="facultySelect" onchange="updateFacultyInfo()">
                                        <option selected disabled>Select Faculty</option>
                                        <?php
                                            include('/xampp/htdocs/web_Progrmming_project/timeline/fetch_faculty.php');
                                        ?>
                                    </select>
                                </td>
                                <td id="col_2">
                                    <input type="text" id="searchInputCourse" oninput="filterDropdownCourse()" placeholder="Search Course">
                                    <select name="course" id="courseSelect" onchange="updateCourseInfo()">
                                        <option selected disabled>Select Course</option>
                                        <?php
                                        include('/xampp/htdocs/web_Progrmming_project/timeline/fetch_course.php');
                                        ?>
                                    </select>
                                </td>
                                <td >
                                    <input id="col_3" name="col_3" type="text" value="">
                                </td>
                                <td>
                                    <input id="sat" name="sat" type="text" value="">
                                </td>
                                <td>
                                    <input id="sun" name="sun" type="text" value="">
                                </td>
                                <td>
                                    <input id="tue" name="tue" type="text" value="">
                                </td>
                                <td>
                                    <input id="wed" name="wed" type="text" value="">      
                                </td>
                                <td id="theory">
                                    
                                </td>
                                <td id="lab"></td>
                                    
                                </td>
                                <td>
                                    <button type="submit" name="add_btn">ADD</button>
                                </td>
                                <input type="hidden" id="c_t" name="c_t" value="">
                                <input type="hidden" id="m_t" name="m_t" value="">
                                <input type="hidden" id="c_l" name="c_l" value="">
                                <input type="hidden" id="m_l" name="m_l" value="">
                            </form>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include("/xampp/htdocs/web_Progrmming_project/timeline/fetch_timeline.php");
                        ?>
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
    </script>
    <script src="/timeline/InputScript.js"></script>
    <script src="/home/Home.js"></script>
    <script src="/faculty/scripts.js"></script>
    <audio id="popupSound">
        <source src="/Resource/notification.wav" type="audio/mpeg">
    </audio>
</body>

</html>