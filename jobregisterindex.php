<!DOCTYPE html>
<html>

<head>
</head>

<body>

	<?php
	include 'dbconnect.php';
	?> 
	

	<?php



	if (isset($_POST['submit'])) {
	
		$job_code = $_POST['job_code'];
		$job_name = $_POST['job_name'];
		$job_order_number = $_POST['job_order_number'];
		$job_description = $_POST['job_description'];
		$customer_code  = $_POST['customer_code'];
		$customer_name  = $_POST['customer_name'];
		$customer_grade = $_POST['customer_grade'];
		$job_priority  = $_POST['job_priority'];
		$requested_date = $_POST['requested_date'];
		$delivery_date  = $_POST['delivery_date'];
		$customer_PIC = $_POST['customer_PIC'];
		$cust_phone1 = $_POST['cust_phone1'];
		$cust_phone2 = $_POST['cust_phone2'];
		$cust_address1 = $_POST['cust_address1'];
		$cust_address2 = $_POST['cust_address2'];
		$cust_address3 = $_POST['cust_address3'];
		$machine_code = $_POST['machine_code'];
		$machine_name = $_POST['machine_name'];
		$machine_type  = $_POST['machine_type'];
		$machine_brand  = $_POST['machine_brand'];
		$serialnumber  = $_POST['serialnumber'];
		$accessories_required  = $_POST['accessories_required'];
		$jobregistercreated_by  = $_POST['jobregistercreated_by'];
		$jobregisterlastmodify_by  = $_POST['jobregisterlastmodify_by'];
		
		
	}
	$data = $_POST;

	if (
		
		empty($data['job_code']) ||
		empty($data['machine_code'])
	   )

	{

		die('Please fill all required fields!');
	}

	// Performing insert query execution
	// here our table name is college

	$sql = "INSERT INTO job_register (jobregister_id, job_code, job_name, job_order_number, job_description, customer_code,
     customer_name, customer_grade, job_priority, requested_date, delivery_date, customer_PIC,
	 cust_phone1, cust_phone2, cust_address1, cust_address2, cust_address3, machine_code, machine_name,
     machine_type, machine_brand, serialnumber, accessories_required, jobregistercreated_by, jobregisterlastmodify_by)

    VALUES ('default', '$job_code', '$job_name', '$job_order_number', '$job_description', '$customer_code',
     '$customer_name', '$customer_grade', '$job_priority', '$requested_date', '$delivery_date', ' $customer_PIC', '$cust_phone1', '$cust_phone2',
     '$cust_address1', '$cust_address2', '$cust_address3', '$machine_code', '$machine_name', '$machine_type','$machine_brand', '$serialnumber' , '$accessories_required', '$jobregistercreated_by', '$jobregisterlastmodify_by' )";


	if (mysqli_query($conn, $sql)) {
	
		header("location: Adminhomepage.php");
	} else {
		echo "ERROR: Hush! Sorry $sql. "
			. mysqli_error($conn);
	}

	// Close connection
	mysqli_close($conn);
	?>


</body>

</html>