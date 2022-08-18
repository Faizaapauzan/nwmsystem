<?php

// Get the user id
$brand_id = $_REQUEST['brand_id'];
// $machine_code = $_REQUEST['machine_code'];

// Database connection
$con = mysqli_connect("localhost", "root", "", "nwmsystem");

if ($brand_id !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT brand_id, brandname FROM machine_brand WHERE brand_id='$brand_id'");

	$row = mysqli_fetch_array($query);

	// Get the first name
    $brand_id = $row["brand_id"];
	$brandname = $row["brandname"];
	

}

// Store it in a array
$result = array("$brand_id" , "$brandname");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
