<?php

    include "dbconnect.php";

    if (isset($_GET['type_id'])) {
        $type_id = mysqli_real_escape_string($conn, $_GET['type_id']);
        
        $query = "SELECT * FROM machine_list WHERE type_id = $type_id";
        
        $result = mysqli_query($conn, $query);
        
        $serialNumber = array();
        
        while ($row = mysqli_fetch_assoc($result)) {
            $serialNumber[] = $row;
        }
        
        mysqli_close($conn);
        
        header('Content-Type: application/json');
        echo json_encode($serialNumber);
    } 
    
    else {
        echo "Type ID not provided.";
    }

?>
