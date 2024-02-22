<?php
// fetch_faculty_info.php
include('/xampp/htdocs/web_Progrmming_project/db_con.php');

// Check if the 'faculty' key exists in the $_GET array
$selectedFaculty = isset($_GET['faculty']) ? $_GET['faculty'] : '';

if (!empty($selectedFaculty)) {
    // Use prepared statements to prevent SQL injection
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

    // Return the faculty information as JSON
    echo json_encode($facultyInfo);
// } else {
//     // Return an empty JSON object if 'faculty' key is not set
//     echo json_encode([]);
// }
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
                            <form method="POST" action="/timeline/test.php">
                                <td>
                                    <input type="text" id="searchInput" oninput="filterDropdown()" placeholder="Search Faculty">
                                    <select name="name" id="facultySelect" onchange="updateFacultyInfo()">
                                        <option value="">Select Faculty</option>
                                        <?php
                                            include('/xampp/htdocs/web_Progrmming_project/timeline/Faculty_sgtn_BE.php');
                                        ?>
                                    </select>
                                </td>
                                <td id="currentTd"></td>
                                <td id="maxTd"></td>
                                <td id="Course">
                                    <input type="text" id="CourseInput" oninput="CourseDropdown()" placeholder="Search Course">
                                    <select name="c_name" id="CourseSelect" onchange="updateFacultyInfo()">
                                        <option value="">Select Faculty</option>
                                        <?php
                                            include('/xampp/htdocs/web_Progrmming_project/timeline/Faculty_sgtn_BE.php');
                                        ?>
                                    </select>
                                </td> 
                                <td id="Course_Section">
                                    
                                </td>
                                <td id="Course_time">
                                    
                                </td>
                                <td id="Course_day">
                                    
                                </td>
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
        function CourseDropdown() {
            var input, filter, select, option, i;
            input = document.getElementById("CourseInput");
            filter = input.value.toUpperCase();
            select = document.getElementById("CourseSelect");
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