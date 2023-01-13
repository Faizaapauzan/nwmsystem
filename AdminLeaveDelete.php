<?php
include 'dbconnect.php';

// Get the techOFF_id from the query string and sanitize it
$techOFF_id = filter_input(INPUT_GET, 'techOFF_id', FILTER_VALIDATE_INT);

// Make sure the techOFF_id is valid
if ($techOFF_id === false) {
    http_response_code(400);
    echo json_encode(["message" => "Invalid techOFF_id."]);
    exit;
}

// Delete the row with the specified techOFF_id
$query = "DELETE FROM tech_off WHERE techOFF_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $techOFF_id);
$query_run = mysqli_stmt_execute($stmt);

// Confirm deletion with message and status code
if ($query_run) {
    http_response_code(200);
    echo json_encode(["message" => "Record deleted successfully."]);
} else {
    http_response_code(500);
    echo json_encode(["message" => "Error deleting record: " . mysqli_stmt_error($stmt)]);
}
mysqli_stmt_close($stmt);
