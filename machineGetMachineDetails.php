<?php
    
    include "dbconnect.php";
    
    if(isset($_POST['serialnumber'])) {
        $selectedSerialNumber = $_POST['serialnumber'];
$query = "SELECT * FROM machine_list WHERE serialnumber = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $selectedSerialNumber);

        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $machineDetails = array('machine_name' => $row['machine_name'],
                                    'machine_code' => $row['machine_code'],
                                    'machine_id' => $row['machine_id']);
                                    
            echo json_encode($machineDetails);
        } 
        
        else {
            echo json_encode(array('error' => 'Machine details not found.'));
        }
    } 
    
    else {
        echo json_encode(array('error' => 'Invalid request.'));
    }
?>
