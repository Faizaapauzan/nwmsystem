<?php
    
    header('Content-Type: text/plain');
    
    include 'dbconnect.php';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $technician_leaving = $_POST['technician_leaving'];
        $jobRegisterID = isset($_POST['jobregister_id']) ? $_POST['jobregister_id'] : null;
        
        if ($jobRegisterID) {
            
            $sql = "UPDATE job_register SET technician_leaving = ? WHERE jobregister_id = ?";
                    
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("si", $technician_leaving, $jobRegisterID);
                
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
