<?php
    
    include "dbconnect.php";
    
    if (isset($_POST['brand_id'])) {
        $selectedBrandId = $_POST['brand_id'];
        
        $query = "SELECT * FROM machine_type WHERE brand_id = '$selectedBrandId'";
        $result = $conn->query($query);
        
        $machineTypes = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $machineTypes[] = array(
                'machine_type_id' => $row['type_id'],
                'machine_type_name' => $row['type_name']
            );
        }
        
        echo json_encode($machineTypes);
    }
    
    $conn->close();

?>
