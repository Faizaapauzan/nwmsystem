<?php
    
    include 'dbconnect.php';
    
    if (isset($_POST['serialnumber'])) {
        $serialnumber = $_POST['serialnumber'];
        
        $query = "SELECT * FROM machine_list WHERE serialnumber = '$serialnumber'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            
            $data = array(
                'machine_name' => $row['machine_name'],
                'machine_id' => $row['machine_id'],
                'machine_code' => $row['machine_code'],
                'brand_id' => $row['brand_id'],
                'machine_brand' => $row['machine_brand'],
                'machine_type' => $row['machine_type'],
                'type_id' => $row['type_id']
            );
            
            echo json_encode($data);
        }
        
        else {
            echo json_encode(['status' => 404, 'message' => 'Machine details not found']);
        }
    }
    
?>
