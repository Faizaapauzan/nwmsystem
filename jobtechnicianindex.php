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
		$delivery_date  = $_POST['delivery_date'];
		$customer_PIC = $_POST['customer_PIC'];
		$cust_phone1 = $_POST['cust_phone1'];
		$cust_phone2 = $_POST['cust_phone2'];
		$cust_address1 = $_POST['cust_address1'];
		$cust_address2 = $_POST['cust_address2'];
		$cust_address3 = $_POST['cust_address3'];
		$machine_id = $_POST['machine_id'];
		$machine_code = $_POST['machine_code'];
		$machine_name = $_POST['machine_name'];
		$machine_brand = $_POST['machine_brand'];
		$brand_id = $_POST['brand_id'];
		$machine_type = $_POST['machine_type'];
		$type_id = $_POST['type_id'];
		$serialnumber  = $_POST['serialnumber'];
		$accessories_required  = $_POST['accessories_required'];
		$jobregistercreated_by  = $_POST['jobregistercreated_by'];
		$jobregisterlastmodify_by  = $_POST['jobregisterlastmodify_by'];

		{

			$machine_id = !empty($machine_id) ? "'$machine_id'" : "NULL";
		}
           
	$sql = "INSERT INTO job_register (job_assign, job_code, job_name, job_order_number, job_description, customer_code,
     customer_name, customer_grade, requested_date, delivery_date, customer_PIC,
	 cust_phone1, cust_phone2, cust_address1, cust_address2, cust_address3, machine_id, machine_code, machine_name, machine_brand, brand_id, machine_type, type_id, serialnumber, accessories_required, jobregistercreated_by, jobregisterlastmodify_by)

VALUES ('".addslashes($_POST['job_assign'])."',
        '".addslashes($_POST['job_code'])."',
    	'".addslashes($_POST['job_name'])."',
        '".addslashes($_POST['job_order_number'])."',
        '".addslashes($_POST['job_description'])."',
		'".addslashes($_POST['customer_code'])."',
        '".addslashes($_POST['customer_name'])."',
        '".addslashes($_POST['customer_grade'])."',
		'".addslashes($_POST['requested_date'])."',
		'".addslashes($_POST['delivery_date'])."',
		 '".addslashes($_POST['customer_PIC'])."',
        '".addslashes($_POST['cust_phone1'])."',
        '".addslashes($_POST['cust_phone2'])."',
        '".addslashes($_POST['cust_address1'])."',
        '".addslashes($_POST['cust_address2'])."',
        '".addslashes($_POST['cust_address3'])."', $machine_id,
        '".addslashes($_POST['machine_code'])."',
        '".addslashes($_POST['machine_name'])."',
		'".addslashes($_POST['machine_brand'])."',
		'".addslashes($_POST['brand_id'])."',
		'".addslashes($_POST['machine_type'])."',
		'".addslashes($_POST['type_id'])."',
        '".addslashes($_POST['serialnumber'])."',
        '".addslashes($_POST['accessories_required'])."',
        '".addslashes($_POST['jobregistercreated_by'])."',
        '".addslashes($_POST['jobregisterlastmodify_by'])."')";

			if (mysqli_query($conn, $sql)) {
	
		header("location: technician.php");
	} else {
		echo "ERROR: Hush! Sorry $sql. "
			. mysqli_error($conn);
	}

		}

	
	
?>
