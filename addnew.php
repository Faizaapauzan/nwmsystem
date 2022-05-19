<?php
//insert.php

	include('dbconnect.php');

	
if(isset($_POST["job_order_number"]))
{

	$job_order_number = mysqli_real_escape_string($conn, $_POST['job_order_number']);
	$jobregistercreated_by = mysqli_real_escape_string($conn, $_POST['jobregistercreated_by']);

	mysqli_query($conn,"update into  `job_register` (job_order_number, jobregistercreated_by) values ('$job_order_number', '$jobregistercreated_by')");
}


?>