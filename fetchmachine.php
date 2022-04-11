<?php

// Get the user id
$machine_id = $_REQUEST['machine_id'];
// $machine_code = $_REQUEST['machine_code'];

// Database connection
$con = mysqli_connect("localhost", "root", "", "nwmsystem");

if ($machine_id !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT machine_code, machine_name, machine_type, machine_brand, serialnumber,  machine_description FROM machine_list WHERE machine_id='$machine_id'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$machine_code = $row["machine_code"];
	$machine_name = $row["machine_name"];
	$machine_type = $row["machine_type"];
    $machine_brand = $row["machine_brand"];
	$serialnumber = $row["serialnumber"];
	$machine_description = $row["machine_description"];

}

// Store it in a array
$result = array("$machine_code", "$machine_name", "$machine_type", "$machine_brand", "$serialnumber", "$machine_description");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
