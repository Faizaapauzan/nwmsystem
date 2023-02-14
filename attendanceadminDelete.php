<?php
    
    include 'dbconnect.php';
    
    // Get the techupdate_id from the query string and sanitize it
    $techupdate_id = filter_input(INPUT_GET, 'techupdate_id', FILTER_VALIDATE_INT);
    
    // Make sure the techupdate_id is valid
    if ($techupdate_id === false) {
        http_response_code(400);
        echo json_encode(["message" => "Invalid techupdate_id."]);
        exit;
    }
    
    // Delete the row with the specified techupdate_id
    $query = "DELETE FROM tech_update WHERE techupdate_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $techupdate_id);
    $query_run = mysqli_stmt_execute($stmt);
    
    // Confirm deletion with message and status code
    if ($query_run) {
        http_response_code(200);
        echo json_encode(["message" => "Record deleted successfully."]);
    } 
    
    else {
        http_response_code(500);
        echo json_encode(["message" => "Error deleting record: " . mysqli_stmt_error($stmt)]);
    }
    
    mysqli_stmt_close($stmt);
?>