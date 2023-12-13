<?php
    
    include "dbconnect.php";

if (isset($_POST['serialnumber'])) {
    $serialnumber = $_POST['serialnumber'];

    $query = "SELECT * FROM machine_list WHERE serialnumber = '$serialnumber'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Serial number not found']);
    }
} else {
    echo json_encode(['error' => 'Serial number not provided']);
}
    
?>
