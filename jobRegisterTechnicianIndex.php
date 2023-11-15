<?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "dbconnect.php";

        $job_assign = $_POST["job_assign"];
        $jobregistercreated_by = $_POST["jobregistercreated_by"];
        $jobregisterlastmodify_by = $_POST["jobregisterlastmodify_by"];
        $technician_rank = $_POST["technician_rank"];
        $staff_position = $_POST["staff_position"];
        $job_priority = $_POST["job_priority"];
        $today_date = $_POST["today_date"];
        $requested_date = $_POST["requested_date"];
        $accessories_required = $_POST["accessories_required"];
        $customer_name = $_POST["customer_name"];
        $customer_grade = $_POST["customer_grade"];
        $customer_code = $_POST["customer_code"];
        $customer_PIC = $_POST["customer_PIC"];
        $cust_address1 = $_POST["cust_address1"];
        $cust_address2 = $_POST["cust_address2"];
        $cust_address3 = $_POST["cust_address3"];
        $cust_phone1 = $_POST["cust_phone1"];
        $cust_phone2 = $_POST["cust_phone2"];
        $job_order_number = $_POST["job_order_number"];
        $job_name = $_POST["job_name"];
        $job_code = $_POST["job_code"];
        $job_description = $_POST["job_description"];
        $machine_brand = $_POST["machine_brand"];
        $machine_type = $_POST["machine_type"];
        $machine_name = $_POST["machine_name"];
        $machine_code = $_POST["machine_code"];
        $serialnumber = $_POST["serialnumber"];

        $brand_id = empty($_POST["brand_id"]) ? NULL : $_POST["brand_id"];
        $type_id = empty($_POST["type_id"]) ? NULL : $_POST["type_id"];
        $machine_id = empty($_POST["machine_id"]) ? NULL : $_POST["machine_id"];

        $sql = "INSERT INTO job_register (job_assign, jobregistercreated_by, jobregisterlastmodify_by, 
                                          technician_rank, staff_position, job_priority, today_date, 
                                          requested_date, accessories_required, customer_name, customer_grade, 
                                          customer_code, customer_PIC, cust_address1, cust_address2, cust_address3, 
                                          cust_phone1, cust_phone2, job_order_number, job_name, job_code, 
                                          job_description, machine_brand, brand_id, machine_type, type_id, 
                                          machine_name, machine_id, machine_code, serialnumber) 
            
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssssssssss", 
                                        $job_assign, $jobregistercreated_by, $jobregisterlastmodify_by, 
                                        $technician_rank, $staff_position, $job_priority, $today_date, 
                                        $requested_date, $accessories_required, $customer_name, $customer_grade, 
                                        $customer_code, $customer_PIC, $cust_address1, $cust_address2, $cust_address3, 
                                        $cust_phone1, $cust_phone2, $job_order_number, $job_name, $job_code, 
                                        $job_description, $machine_brand, $brand_id, $machine_type, $type_id, 
                                        $machine_name, $machine_id, $machine_code, $serialnumber);
         
                                   
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
            
                header("Location: technician.php");
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
