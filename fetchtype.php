<?php

// Get the user id
$type_id = $_REQUEST['type_id'];
// $machine_code = $_REQUEST['machine_code'];

// Database connection
$con = mysqli_connect("localhost", "root", "", "nwmsystem");

if ($type_id !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT type_id, type_name FROM machine_type WHERE type_id='$type_id'");

	$row = mysqli_fetch_array($query);

	// Get the first name
    $type_id = $row["type_id"];
	$type_name = $row["type_name"];
	

}

// Store it in a array
$result = array("$type_id","$type_name");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
