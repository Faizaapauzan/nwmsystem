<?php

// Connect to the database
include 'dbconnect.php';

// Initialize variables to store the form data
$technician_in = $tech_leader = $techupdate_date = "";

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Sanitize the form data to prevent SQL injection
  $technician_in = $conn->real_escape_string($_POST['technician_in']);
  $tech_leader = $conn->real_escape_string($_POST['tech_leader']);
  $techupdate_date = $conn->real_escape_string($_POST['techupdate_date']);

  // Construct the UPDATE query
  $query = "UPDATE tech_update SET technician_in='$technician_in' WHERE tech_leader='$tech_leader' AND techupdate_date='$techupdate_date'";

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
