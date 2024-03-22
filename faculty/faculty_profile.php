<?php 
    include('/xampp/htdocs/web_Progrmming_project/accounts/fetch_info_BE.php');
    include('/xampp/htdocs/web_Progrmming_project/faculty/faculty_details_BE.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="/faculty/faculty_profile.css">
        <title>Faculties</title>
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
                <li class="active">
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
                <li>
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

        <section class="content">
            <nav class="e">
                <i class="fas fa-bars menu-btn"></i>
                <form action="#">
                    <div class="form-input" style="visibility:hidden;">
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
            <main class="mn">
                <div class="head-title">
                    <div class="left">
                        <h1>Faculties</h1>
                        <ul class="breadcrumb">
                            <li><a class="active" href="/home/Home.php">Home</a></li>
                            <li>></li>
                            <li><a class="active" href="/faculty/Faculty.php">Faculty</a></li>
                            <li>></li>
                            <li><a>Profile</a></li>
                        </ul>
                    </div>
                </div>
                <div class="profileBox">
                <div class="left">
                        <div class="details">
                            <h1><?php echo $f_name,", [", $f_code, "]" ?></h1>
                            <p><?php echo $desig, ", Department of ", $dept ?></p>
                            <p><?php echo "Email : ", $f_mail ?></p>
                            <p><?php echo "Phone : ", $f_contact ?></p>
                        </div>
                        <h1 id="header">present courses</h1>
                        <div class="present">
                            <?php
                                include ('/xampp/htdocs/web_Progrmming_project/faculty/present_details_BE.php');
                            ?>
                        </div>
                        <h1 id="header">past courses</h1>
                        <div class="present">
                            <?php
                                include ('/xampp/htdocs/web_Progrmming_project/faculty/past_details_BE.php');
                            ?>
                        </div>
                    </div>
                    <div class="right">
                        <h1>hiii right</h1>
                        <div class="box">
                            <div class="best">
                                <h1>best course</h1>
                            </div>
                            <div class="worst">
                                <h1>worst course</h1>
                            </div>
                            <div class="notes">
                                <h1>notes</h1>
                            </div>
                        </div>
                    </div>
                </div>
                    
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