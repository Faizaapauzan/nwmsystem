<?php
    
    include "dbconnect.php"; 
    
    $machineType = $_POST['machine_type'];
    
    $response = array('machine_name' => '');
    
    $result1 = mysqli_query($conn, "SELECT * FROM machine_list WHERE machine_type = '$machineType'");
    
    if ($row = mysqli_fetch_assoc($result1)) {
        $response['machine_name'] = $row['machine_name'];
    }
    
    echo json_encode($response);

?>
