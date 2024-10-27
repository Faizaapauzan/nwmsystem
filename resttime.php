<?php
    
    include "dbconnect.php";
    
    $sql = "SELECT NOW() AS server_time";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $server_time = $row['server_time'];
        
        $tech_out = date('g:i A', strtotime($server_time));

        $tech_in = date('g:i A', strtotime($server_time));
        
        $techupdate_date = date('d-m-Y', strtotime($server_time));
        
        echo json_encode([
            'tech_out' => $tech_out,
            'tech_in' => $tech_in,
            'techupdate_date' => $techupdate_date
        ]);
    }
    
    else {
        echo json_encode(['error' => 'Error fetching server time.']);
    }
    
    $conn->close();

?>
