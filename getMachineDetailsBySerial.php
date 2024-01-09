<?php
    
    include "dbconnect.php";
    
    if (isset($_POST['serial_number'])) {
        $serialNumber = $_POST['serial_number'];
        
        $query = "SELECT * FROM machine_list WHERE serialnumber = ?";
        
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("s", $serialNumber);
            $stmt->execute();
        
            $result = $stmt->get_result();
            
            if ($row = $result->fetch_assoc()) {
                echo json_encode($row);
            }
            
            else {
                echo json_encode(array('error' => 'No details found for the provided serial number'));
            }
            
            $stmt->close();
        }
        
        else {
            echo json_encode(array('error' => 'SQL preparation error'));
        }
    }
    
    else {
        echo json_encode(array('error' => 'Serial number not provided'));
    }
    
    $conn->close();
    
?>
