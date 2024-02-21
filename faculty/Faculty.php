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
                            <li><a href="">Faculty</a></li>
                        </ul>
                    </div>
                    <div class="add">
                        <a href="#"><p>Add&nbsp;<i class='bx bx-plus-medical'></i></p></a>
                    </div>
                </div>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Faculty Name <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Faculty Tag <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Designation <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Load  <span class="icon-arrow">&UpArrow;</span></th>
                            <th> ( T / L ) <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Max(T/L)  <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Contact  <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Mail  <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Action  <span class="icon-arrow">&UpArrow;</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> 1 </td>
                            <td>Hasan Sarwar</td>
                            <td> HS </td>
                            <td> Professor </td>
                            <td>
                                <p class="status delivered"></p>
                            </td>
                            <td> ( 1 , 2 ) </td>
                            <td> ( 3 , 3 ) </td>
                            <td> 01973336001 </td>
                            <td> HS@gmail.com </td>
                            <td><button>--:--</button></td>
                        </tr>
                        <tr>
                            <td> 2 </td>
                            <td>Jeet Saru </td>
                            <td> Dhanmondi </td>
                            <td> 27 Aug, 2023 </td>
                            <td>
                                <p class="status cancelled">Cancelled</p>
                            </td>
                            <td> <strong>$222.50</strong> </td>
                        </tr>
                        <tr>
                            <td> 3</td>
                            <td>Sonal Gharti </td>
                            <td> Mohakhali </td>
                            <td> 14 Mar, 2023 </td>
                            <td>
                                <p class="status shipped">Shipped</p>
                            </td>
                            <td> <strong>$333.40</strong> </td>
                        </tr>
                        <tr>
                            <td> 4</td>
                            <td>Alson GC </td>
                            <td> Banani </td>
                            <td> 25 May, 2023 </td>
                            <td>
                                <p class="status delivered">Delivered</p>
                            </td>
                            <td> <strong>$444.70</strong> </td>
                        </tr>
                        <tr>
                            <td> 5</td>
                            <td>Sarita Limbu </td>
                            <td> gulshan 1 </td>
                            <td> 23 Apr, 2023 </td>
                            <td>
                                <p class="status pending">Pending</p>
                            </td>
                            <td> <strong>$55.99</strong> </td>
                        </tr>
                        <tr>
                            <td> 6</td>
                            <td> Alex Gonley </td>
                            <td> gulshsan 2 </td>
                            <td> 23 Apr, 2023 </td>
                            <td>
                                <p class="status cancelled">Cancelled</p>
                            </td>
                            <td> <strong>$56.99</strong> </td>
                        </tr>
                        <tr>
                            <td> 7</td>
                            <td>Jeet Saru </td>
                            <td> Science lab </td>
                            <td> 20 May, 2023 </td>
                            <td>
                                <p class="status delivered">Delivered</p>
                            </td>
                            <td> <strong>$99.99</strong> </td>
                        </tr>
                        <tr>
                            <td> 8</td>
                            <td>Aayat Ali Khan </td>
                            <td> Khilgaon </td>
                            <td> 30 Feb, 2023 </td>
                            <td>
                                <p class="status pending">Pending</p>
                            </td>
                            <td> <strong>$149.70</strong> </td>
                        </tr>
                        <tr>
                            <td> 9</td>
                            <td>Alson GC </td>
                            <td> Dhaka </td>
                            <td> 22 Dec, 2023 </td>
                            <td>
                                <p class="status cancelled">Cancelled</p>
                            </td>
                            <td> <strong>$249.99</strong> </td>
                        </tr>
                        <tr>
                            <td> 9</td>
                            <td>Alson GC </td>
                            <td> Dhaka </td>
                            <td> 22 Dec, 2023 </td>
                            <td>
                                <p class="status cancelled">Cancelled</p>
                            </td>
                            <td> <strong>$249.99</strong> </td>
                        </tr>
                        <tr>
                            <td> 9</td>
                            <td>Alson GC </td>
                            <td> Wirless </td>
                            <td> 22 Dec, 2023 </td>
                            <td>
                                <p class="status cancelled">Cancelled</p>
                            </td>
                            <td> <strong>$219.99</strong> </td>
                        </tr>
                        <tr>
                            <td> 9</td>
                            <td>Alson GC </td>
                            <td> dhanmodi 7 </td>
                            <td> 22 Dec, 2023 </td>
                            <td>
                                <p class="status cancelled">Cancelled</p>
                            </td>
                            <td> <strong>$209.99</strong> </td>
                        </tr>
                        <tr>
                            <td> 9</td>
                            <td>Alson GC </td>
                            <td> Banani 11 </td>
                            <td> 22 Dec, 2023 </td>
                            <td>
                                <p class="status cancelled">Cancelled</p>
                            </td>
                            <td> <strong>$2321.99</strong> </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
        </section>
        <script src="/home/Home.js"></script>
        <script src="/faculty/scripts.js"></script>
    </body>
</html>