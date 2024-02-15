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
                <img src="#" alt="Logo" />
            </a>

            <ul class="side-menu top">
                <li class="active">
                <a href="#" class="nav-link">
                    <i style="font-size: 1.7rem;" class='bx bxs-home' ></i>
                    <span class="text">Home</span>
                </a>
                </li>
                <li>
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
                    <a href="#" class="nav-link">
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



        <main>



            <div class="upper-part">
                <div class="head-title">
                    <h1>Welcome Back</h1>
                    <p>Admin...</p>
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
                            <!-- lets add days using js -->
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

                        <li class="not-completed">
                            <div class="notice-date">
                                <div class="date">
                                    <h4>13</h4>
                                </div>
                                <div class="month">
                                    <h3>Feb</h3>
                                </div>
                            </div>
                            <div class="notice-container">
                                <p>contains gose to here</p>
                            </div>
                        </li>

                        <li class="completed">
                            <div class="notice-date">
                                <div class="date">
                                    <h4>2</h4>
                                </div>
                                <div class="month">
                                    <h3>Jan</h3>
                                </div>
                            </div>
                            <div class="notice-container">
                                <p>this is second notice for uiu</p>
                            </div>
                        </li>

                    </ul>
                </div>



                <div class="todo">
                    <div class="head">
                    <h2>Notes</h2>
                    <a href="#"><i class='bx bxs-plus-circle' ></i></a>
                    </div>
        
                    <ul class="todo-list">

                    <li>
                        <div class="hdr">
                            <div><p>Fculty Name</p></div>
                            <div>
                                <a href="#" ><i class='bx bxs-edit-alt' ></i></a>
                                <a href="#" ><i class='bx bxs-message-square-x'></i></a>
                            </div>
                        </div>
                        <div class="dsrptn">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias dicta minus harum eveniet quam voluptatum cupiditate ex quasi, laboriosam qui, dignissimos animi maiores perferendis consequuntur similique doloremque nobis, impedit beatae!</p>
                        </div>
                    </li>

                    <li>
                        <div class="hdr">
                            <div><p>Fculty Name</p></div>
                            <div  class="p">
                                <a href="#"><i style="font-size: 1.1rem; color:black; margin-right:10px;" class='bx bxs-edit-alt' ></i></a>
                                <a href="#"><i style="font-size: 1.1rem; color:black;" class='bx bxs-message-square-x'></i></a>
                            </div>
                        </div>
                        <div class="dsrptn">
                            <p>class not takent by this trimester</p>
                        </div>
                    </li>
                    </ul>
                </div>
            </div>
            
        
        </main>

        </section>


        <script src="/home/Home.js"></script>
        <script src="/home/Home_Calender.js"></script>
    </body>
</html>