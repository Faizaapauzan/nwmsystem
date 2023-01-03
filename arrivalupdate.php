<?php

    include 'dbconnect.php';
    
    $jobregister_id = $_POST['jobregister_id'];
    $arrival_timestamp = $_POST['arrival_timestamp'];
    
    $stmt = $conn->prepare("UPDATE job_register SET arrival_timestamp=? WHERE jobregister_id=?");
    
    $stmt->bind_param("si", $arrival_timestamp, $jobregister_id);
    
    $stmt->execute();
    $stmt->close();
    
    $conn->close();

?>
