<?php
    
    include "dbconnect.php";
    
    if (isset($_POST['brand_id'])) {
        $brandId = $_POST['brand_id'];
        
        $stmt = $conn->prepare("SELECT * FROM machine_type WHERE brand_id = ?");
        $stmt->bind_param("i", $brandId);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $types = array();
        
        while ($row = $result->fetch_assoc()) {
            array_push($types, $row);
        }
        
        echo json_encode($types);
        
        $stmt->close();
        $conn->close();
    }
    
    else {
        echo json_encode(array("error" => "No brand ID provided"));
    }

?>
