<?php
    
    include "dbconnect.php";
    
    $serialnumber = $_GET['serialnumber'];
    
    $result = mysqli_query($conn, "SELECT * FROM machine_list WHERE serialnumber='$serialnumber'");
    
    $data = mysqli_fetch_assoc($result);
    
    echo json_encode($data);
    
?>
