<?php
    
    include 'dbconnect.php';
    
    if (isset($_POST['brand_id'])) {
        $brand_id = $_POST['brand_id'];
        $query = "SELECT * FROM machine_type WHERE brand_id = '$brand_id'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            echo "<option value=''>Select Machine Type</option>";
            
            while ($row = mysqli_fetch_assoc($result)) {
                $type_id = $row['type_id'];
                $type_name = $row['type_name'];
                
                $query_machine_list = "SELECT * FROM machine_list WHERE type_id = '$type_id'";
                $result_machine_list = mysqli_query($conn, $query_machine_list);
                $machine_name = 'N/A';
                
                if (mysqli_num_rows($result_machine_list) > 0) {
                    $machine_list_row = mysqli_fetch_assoc($result_machine_list);
                    $machine_name = $machine_list_row['machine_name'];
                    $machine_id = $machine_list_row['machine_id'];
                    $machine_code = $machine_list_row['machine_code'];
                }
                
                echo "<option value='" . $type_name . "' 
                              data-typeID='" . $type_id . "' 
                              data-machNamez='" . $machine_name . "'
                              data-machIDz='" . $machine_id . "'
                              data-machCodez='" . $machine_code . "'>" . $type_name . "</option>";
            }
        }
        
        else {
            echo "<option value=''>No Machine Types Available</option>";
        }
    }

?>
