<?php

// Get the user id
$job_code = $_REQUEST['job_code'];

// Database connection
$con = mysqli_connect("localhost", "root", "", "nwmsystem");

if ($job_code !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT job_name, job_description FROM jobtype_list WHERE job_code='$job_code'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$job_name = $row["job_name"];
	$job_description = $row["job_description"];

}

// Store it in a array
$result = array("$job_name", "$job_description");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
