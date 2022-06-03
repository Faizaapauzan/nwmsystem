	<?php
	include 'dbconnect.php';
	?> 
	

	<?php

    if (isset($_POST['update'])) {
        $jobregister_id = $_POST['jobregister_id'];
        $technician_rank = $_POST['technician_rank'];
        $staff_position = $_POST['staff_position'];
        $job_priority = $_POST['job_priority'];
        $job_order_number = $_POST['job_order_number'];
        $job_name = $_POST['job_name'];
        $job_description = $_POST['job_description'];
        $requested_date = $_POST['requested_date'];
        $delivery_date = $_POST['delivery_date'];
        $customer_name = $_POST['customer_name'];
        $customer_grade = $_POST['customer_grade'];
        $cust_address1 = $_POST['cust_address1'];
        $cust_address2 = $_POST['cust_address2'];
        $cust_address3 = $_POST['cust_address3'];
        $customer_PIC = $_POST['customer_PIC'];
        $cust_phone1 = $_POST['cust_phone1'];
        $cust_phone2 = $_POST['cust_phone2'];
        $machine_name = $_POST['machine_name'];
        $machine_type = $_POST['machine_type'];
        $machine_brand = $_POST['machine_brand'];
        $accessories_required = $_POST['accessories_required'];
        $job_assign = $_POST['job_assign'];
        $Job_assistant = $_POST['Job_assistant'];
        $job_cancel = $_POST['job_cancel'];
        $job_status = $_POST['job_status'];
        $jobregisterlastmodify_by  = $_POST['jobregisterlastmodify_by'];

        $sql = "UPDATE job_register SET

            job_priority ='".addslashes($job_priority)."',
            technician_rank ='".addslashes($technician_rank)."',
            staff_position ='".addslashes($staff_position)."',
            job_order_number ='".addslashes($job_order_number)."',
            job_name ='".addslashes($job_name)."',
            job_description ='".addslashes($job_description)."',
            requested_date ='".addslashes($requested_date)."',
            delivery_date ='".addslashes($delivery_date)."',
            customer_name ='".addslashes($customer_name)."',
            customer_grade ='".addslashes($customer_grade)."',
            cust_address1 ='".addslashes($cust_address1)."',
            cust_address2 ='".addslashes($cust_address2)."',
            cust_address3 ='".addslashes($cust_address3)."',
            customer_PIC ='".addslashes($customer_PIC)."',
            cust_phone1 ='".addslashes($cust_phone1)."',
            cust_phone2 ='".addslashes($cust_phone2)."',
            machine_name ='".addslashes($machine_name)."',
            machine_type ='".addslashes($machine_type)."',
            machine_brand ='".addslashes($machine_brand)."',
            accessories_required ='".addslashes($accessories_required)."',
            job_assign ='".addslashes($job_assign)."',
            Job_assistant ='".addslashes($Job_assistant)."',
            job_cancel ='".addslashes($job_cancel)."',
            job_status ='".addslashes($job_status)."',
            jobregisterlastmodify_by ='".addslashes($jobregisterlastmodify_by)."'

             WHERE  jobregister_id ='".addslashes($jobregister_id)."' ";
        
        if (mysqli_query($conn, $sql)) {
            header("location: Adminhomepage.php");
        } else {
            echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
    }

  
	?>
