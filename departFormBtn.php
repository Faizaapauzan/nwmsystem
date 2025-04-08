<?php
    
    header('Content-Type: text/plain');
    
    include 'dbconnect.php';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $technician_departure = $_POST['technician_departure'];
        $departure_timestamp = $_POST['departure_timestamp'];
        $DateAssign = $_POST['DateAssign'];
        $job_status = $_POST['job_status'];
        $jobRegisterID = isset($_POST['jobregister_id']) ? $_POST['jobregister_id'] : null;
        
        if ($jobRegisterID) {
            
            $sql = "UPDATE job_register SET 
                           technician_departure = ?, 
                           departure_timestamp = ?, 
                           DateAssign = ?, 
                           job_status = ?
                    WHERE jobregister_id = ?";
                    
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("ssssi", $technician_departure, $departure_timestamp, $DateAssign, $job_status, $jobRegisterID);
                
                if ($stmt->execute()) {
                    echo "success";
                }
                
                else {
                    echo "failed: " . $stmt->error;
                }
                
                $stmt->close();
            }
            
            else {
                echo "failed: " . $conn->error;
            }
        }
        
        else {
            echo "failed: Invalid jobRegisterID.";
        }
    }
    
    else {
        echo "failed: Invalid request method.";
    }
    
    $conn->close();
    
?>
