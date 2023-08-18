<?php

// Get the user id
$serialnumber = $_REQUEST['serialnumber'];
// $machine_code = $_REQUEST['machine_code'];

// Database connection
include 'dbconnect.php';

if ($serialnumber !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($conn, "SELECT * FROM machine_list WHERE serialnumber='$serialnumber'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$machine_id = $row["machine_id"];
	$serialnumber = $row["serialnumber"];
	$machine_code = $row["machine_code"];
	$machine_name = $row["machine_name"];
	$machine_description = $row["machine_description"];
	$customer_name = $row["customer_name"];
}

// Store it in a array
$result = array("$machine_id", "$serialnumber", "$machine_code", "$machine_name", "$machine_description" , "$customer_name");

// Send in JSON encoded form
$myJSON = json_encode($result);

echo $myJSON;
?>
