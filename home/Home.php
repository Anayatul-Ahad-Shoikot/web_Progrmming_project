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
        <link rel="stylesheet" href="/home/Home.css" />
        <title>Home</title>
    </head>
    <body>
        
        <section class="sidebar">
            <a href="#" class="logo">
                <img src="/Resource/logo.jpeg"/>
            </a>
            <ul class="side-menu top">
                <li class="active">
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
                <a href="#" class="nav-link">
                    <i style="font-size: 1.6rem;" class='bx bxs-book-open'></i>
                    <span class="text">Courses</span>
                </a>
                </li>
                <li>
                <a href="#" class="nav-link">
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
                <form action="#" method="GET">
                    <div class="form-input">
                        <input type="search" name="query" placeholder="search..."/>
                        <button type="submit" class="search-btn">
                        <i class="fas fa-search search-icon"></i>
                        </button>
                    </div>
                </form>
                <input type="checkbox" hidden id="switch-mode"/>
                <label for="switch-mode" class="switch-mode"></label>
                <a href="/accounts/account.php" class="profile"><img src="../accounts/<?php echo $img ?>" alt="profile"/></a>
            </nav>
        <main>
            <div class="upper-part">
                <div class="head-title">
                    <h1>Welcome Back</h1>
                    <p><?php echo $username; ?>...</p>
                </div>
                <div class="clndr">
                    <div class="calendar">
                        <div class="header">
                            <div class="month"></div>
                            <div class="btns">
                            <div class="btn today-btn">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                            <div class="btn prev-btn">
                                <i class="fas fa-chevron-left"></i>
                            </div>
                            <div class="btn next-btn">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            </div>
                        </div>
                        <div class="weekdays">
                            <div class="day">Sun</div>
                            <div class="day">Mon</div>
                            <div class="day">Tue</div>
                            <div class="day">Wed</div>
                            <div class="day">Thu</div>
                            <div class="day">Fri</div>
                            <div class="day">Sat</div>
                        </div>
                        <div class="days">
                        </div>
                    </div>
                </div>
            </div>
            <div class="lower-part">
                <div class="todo-1">
                    <div class="head">
                        <h1>Notices</h1>
                    </div>
                    <ul class="todo-list">
                        <?php
                            $url = 'https://www.uiu.ac.bd/notice/';
                            $html = file_get_contents($url);
                            $dom = new DOMDocument;
                            @$dom->loadHTML($html);
                            $xpath = new DOMXPath($dom);
                            $dates = $xpath->query("//div[contains(@class, 'date-container')]/span[contains(@class, 'date')]");
                            $titles = $xpath->query("//div[contains(@class, 'details')]/div[contains(@class, 'title')]/a");
                            if($dates->length > 0 && $titles->length > 0) {
                                for($i = 0; $i < $dates->length; $i++) {
                                    $dateText = $dates->item($i)->nodeValue;
                                    $titleText = $titles->item($i)->nodeValue;
                                    $titleLink = $titles->item($i)->getAttribute('href');
                                    $dateParts = explode(' ', trim($dateText));
                                    $day = $dateParts[1];
                                    $month = substr($dateParts[0], 0, 3);
                                    echo '<li class="completed">
                                            <div class="notice-date">
                                                <div class="date">
                                                    <h4>'.$day.'</h4>
                                                </div>
                                                <div class="month">
                                                    <h3>'.$month.'</h3>
                                                </div>
                                            </div>
                                            <div class="notice-container">
                                                <p><a href="'.$titleLink.'">'.$titleText.'</a></p>
                                            </div>
                                        </li>';
                                }
                            } else {
                                echo 'No notices found.';
                            }
                        ?>
                    </ul>
                </div>
                <div class="todo">
                    <div class="head">
                    <h2>Notes</h2>
                    <a href="#"><i class='bx bxs-plus-circle' ></i></a>
                    </div>
                    <ul class="todo-list">
                        <?php 
                            if (isset($_GET['query'])){
                                include('/xampp/htdocs/web_Progrmming_project/home/search1.php');
                            } else {
                                include('/xampp/htdocs/web_Progrmming_project/home/fetch_note_BE.php');
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </main>
        </section>
        <div id="notePopup" class="note-popup">
            <div class="popup-content">
                <span class="close">&times;</span>
                <form action="/home/save_note_BE.php" id="noteForm" method="POST">
                    <input type="hidden" id="noteId" name="note_id">
                    <input type="text" id="facultyName" name="note_for" placeholder="Faculty Name" required>
                    <textarea id="noteText" name="note_content" placeholder="Write your note here..." required></textarea>
                    <button type="submit" name="save">Save</button>
                </form>
            </div>
        </div>

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
        <script src="/home/Home_Calender.js"></script>
        <script src="/home/notes.js"></script>
    </body>
</html>