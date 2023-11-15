<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		include "dbconnect.php";

        $today_date = $_POST['today_date'];
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
		$machine_brand = $_POST['machine_brand'];
		$machine_type = $_POST['machine_type'];
		$serialnumber  = $_POST['serialnumber'];
		$accessories_required  = $_POST['accessories_required'];
		$accessories_for  = $_POST['accessories_for'];
		$jobregistercreated_by  = $_POST['jobregistercreated_by'];
		$jobregisterlastmodify_by  = $_POST['jobregisterlastmodify_by'];

        $staff_position = NULL;
		
		if ($accessories_required == "Yes") {
			$staff_position = "Storekeeper";
		}

        $brand_id = empty($_POST["brand_id"]) ? NULL : $_POST["brand_id"];
        $type_id = empty($_POST["type_id"]) ? NULL : $_POST["type_id"];
        $machine_id = empty($_POST["machine_id"]) ? NULL : $_POST["machine_id"];

        $sql = "INSERT INTO job_register (today_date, job_code, job_name, job_order_number, job_description, 
                                          customer_code, customer_name, customer_grade, job_priority, requested_date, 
                                          delivery_date, customer_PIC, cust_phone1, cust_phone2, cust_address1, 
                                          cust_address2, cust_address3, machine_code, machine_name, machine_brand, 
                                          machine_type, serialnumber, accessories_required, accessories_for, jobregistercreated_by, 
                                          jobregisterlastmodify_by, staff_position, brand_id, type_id, machine_id) 
            
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssssssssss", 
                                        $today_date, $job_code, $job_name, $job_order_number, $job_description, 
                                        $customer_code, $customer_name, $customer_grade, $job_priority, $requested_date, 
                                        $delivery_date, $customer_PIC, $cust_phone1, $cust_phone2, $cust_address1, 
                                        $cust_address2, $cust_address3, $machine_code, $machine_name, $machine_brand, 
                                        $machine_type, $serialnumber, $accessories_required, $accessories_for, $jobregistercreated_by, 
                                        $jobregisterlastmodify_by, $staff_position, $brand_id, $type_id, $machine_id);
         
                                   
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
            
                header("Location: Adminhomepage.php");
                exit(); 
            } 
        
            else {
                echo "Error: Form submission failed. Please try again later.";
                error_log("Database error: " . mysqli_error($conn));
            }
        
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        } 
        
        else {
            echo "Error: Database statement preparation failed.";
            error_log("Database statement preparation error: " . mysqli_error($conn));
        }
    }
?>
