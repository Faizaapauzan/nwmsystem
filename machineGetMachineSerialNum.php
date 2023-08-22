<?php
    
    include "dbconnect.php";
    
    if (isset($_POST['type_id'])) {
        $selecteTypeId = $_POST['type_id'];
        
        $query = "SELECT * FROM machine_list WHERE type_id = '$selecteTypeId'";
        $result = $conn->query($query);
        
        $machineTypes = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $machineTypes[] = array(
                'machine_ID' => $row['machine_id'],
                'machine_serialNumber' => $row['serialnumber']
            );
        }
        
        echo json_encode($machineTypes);
    }
    
    $conn->close();

?>
