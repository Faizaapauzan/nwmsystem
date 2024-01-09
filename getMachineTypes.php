<?php
include "dbconnect.php"; 

// Check if brand_id is provided
if (isset($_POST['brand_id'])) {
    $brandId = $_POST['brand_id'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT type_id as id, type_name as name FROM machine_types WHERE brand_id = ?");
    $stmt->bind_param("s", $brandId); // "s" specifies the variable type => 'string'
    $stmt->execute();
    $result = $stmt->get_result();

    $types = array();
    while ($row = $result->fetch_assoc()) {
        $types[] = $row;
    }

    echo json_encode($types);

    $stmt->close();
} else {
    // Return an empty array if brand_id is not set
    echo json_encode(array());
}

$conn->close();
?>
