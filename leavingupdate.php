<?php

    include 'dbconnect.php';
    
    $jobregister_id = $_POST['jobregister_id'];
    $technician_leaving = $_POST['technician_leaving'];
    $leaving_timestamp = $_POST['leaving_timestamp'];
    
    $stmt = $conn->prepare("UPDATE job_register SET 
                            technician_leaving=?, 
                            leaving_timestamp=?
                            WHERE jobregister_id=?");
    
    $stmt->bind_param("ssi", $technician_leaving, 
                       $leaving_timestamp, $jobregister_id);
    
    $stmt->execute();
    $stmt->close();
    
    $conn->close();

?>
