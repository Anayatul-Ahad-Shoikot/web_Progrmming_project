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
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="/course/course.css" />
    <title>Courses</title>
</head>

<body>

    <section class="sidebar">
        <a href="#" class="logo">
            <img src="/Resource/UIU_logo_Long.png"/>
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
            <li class="active">
                <a href="/course/course.php" class="nav-link">
                    <i style="font-size: 1.6rem;" class='bx bxs-book-open'></i>
                    <span class="text">Courses</span>
                </a>
            </li>
            <li>
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

    <section class="content">
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
            <a href="/accounts/account.php" class="profile"><img src="../accounts/<?php echo $img ?>"
                    alt="profile" /></a>
        </nav>
        <main class="table" id="customers_table">
            <div class="head-title">
                <div class="left">
                    <h1>Courses</h1>
                    <ul class="breadcrumb">
                        <li><a class="active" href="/home/Home.php">Home</a></li>
                        <li>></li>
                        <li><a href="">Courses</a></li>
                    </ul>
                </div>

            </div>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> Course Code <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Course Name <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Type <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Section <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Time slot<span class="icon-arrow">&UpArrow;</span></th>
                            <th> Day slot </th>
                            <th> ------ </th>
                            <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="first_row">
                            <form method="POST" action="/course/add_course_BE.php">
                                <td>
                                    <input type="text" name="c_code" placeholder="Enter Course code" required>
                                </td>
                                <td>
                                    <input type="text" name="c_name" placeholder="Enter Course Name" required>
                                </td>
                                <td>
                                    <select name="c_type" id="c_type" onchange="showTimeOptions()">
                                        <option selected disabled>Select Type</option>
                                        <option value="Theory">Theory</option>
                                        <option value="Lab">Lab</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="c_sec" placeholder="Enter section" required>
                                </td>
                                <td>
                                    <select name="c_time" id="c_time" disabled>
                                        <option selected disabled>Select Time</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="c_day" id="c_day" disabled>
                                        <option selected disabled>Select Day</option>
                                    </select>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <button type="submit" name="add_btn">ADD</button>
                                </td>
                            </form>
                        </tr>
                        <?php
                            include('/xampp/htdocs/web_Progrmming_project/course/fetch_course_BE.php');
                        ?>
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



    <script src="scripts.js"></script>
    <script src="/home/Home.js"></script>
    <script src="/course/button_popup.js"></script>
    <script src="/course/classTime.js"></script>
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


</body>

</html>