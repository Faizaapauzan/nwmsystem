<?php
    
    include "dbconnect.php";
    
    $sql = "SELECT CURRENT_TIME() AS server_time";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $server_time = $row['server_time'];
        
        $formatted_time = date('n/j/Y g:i A', strtotime($server_time));
        
        echo $formatted_time;
    } else {
        echo "Error fetching server time.";
    }
    
    $conn->close();
?>
