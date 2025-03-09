<?php

    include "dbconnect.php";
    
    if (isset($_POST['customer_name'])) {
        $customerName = $_POST['customer_name'];

        $query = $conn->prepare("SELECT * FROM machine_list WHERE customer_name = ?");
        $query->bind_param("s", $customerName);
        $query->execute();
        $result = $query->get_result();
        
        $machineData = array();
        
        while ($row = $result->fetch_assoc()) {
            $machineData[] = $row;
        }
        
        echo json_encode($machineData);
    }
    
    $conn->close();
    
?>