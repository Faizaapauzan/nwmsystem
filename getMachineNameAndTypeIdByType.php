<?php
    
    include 'dbconnect.php';
    
    if (isset($_POST['machine_type'])) {
        $machine_type = $_POST['machine_type'];
        
        $query = "SELECT * FROM machine_list WHERE machine_type = '$machine_type'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            
            $data = array(
                'machine_name' => $row['machine_name'],
                'type_id' => $row['type_id']
            );
            
            echo json_encode($data);
        }
        
        else {
            echo json_encode(['error' => 'No machine details found for this machine type.']);
        }
    }
    
    else {
        echo json_encode(['error' => 'Machine type not provided.']);
    }
    
?>
