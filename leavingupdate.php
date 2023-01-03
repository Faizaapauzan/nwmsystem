<?php

    include 'dbconnect.php';
    
    $jobregister_id = $_POST['jobregister_id'];
    $leaving_timestamp = $_POST['leaving_timestamp'];
    
    $stmt = $conn->prepare("UPDATE job_register SET leaving_timestamp=? WHERE jobregister_id=?");
    
    $stmt->bind_param("si", $leaving_timestamp, $jobregister_id);
    
    $stmt->execute();
    $stmt->close();
    
    $conn->close();

?>
