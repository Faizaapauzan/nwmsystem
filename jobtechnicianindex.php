<?php
include 'dbconnect.php';

if (isset($_POST['submit'])) {
	$job_assign = $_POST['job_assign'];
    $job_code = $_POST['job_code'];
    $job_name = $_POST['job_name'];
    $job_order_number = $_POST['job_order_number'];
    $job_description = $_POST['job_description'];
    $customer_code  = $_POST['customer_code'];
    $customer_name  = $_POST['customer_name'];
    $customer_grade = $_POST['customer_grade'];
    $requested_date = $_POST['requested_date'];
    $customer_PIC = $_POST['customer_PIC'];
    $cust_phone1 = $_POST['cust_phone1'];
    $cust_phone2 = $_POST['cust_phone2'];
    $cust_address1 = $_POST['cust_address1'];
    $cust_address2 = $_POST['cust_address2'];
    $cust_address3 = $_POST['cust_address3'];
    $machine_id = (isset($_POST['machine_id']) && !empty($_POST['machine_id'])) ? $_POST['machine_id'] : null;
    $machine_code = $_POST['machine_code'];
    $machine_name = $_POST['machine_name'];
    $machine_brand = $_POST['machine_brand'];
    $brand_id = $_POST['brand_id'];
    $machine_type = $_POST['machine_type'];
    $type_id = (isset($_POST['type_id']) && !empty($_POST['type_id'])) ? $_POST['type_id'] : null;
    $serialnumber = $_POST['serialnumber'];
    $accessories_required = $_POST['accessories_required'];
    $jobregistercreated_by = $_POST['jobregistercreated_by'];
    $jobregisterlastmodify_by = $_POST['jobregisterlastmodify_by'];

    $stmt = $conn->prepare("INSERT INTO job_register 
                            (job_assign, job_code, job_name, job_order_number, job_description, 
                             customer_code, customer_name, customer_grade, requested_date, customer_PIC, 
                             cust_phone1, cust_phone2, cust_address1, cust_address2, cust_address3, 
                             machine_id, machine_code, machine_name, machine_brand, 
                             brand_id, machine_type, type_id, serialnumber, accessories_required, 
                             jobregistercreated_by, jobregisterlastmodify_by) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
	$stmt->bind_param("ssssssssssssssssssssssssss", $job_assign, $job_code, $job_name, $job_order_number, $job_description,
	$customer_code, $customer_name, $customer_grade, $requested_date, $customer_PIC,
	$cust_phone1, $cust_phone2, $cust_address1, $cust_address2, $cust_address3,
	$machine_id, $machine_code, $machine_name, $machine_brand,
	$brand_id, $machine_type, $type_id, $serialnumber, $accessories_required, $jobregistercreated_by, $jobregisterlastmodify_by);

	if(!$stmt->execute()) {
		echo "Error: " . $stmt->error;
	} 
	
	else {
		header("location: technician.php");
	}
	
	$stmt->close();
	$conn->close();
	
	}
	?>
	