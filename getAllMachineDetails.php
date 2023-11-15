<?php
    
    include "dbconnect.php";
    
    if (isset($_POST['customer_name'])) {
        $customerName = $_POST['customer_name'];
        
        $query = "SELECT * FROM machine_list WHERE customer_name = '$customerName'";
        $result = mysqli_query($conn, $query);
        
        $machineData = array();
        
        while ($row = mysqli_fetch_assoc($result)) {
            $machineData[] = $row;
        }
        
        echo json_encode($machineData);
    }
    
    mysqli_close($conn);
    
?>
