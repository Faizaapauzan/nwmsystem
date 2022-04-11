<?php

// Get the user id
$customer_id = $_REQUEST['customer_id'];
// $customer_code = $_REQUEST['customer_code'];

// Database connection
$con = mysqli_connect("localhost", "root", "", "nwmsystem");

if ($customer_id !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT customer_code, customer_name, customer_grade, customer_PIC,
     cust_phone1, cust_phone2, cust_address1, cust_address2, cust_address3 FROM customer_list WHERE customer_id='$customer_id'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$customer_code = $row["customer_code"];
	$customer_name = $row["customer_name"];
	$customer_grade = $row["customer_grade"];
    $customer_PIC = $row["customer_PIC"];
	$cust_phone1 = $row["cust_phone1"];
	$cust_phone2 = $row["cust_phone2"];
    $cust_address1 = $row["cust_address1"];
	$cust_address2 = $row["cust_address2"];
	$cust_address3 = $row["cust_address3"];
}

// Store it in a array
$result = array("$customer_code", "$customer_name", "$customer_grade", "$customer_PIC", "$cust_phone1", "$cust_phone2", "$cust_address1", "$cust_address2", "$cust_address3");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
