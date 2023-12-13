<?php

    include "dbconnect.php";
    
    if(isset($_POST['customer_name'])) {
        $customerName = $_POST['customer_name'];
    
        $query = "SELECT * FROM customer_list WHERE customer_name = ?";
    
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $customerName);
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            echo json_encode($row);
        }
        
        else {
            echo json_encode(array()); 
        }

        $stmt->close();
    }

    $conn->close();
    
?>
