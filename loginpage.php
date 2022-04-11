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

    if($row["staff_position"]=="Admin")
    {   

        $_SESSION["username"]=$username;
        $_SESSION['staff_position']="Admin";

        header("location:Adminhomepage.php");
    }

    elseif($row["staff_position"]=="Manager")
    {

        $_SESSION["username"]=$username;
        $_SESSION['staff_position']="Manager";
        
        header("location:Adminhomepage.php");
    }

    elseif($row["username"]=="AIZAT")
    {

        $_SESSION["username"]="AIZAT";

        header("location:Aizat.php");
    }

    elseif($row["username"]=="BOON")
    {

        $_SESSION["username"]="BOON";
       
        header("location:Boon.php");
    }

    elseif($row["username"]=="FAIZAN")
    {

        $_SESSION["username"]="FAIZAN";
        
        header("location:faizan.php");
    }

    elseif($row["username"]=="FAUZIN")
    {

        $_SESSION["username"]="FAUZIN";

        header("location:fauzin.php");
    }

    elseif($row["username"]=="HAFIZ")
    {

        $_SESSION["username"]="HAFIZ";

        header("location:hafiz.php");
    }

    elseif($row["username"]=="HAMIR")
    {

        $_SESSION["username"]="HAMIR";

        header("location:hamir.php");
    }

    elseif($row["username"]=="HWA")
    {

        $_SESSION["username"]="HWA";

        header("location:hwa.php");
    }

    elseif($row["username"]=="ISK")
    {

        $_SESSION["username"]="ISK";

        header("location:isk.php");
    }

    elseif($row["username"]=="IZAAN")
    {

        $_SESSION["username"]="IZAAN";

        header("location:izaan.php");
    }

    elseif($row["username"]=="JOHN")
    {

        $_SESSION["username"]="JOHN";

        header("location:john.php");
    }

    elseif($row["username"]=="JUN JIE")
    {

        $_SESSION["username"]="JUN JIE";

        header("location:junjie.php");
    }

    elseif($row["username"]=="WILL")
    {

        $_SESSION["username"]="WILL";

        header("location:razwill.php");
    }

    elseif($row["username"]=="SAHELE")
    {

        $_SESSION["username"]="SAHELE";

        header("location:sahele.php");
    }

    elseif($row["username"]=="SALAM")
    {

        $_SESSION["username"]="SALAM";

        header("location:salam.php");
    }

    elseif($row["username"]=="SAZALY")
    {

        $_SESSION["username"]="SAZALY";

        header("location:sazaly.php");
    }

    elseif($row["username"]=="TECK")
    {

        $_SESSION["username"]="TECK";

        header("location:teck.php");
    }

    // elseif($row["staff_position"]=="technician")
    // {

    //  $_SESSION["username"]=$username;
    //     $_SESSION['staff_position']="technician";
        
    //  header("location:tech.php");
    // }

    elseif($row["staff_position"]=="Storekeeper")
    {

        $_SESSION["username"]=$username;
         $_SESSION['staff_position']="Storekeeper";
        
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
    <meta name=”viewport” content=”width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no”>
	<meta name="description" content="">
	<meta name="author" content="">
    <title>NWM Management System</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="css/layout.css" rel="stylesheet" />
    <link href="css/login.css" rel="stylesheet" />
    <script src="js/password.js" type="text/javascript" defer></script>

    <div class="container" id="container">

        <div class="form-container sign-in-container">
            <form action="#" method="post">
                <img src="image/login.png" alt="user icon" width="100" height="100">
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