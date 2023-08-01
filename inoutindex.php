<?php 

include 'dbconnect.php';

if(isset($_POST['submit'])) {
    $accessoriesname = mysqli_real_escape_string($conn, $_POST['accessoriesname']);
    $techname = mysqli_real_escape_string($conn, $_POST['techname']);
    $out_date = mysqli_real_escape_string($conn, $_POST['out_date']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    
    $query = "INSERT INTO accessories_inout (accessoriesname, techname,out_date,quantity) 
                VALUES ('$accessoriesname','$techname','$out_date','$quantity')";
    
    if (mysqli_query($conn, $query)) {
        header( "Location: AccessoryInOut.php" ) ;;
    }
}
?>