<?php

    include 'dbconnect.php';
    
    $jobregister_id = $_POST['jobregister_id'];
    $technician_arrival = $_POST['technician_arrival'];
    $arrival_timestamp = $_POST['arrival_timestamp'];
    
    $stmt = $conn->prepare("UPDATE job_register SET 
                            technician_arrival=?, 
                            arrival_timestamp=?
                            WHERE jobregister_id=?");
    
    $stmt->bind_param("ssi", $technician_arrival, 
                       $arrival_timestamp, $jobregister_id);
    
    $stmt->execute();
    $stmt->close();
    
    $conn->close();

?>
