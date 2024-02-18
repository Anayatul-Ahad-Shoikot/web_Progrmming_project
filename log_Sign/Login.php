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
    <div class="alert one">
        <?php
            if(isset($_SESSION['red'])){
                echo "<h5>".$_SESSION['red']."</h5>";
                unset($_SESSION['red']);
            }
        ?>
    </div>
    <div class="alert two">
        <?php
            if(isset($_SESSION['green'])){
                echo "<h5>".$_SESSION['green']."</h5>";
                unset($_SESSION['green']);
            }
        ?>
    </div>
    <div style="display: flex; ">
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
            <!-- <p>Don't have an account?  <a href="/log_Sign/Signup.php">SignUp</a></p> -->
        </div>
        <div class="img" style="display:flex; align-items:center; background-color: antiquewhite;">
            <img src="/Resource/login.png" alt="">
        </div>
    </div>
    
</body>
</body>
</html>

