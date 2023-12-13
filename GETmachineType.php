<?php
    
    include "dbconnect.php";
    
    if (isset($_POST['brand_id'])) {
        $value = $_POST['brand_id'];
        
        $query = "SELECT * FROM machine_type WHERE brand_id = '$value'";
        $result = mysqli_query($conn, $query);
        
        $typeData = array();
        
        while ($row = mysqli_fetch_assoc($result)) {
            $typeData[] = $row;
        }
        
        echo json_encode($typeData);
    }
    
    mysqli_close($conn);
    
?>
