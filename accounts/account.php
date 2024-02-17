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
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/accounts/account.css">
    <title>orphans</title>
  </head>
  <body>

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

    <section class="sidebar">
            <a href="" class="logo">
                <img src="" alt="Logo" />
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
            <form action="#" style="visibility: hidden;">
                <div class="form-input">
                    <input type="search" placeholder="search..." />
                    <button class="search-btn"><i class="fas fa-search search-icon"></i></button>
                </div>
            </form>
            <input type="checkbox" hidden id="switch-mode" />
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="profile"><img src="<?php echo $img ?>" alt="profile"/></a>
        </nav>

      <main>
        <div class="head-title">
            <div class="left">
                <h1>Accounts</h1>
                <ul class="breadcrumb">
                    <li><a class="active" href="/home/Home.php">Home</a></li>
                    <li>></li>
                    <li><a href="#">Admin Profile</a></li>
				</ul>
            </div>
        </div>

        <div class="container">
            <div class="box st">
                <h1>My Deteails</h1>
                <form action="/accounts/update_info_BE.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="username" placeholder="<?php echo 'Username : '.$username ?>" autocomplete="off">
                    <input type="email" name="useremail" placeholder="<?php echo 'Useremail : '.$useremail ?>" autocomplete="New-email">
                    <input type="password" name="newpass" placeholder="Enter new password">
                    <input type="password" name="re-pass" placeholder="Confirm your new password">Upload Profile Image
                    <input type="file" name="image" accept="image/*">
                    <input type="password" name="userpassword" placeholder="Password to continue" required>
                    <button type="submit" name="submit1">Update</button>
                </form>
            </div>
            <div class="box st">
                <h1>Add New Admin</h1>
                <form action="/accounts/add_admin_BE.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="username" placeholder="Admin username" autocomplete="off" required>
                    <input type="email" name="useremail" placeholder="Admin useremail" autocomplete="off" required>
                    <input type="text" name="priority" placeholder="Admin priyority <?php echo '(must be > '.$prior.' )' ?>" autocomplete="off" required>
                    <input type="password" name="Password" placeholder="Password" autocomplete="off" required>
                    <input type="password" name="ConfirmPassword" placeholder="ConfirmPassword" required>
                    <input type="password" name="userpassword" placeholder="Password to continue" required>
                    <button type="submit" name="submit2">Add</button>
                </form>
            </div>
            <div class="accts">
                <?php
                    include('/xampp/htdocs/web_Progrmming_project/accounts/fetch_admins_BE.php');
                ?>
            </div>
        </div>
      </main>

    </section>

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
  </body>
</html>
