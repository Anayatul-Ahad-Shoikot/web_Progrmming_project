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
        <link rel="stylesheet" href="/faculty/faculty.css" />
        <title>Home</title>
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
                <a href="#" class="nav-link">
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
                        <h1>Faculties</h1>
                        <ul class="breadcrumb">
                            <li><a class="active" href="/home/Home.php">Home</a></li>
                            <li>></li>
                            <li><a href="">Faculty <?php echo "&nbsp- ".$_SESSION['f_total'] ?></a></li>
                        </ul>
                    </div>
                    
                </div>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> Faculty Name <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Faculty Code </th>
                            <th> Designation <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Load <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Dept. <span class="icon-arrow">&UpArrow;</span></th>
                            <th> ( T / L ) <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Max(T/L) <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Contact </th>
                            <th> Mail </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="first_row">
                            <form method="POST" action="/faculty/add_faculty_BE.php">
                                <td>
                                    <input type="text" name="f_name" placeholder="Enter Name">
                                </td>
                                <td>
                                    <input type="text" name="f_code" placeholder="Enter Code">
                                </td>
                                <td>
                                    <input type="text" name="f_designation" placeholder="Enter Designation">
                                </td>
                                <td>
                                    <!-- load -->
                                </td>
                                <td>
                                    <input type="text" name="f_dept." placeholder="Enter Department">
                                </td>
                                <td>
                                    <!-- current T/L -->
                                </td>
                                <td>
                                    <input type="text" name="faculty_max_TL" placeholder="Maximum theory, lab ">
                                </td>
                                <td>
                                    <input type="text" name="f_contact" placeholder="Enter contact">
                                </td>
                                <td>
                                    <input type="text" name="f_mail" placeholder="Enter email">
                                </td>
                                <td>
                                    <button type="submit" name="add_btn">Add</button>
                                </td>
                            </form>
                        </tr>
                        <tr>
                            <td>Hasan Sarwar</td>
                            <td>HS</td>
                            <td>Professor</td>
                            <td>
                                <p class="status delivered"></p>
                            </td>
                            <td>CSE</td>
                            <td>( 1 , 1 )</td>
                            <td>( 1 , 1 )</td>
                            <td>01973336001</td>
                            <td>HS@gmail.com</td>
                            <td><button> --:-- </button></td>
                        </tr>
                        <tr>
                            
                            <td>Mohammad Nurul Huda</td>
                            <td>MNH</td>
                            <td>Professor</td>
                            <td>
                                <p class="status pending"></p>
                            </td>
                            <td>CSE</td>
                            <td>( 1 , 1 )</td>
                            <td>( 1 , 1 )</td>
                            <td>01312404674</td>
                            <td>MNH@gmail.com</td>
                            <td><button>--:--</button></td>
                        </tr>
                        <tr>
                            
                            <td>Khondaker Abdullah -Al-Mamun</td>
                            <td>KAM</td>
                            <td>Professor</td>
                            <td>
                                <p class="status shipped"></p>
                            </td>
                            <td>CSE</td>
                            <td>( 2 , 2 )</td>
                            <td>( 1 , 1 )</td>
                            <td>01711404674</td>
                            <td>KAM@gmail.com</td>
                            <td><button>--:--</button></td>
                        </tr>
                        <tr>
                            
                            <td>Salekul Islam</td>
                            <td>Sakm</td>
                            <td>Professor</td>
                            <td>
                                <p class="status cancelled"></p>
                            </td>
                            <td>CSE</td>
                            <td>( 3 , 3 )</td>
                            <td>( 1 , 1 )</td>
                            <td>01973336001</td>
                            <td>Salm@gmail.com</td>
                            <td><button>--:--</button></td>
                        </tr>
                        <?php
                            include('/xampp/htdocs/web_Progrmming_project/faculty/fetch_faculty_BE.php');
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