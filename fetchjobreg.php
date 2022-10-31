<?php

// Get the user id
$job_order_number = $_REQUEST['job_order_number'];

// Database connection
include 'dbconnect.php';

if ($job_order_number !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($conn, "SELECT job_description, jobregister_id FROM job_register WHERE job_order_number='$job_order_number'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	
	$job_description = $row["job_description"];
    $jobregister_id = $row["jobregister_id"];

	
}

// Store it in a array

$result = array( "$job_description", "$jobregister_id");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
