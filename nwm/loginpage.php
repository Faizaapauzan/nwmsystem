<?php

$host="localhost";
$user="root";
$password="";
$db="nwmsystem";

session_start();

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=$_POST["username"];
	$password=$_POST["password"];


	$sql="SELECT * FROM staff_register WHERE username='".$username."' AND password='".$password."' ";

	$result=mysqli_query($data,$sql);

	$row=mysqli_fetch_array($result);

	if($row["staff_position"]=="admin")
	{	

		$_SESSION["username"]=$username;
        $_SESSION['staff_position']="admin";

		header("location:Adminhomepage.php");
	}

    elseif($row["staff_position"]=="manager")
	{

		$_SESSION["username"]=$username;
        $_SESSION['staff_position']="manager";
		
		header("location:Adminhomepage.php");
	}

	elseif($row["staff_position"]=="technician")
	{

		$_SESSION["username"]=$username;
        $_SESSION['staff_position']="technician";
		
		header("location:tech.php");
	}

    elseif($row["staff_position"]=="storekeeper")
	{

		$_SESSION["username"]=$username;
         $_SESSION['staff_position']="storekeeper";
		
		header("location:store.php");
	}

	else
	{
		echo "Username or Password incorrect";
	}

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NWM Management System</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="layout.css" rel="stylesheet" />
    <script src="password.js" type="text/javascript" defer></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

        * {
            box-sizing: border-box;
        }

        body {
            background: #f6f5f7;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Montserrat', sans-serif;
            height: 100vh;
            margin: -20px 0 50px;
        }

        h1 {
            font-weight: bold;
            margin: 0;
            margin-top: 20px;
            color: rgb(45, 79, 143);
        }

        h2 {
            text-align: center;

        }

        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }

        span {
            font-size: 12px;
        }

        a {
            color: #333;
            font-size: 14px;
            margin: 15px 0;
        }

        button {
            border-radius: 20px;
            border: 1px solid #2bbcff;
            background-color: #2bbcff;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        button:active {
            transform: scale(0.95);
        }

        button:focus {
            outline: none;
        }

        button.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }

        form {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        input[type=text],
        input[type=password] {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        input[type=radio] {
            padding: 5px 20px;
            width: 15%;
            margin-left: -25px;
        }

        .radioBtn {
            font-size: 14px;
            text-align: left;
            margin-top: 20px;
            margin-left: 30px;
            margin-bottom: 10px;
        }

        b {
            margin-left: -75px;
        }

        .radioButton1 {
            margin-left: -20px;
        }

        .radioButton2 {
            float: left;
            margin-left: 135px;
            margin-top: -52px;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        @keyframes show {

            0%,
            49.99% {
                opacity: 0;
                z-index: 1;
            }

            50%,
            100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .overlay {
            background: #2bbcff;
            background: -webkit-linear-gradient(to right, #33a7dd, #2bbcff);
            background: linear-gradient(to right, #2bbcff, #33a7dd);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }


        /* Remember Me*/
        .rememberMe {
            margin: -40px 0px 20px 120px;
        }
    </style>


    <div class="container" id="container">

        <div class="form-container sign-in-container">
            <form action="#" method="post">
                <img src="login.png" alt="user icon" width="100" height="100">
                <h1>Login</h1>


                <label for="login_id"></label>
                <input type="hidden" id="DEFAULT" name="login_id">


                <label for="Username"></label>
                <input type="text" placeholder="Username" id="username" name="username">

                <input type="password" value="" id="myInput" placeholder="Password" name="password"><br />

                <label>
                    <input type="checkbox" onclick="myFunction()">Show Password
                </label>


                <label for="log_in_at"></label>
                <input type="hidden" id="now()" name="log_in_at">

<!-- 
                <a href="#">Forgot your password?</a> -->
                <button input class="btn btn-primary btn-user btn-block" type="submit" name="submit" value="Sign In">Sign In</button>
            </form>
        </div>



        <div class="overlay-container">
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
        </div>
    </div>

    </body>

</html>