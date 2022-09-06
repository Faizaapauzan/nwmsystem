<?php

// Get the user id
$customer_id = $_REQUEST['customer_id'];

// Database connection
$con = mysqli_connect("localhost", "root", "", "nwmsystem");

if ($customer_id !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT customer_name FROM customer_list WHERE customer_id='$customer_id'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$customer_name = $row["customer_name"];
	
}

// Store it in a array
$result = array("$customer_name");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
