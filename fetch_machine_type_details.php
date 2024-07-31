<?php
    
    include "dbconnect.php";
    
    $machine_type = $_GET['machine_type'];
    
    $result = mysqli_query($conn, "SELECT * FROM machine_list WHERE machine_type='$machine_type'");
    
    $data = mysqli_fetch_assoc($result);
    
    echo json_encode($data);

?>
