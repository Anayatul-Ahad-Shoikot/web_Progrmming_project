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
        <title>Faculties</title>
    </head>
    <body>

        <section class="sidebar">
            <a href="#" class="logo">
                <img src="/Resource/UIU_logo_Long.png"/>
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
                    <!-- new code added -->
                    <div class="addFaculty">
                        <button id="addFacultyBtn">Add Faculty</button>
                    </div>
                    <!-- -------------- -->
                </div>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> Faculty Name <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Faculty Code </th>
                            <th> Mail </th>
                            <th> Contact </th>
                            <th> Theory <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Lab <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('/xampp/htdocs/web_Progrmming_project/faculty/fetch_faculty_BE.php');
                        ?>
                    </tbody>
                </table>
            </section>
        </main>
        </section>
        <div id="facultyModal" class="modal">
            <div class="modal-content">
            <i class='bx bx-x close'></i>
                <h1>Register Faculty</h1>
                <form method="POST" action="/faculty/add_faculty_BE.php">
                    <label for="f_name">Faculty Name :</label><br>
                    <input type="text" name="f_name" required><br>
                    <label for="f_code">Faculty Code :</label><br>
                    <input type="text" name="f_code" required><br>
                    <label for="f_contact">Contact :</label><br>
                    <input type="text" name="f_contact" required><br>
                    <label for="f_mail">Mail :</label><br>
                    <input type="text" name="f_mail" required><br>
                    <label for="dept">Department :</label>
                    <select name="dept">
                        <option value="" disabled selected>Select Department</option>
                        <option value="CSE">CSE</option>
                        <option value="DS">DS</option>
                        <option value="BBA">BBA</option>
                        <option value="EEE">EEE</option>
                    </select><br>
                    <label for="desig">Designation :</label>
                    <select name="desig">
                        <option value="" disabled selected>Select Designation</option>
                        <option value="Professor">Professor</option>
                        <option value="Assistant Prof.">Assistant Prof.</option>
                        <option value="Lecturer">Lecturer</option>
                        <option value="Instructor">Instructor</option>
                    </select><br>
                    <label for="f_max_t">Theory Limit :</label>
                    <select name="f_max_t">
                        <option selected disabled>Max Theory class No.</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select><br>
                    <label for="f_max_l">Lab Limit :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <select name="f_max_l">
                        <option selected disabled>Max lab class No.</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select><br>
                    <button type="submit" name="add_btn">ADD</button>
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

<script>
    var modal = document.getElementById("facultyModal");
    var btn = document.getElementById("addFacultyBtn");
    var span = document.getElementsByClassName("close")[0];

    function resetModal() {
        modal.classList.remove("open", "close");
        modal.style.display = "none"; // Ensure modal is not displayed
        modal.style.right = "-30%"; // Reset to initial off-screen position
    }

    btn.onclick = function() {
        modal.style.display = "block"; // Make the modal display:block but off-screen
        requestAnimationFrame(() => {
            modal.classList.add("open"); // Then, trigger the slide-in effect
            modal.style.right = ""; // Clear this style to allow .open class to take effect
        });
    }

    span.onclick = function() {
        modal.classList.add("close");
        modal.classList.remove("open");
        setTimeout(() => {
            resetModal(); // Use reset function to ensure correct state for next opening
        }, 500); // Wait for the animation to finish
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.classList.add("close");
            modal.classList.remove("open");
            setTimeout(() => {
                resetModal(); // Use reset function to ensure correct state for next opening
            }, 500); // Wait for the animation to finish
        }
    }
</script>


        <script src="/home/Home.js"></script>
        <script src="/faculty/scripts.js"></script>
    </body>
</html>