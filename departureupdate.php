<?php

    include 'dbconnect.php';
    
    $jobregister_id = $_POST['jobregister_id'];
    $technician_departure = $_POST['technician_departure'];
    $departure_timestamp = $_POST['departure_timestamp'];
    $DateAssign = $_POST['DateAssign'];
    $job_status = $_POST['job_status'];
    
    $stmt = $conn->prepare("UPDATE job_register SET 
                            technician_departure=?, 
                            departure_timestamp=?, 
                            DateAssign=?, 
                            job_status=? 
                            WHERE jobregister_id=?");
    
    $stmt->bind_param("ssssi", $technician_departure, 
                       $departure_timestamp, $DateAssign, 
                       $job_status, $jobregister_id);
    
    $stmt->execute();
    $stmt->close();
    
    $conn->close();

?>
