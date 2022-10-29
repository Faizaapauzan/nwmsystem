<?php

// Get the user id
$staffregister_id = $_REQUEST['staffregister_id'];

// Database connection
$con = mysqli_connect("localhost", "Ithink", "iThink3399*", "nwmsystem");

if ($staffregister_id !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT username, technician_rank, staff_position FROM staff_register WHERE staffregister_id='$staffregister_id'");

	$row = mysqli_fetch_array($query);

	// Get the first name
    $username = $row["username"];
	$technician_rank = $row["technician_rank"];
    $staff_position = $row["staff_position"];

}

// Store it in a array
$result = array("$username" , "$technician_rank", "$staff_position");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
