<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="NWM Management System">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">
        
        <title>NWM Management System</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="js/password.js" type="text/javascript" defer></script>
    </head>
    
    <body>  
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="text-center">
                <?php
                    if(isset($_GET['error'])==true){
                        echo '<div class="text-danger fw-bold mb-3">Wrong Username or Password</div>';
                    }
                ?>

                <form action="dblogin.php" method="post" class="form-signin text-center">
                    <img src="image/neowood.png" alt="user icon" style="width: 170px; height: 100px;">
                    
                    <h3 class="fw-bold" style="margin-bottom: 30px;">NWM Management System</h3>
                    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Username" id="username" name="username">
                        <label for="Username">Username</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" placeholder="Password" id="myInput" name="password">
                        <label for="Password">Password</label>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input border border-dark me-2 " onclick="myFunction()">Show Password
                        </label>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" name="submit" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF;">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>