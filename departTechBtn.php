<?php
    
    include "dbconnect.php";
    
    $sql = "SELECT NOW() AS server_time";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $server_time = $row['server_time'];
        
        $technician_departure = date('n/j/Y g:i A', strtotime($server_time));
        $technician_arrival = date('n/j/Y g:i A', strtotime($server_time));
        $technician_leaving = date('n/j/Y g:i A', strtotime($server_time));
        $DateAssign = date('d-m-Y', strtotime($server_time));
        $departure_timestamp = date('H:i:s', strtotime($server_time));
        
        echo json_encode([
            'technician_departure' => $technician_departure,
            'technician_arrival' => $technician_arrival,
            'technician_leaving' => $technician_leaving,
            'DateAssign' => $DateAssign,
            'departure_timestamp' => $departure_timestamp
        ]);
    }
    
    else {
        echo json_encode(['error' => 'Error fetching server time.']);
    }
    
    $conn->close();
    
?>
