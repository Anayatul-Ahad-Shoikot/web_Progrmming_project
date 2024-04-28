<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/log_Sign/Login.css">
    <title>Home</title>
</head>
<body>
    <div class="auth-wrapper">
        <div class="content" style="position: relative; z-index: 2;">
            <span class="r"></span>
            <span class="r s"></span>
            <span class="r s"></span>
            <span class="r" style="top: 15rem;left: -8rem;z-index: -1000;background: linear-gradient(-135deg, #d6b12f 0%, #f45136 100%);"></span>
            <div class="alert one">
                <?php
                if (isset($_SESSION['red'])) {
                    echo "<h5>" . $_SESSION['red'] . "</h5>";
                    unset($_SESSION['red']);
                }
                ?>
            </div>
            <div class="alert two">
                <?php
                if (isset($_SESSION['green'])) {
                    echo "<h5>" . $_SESSION['green'] . "</h5>";
                    unset($_SESSION['green']);
                }
                ?>
            </div>
            <div style="display: flex;">
                <div class="login-container">
                    <form action="/log_Sign/Login_BE.PHP" method="POST">
                        <h1>LogIn</h1>
                        <div class="input-container">
                            <label>User name</label>
                            <input type="text" name="username" required>
                        </div>
                        <div class="input-container">
                            <label>Password</label>
                            <input type="password" name="userpassword" required>
                        </div>
                        <button type="submit" name="login_btn">LogIn</button>
                    </form>
                    <div class="forgetPass">
                        <a href="#">Forget password?</a>
                    </div>
                </div>
                <div class="img">
                    <img src="/Resource/uiu_logo_update.png">
                </div>
            </div>
        </div>
    </div>
</body>
</body>
</html>