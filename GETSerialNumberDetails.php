<?php
    
    include "dbconnect.php";
    
    $jobregister_id = $_POST['jobregister_id'];
    
    $sql = "SELECT * FROM job_register WHERE jobregister_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $jobregister_id);
    $stmt->execute();
    $stmt->bind_result($selectedSerialNumber);
    $stmt->fetch();
    $stmt->close();
    
    $conn->close();
    
    echo json_encode(array('selectedSerialNumber' => $selectedSerialNumber));
    
?>

