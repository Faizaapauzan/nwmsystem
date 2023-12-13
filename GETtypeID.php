<?php
    
    include "dbconnect.php";

if (isset($_POST['machine_type'])) {
    $machineType = $_POST['machine_type'];

    $query = "SELECT * FROM machine_type WHERE type_name = '$machineType'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Machine type not found']);
    }
} else {
    echo json_encode(['error' => 'Machine type not provided']);
}
    
?>

