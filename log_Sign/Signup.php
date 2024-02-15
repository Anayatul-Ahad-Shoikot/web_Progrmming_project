<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/log_Sign/Login.css">
        <title>Sign Up</title>
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
        <div style="display: flex; width: 850px;">
        <div class="login-container two">
            <form action="/log_Sign/SignUp_BE.php" method="POST">
                <h1>SignUp</h1>
                <div class="row">  
                    <div class="input-container">
                        <label>Username</label>
                        <input type="text" name="username" required>
                    </div>
                    <div class="input-container">
                        <label>Email</label>
                        <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\./[a-z]{2,4}$" name="useremail" required>
                    </div>
                    <div class="input-container">
                        <label>Password</label>
                        <input type="password" name="userpassword" required>
                    </div>
                    <div class="input-container">
                        <label>Confirm password</label>
                        <input type="password" name="confirm_password" required>
                    </div>
                </div>
                <button type="submit" name="signup_btn">SignUp</button>
            </form>
            <p style="margin-top: 15px;">Already have an account?  <a href="/log_Sign/Login.php">Login</a></p>
        </div>
        <div class="img" style="display:flex; align-items:center; background-color: antiquewhite;">
            <img src="/Resource/login.png" alt="">
        </div>
    </div>
    </body>
    </body>
</html>