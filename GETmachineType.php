<?php
    
    include "dbconnect.php";
    
    if (isset($_GET['brand_id'])) {
        $brand_id = mysqli_real_escape_string($conn, $_GET['brand_id']);
        
        $query = "SELECT * FROM machine_type WHERE brand_id = $brand_id";
        
        $result = mysqli_query($conn, $query);
        
        $machineTypes = array();
        
        while ($row = mysqli_fetch_assoc($result)) {
            $machineTypes[] = $row;
        }
        
        mysqli_close($conn);
        
        header('Content-Type: application/json');
        echo json_encode($machineTypes);
    } 
    
    else {
        echo "Brand ID not provided.";
    }
?>
