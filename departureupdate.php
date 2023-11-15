<?php
    
    include 'dbconnect.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jobregister_id = $_POST["jobregister_id"];
        $DateAssign = $_POST["DateAssign"];
        $job_status = $_POST["job_status"];
        $departure_timestamp = $_POST["departure_timestamp"];
        
        $sql = "UPDATE job_register SET 
                       DateAssign = ?, 
                       job_status = ?, 
                       departure_timestamp = ? 
                WHERE jobregister_id = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssi", $DateAssign, $job_status, $departure_timestamp, $jobregister_id);
            
            if ($stmt->execute()) {
                echo "success";
            } 
            
            else {
                echo "error";
            }
            
            $stmt->close();
        } 
        
        else {
            echo "error";
        }
    }

?>
