<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
    <title>NWM Management System</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="css/layout.css" rel="stylesheet" />
    <link href="css/login.css" rel="stylesheet" />
    <script src="js/password.js" type="text/javascript" defer></script>
</head>

<body>

    <?php
        if(isset($_GET['error'])==true){
        echo'<font color="#FF0000"><p align="center">Wrong Username or Password</p></font>';
        }
    ?>
        
    <div class="container" id="container">

        <div class="form-container sign-in-container">
            <form action="dblogin.php" method="post">
                  <h3>NWM Management System</h3>
                <img src="image/neowood.png" alt="user icon" width="170" height="100">
                <!-- <h2>Login</h2> -->

                <label for="login_id"></label>
                <input type="hidden" id="DEFAULT" name="login_id">

                <label for="Username"></label>
                <input type="text" placeholder="Username" id="username" name="username">

                <input type="password" value="" id="myInput" placeholder="Password" name="password">
		
				<br>
				
                <label>
                    <input type="checkbox" onclick="myFunction()">Show Password
                </label>

                <label for="log_in_at"></label>
                <input type="hidden" id="now()" name="log_in_at">
                <button input class="btn btn-primary btn-user btn-block" type="submit" name="submit" value="Sign In">Sign In</button>
            </form>
        </div>

        <!-- <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome!</h1><br>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>NWM Management System</h1>
                    Sign in to continue access page.<br><br>
                </div>
            </div>
        </div> -->

    </div>
    
</body>
</html>

