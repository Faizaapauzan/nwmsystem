
<?php
    
    include "dbconnect.php";
    
    if (isset($_POST["update"])) {
     $jobregister_id = $_POST["jobregister_id"];
     $job_name = $_POST["job_name"];
     $job_order_number = $_POST["job_order_number"];
     $job_description = $_POST["job_description"];
     $DateAssign = $_POST["DateAssign"];
     $customer_name = $_POST["customer_name"];
     $customer_grade = $_POST["customer_grade"];
     $customer_code = $_POST["customer_code"];
     $job_priority = $_POST["job_priority"];
     $requested_date = $_POST["requested_date"];
     $delivery_date = $_POST["delivery_date"];
     $customer_PIC = $_POST["customer_PIC"];
     $cust_phone1 = $_POST["cust_phone1"];
     $cust_phone2 = $_POST["cust_phone2"];
     $cust_address1 = $_POST["cust_address1"];
     $cust_address2 = $_POST["cust_address2"];
     $cust_address3 = $_POST["cust_address3"];
     $machine_id = $_POST["machine_id"];
     $machine_code = $_POST["machine_code"];
     $machine_name = $_POST["machine_name"];
     $machine_brand = $_POST["machine_brand"];
     $machine_type = $_POST["machine_type"];
     $serialnumber = $_POST["serialnumber"];
     $brand_id = $_POST["brand_id"];
     $type_id = $_POST["type_id"];
     $accessories_required = $_POST["accessories_required"];
     $job_cancel = $_POST["job_cancel"];
     $job_status = $_POST["job_status"];
     $reason = $_POST["reason"];
     $jobregisterlastmodify_by = $_POST["jobregisterlastmodify_by"];

     $machine_id = !empty($machine_id) ? $machine_id : "NULL";

     $sql = "UPDATE job_register SET
            job_name = ?,
            job_order_number = ?,
            job_description = ?,
            DateAssign = ?,
            requested_date = ?,
            delivery_date = ?,
            customer_name = ?,
            customer_grade = ?,
            customer_code = ?,
            job_priority = ?,
            requested_date = ?,
            delivery_date = ?,
            customer_PIC = ?,
            cust_phone1 = ?,
            cust_phone2 = ?,
            cust_address1 = ?,
            cust_address2 = ?,
            cust_address3 = ?,
            machine_id = ?,
            machine_code = ?,
            machine_name = ?,
            machine_brand = ?,
            machine_type = ?,
            brand_id = ?,
            type_id = ?,
            serialnumber = ?,
            accessories_required = ?,
            job_cancel = ?,
            job_status = ?,
            reason = ?,
            jobregisterlastmodify_by = ?
        WHERE jobregister_id = ?";

    // Prepare and bind parameters
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssssssssssss", 
    $job_name,
    $job_order_number,
    $job_description,
    $DateAssign,
    $requested_date,
    $delivery_date,
    $customer_name,
    $customer_grade,
    $customer_code,
    $job_priority,
    $requested_date,
    $delivery_date,
    $customer_PIC,
    $cust_phone1,
    $cust_phone2,
    $cust_address1,
    $cust_address2,
    $cust_address3,
    $machine_id,
    $machine_code,
    $machine_name,
    $machine_brand,
    $machine_type,
    $brand_id,
    $type_id,
    $serialnumber,
    $accessories_required,
    $job_cancel,
    $job_status,
    $reason,
    $jobregisterlastmodify_by,
    $jobregister_id
    );

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {
    echo "ERROR: Hush! Sorry. " . mysqli_error($conn);
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($conn);
 }

?>
