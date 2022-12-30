<?php

// Connect to the database
include 'dbconnect.php';

// Initialize variables to store the form data
$tech_in = $jobregister_id = "";

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Sanitize the form data to prevent SQL injection
  $tech_in = $conn->real_escape_string($_POST['tech_in']);
  $jobregister_id = $conn->real_escape_string($_POST['jobregister_id']);

  // Construct the UPDATE query
  $query = "UPDATE job_register SET tech_in='$tech_in' WHERE jobregister_id='$jobregister_id'";

  // Execute the query
  if ($conn->query($query) === TRUE) {
    // Return a successful response if the query was successful
    echo json_encode(array("status" => "success"));
  } else {
    // Return an error if the query failed
    echo json_encode(array("status" => "error", "message" => $conn->error));
  }
}

// Close the connection
$conn->close();

?>
