
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
     $accessories_required = $_POST["accessories_required"];
     $job_cancel = $_POST["job_cancel"];
     $job_status = $_POST["job_status"];
     $reason = $_POST["reason"];
     $jobregisterlastmodify_by = $_POST["jobregisterlastmodify_by"];

     $machine_id = !empty($machine_id) ? "'$machine_id'" : "NULL";

     $sql ="UPDATE job_register SET
                job_name ='".addslashes($job_name)."',
                job_order_number ='".addslashes($job_order_number)."',
                job_description ='".addslashes($job_description)."',
                DateAssign ='".addslashes($DateAssign)."',
                requested_date ='".addslashes($requested_date)."',
                delivery_date ='".addslashes($delivery_date)."',
                customer_name ='".addslashes($customer_name)."',
                customer_grade ='".addslashes($customer_grade)."',
                customer_code ='".addslashes($customer_code)."',
                job_priority ='".addslashes($job_priority)."',
                requested_date ='".addslashes($requested_date)."',
                delivery_date ='".addslashes($delivery_date)."',
                customer_PIC ='".addslashes($customer_PIC)."',
                cust_phone1 ='".addslashes($cust_phone1)."',
                cust_phone2 ='".addslashes($cust_phone2)."',
                cust_address1 ='".addslashes($cust_address1)."',
                cust_address2 ='".addslashes($cust_address2)."',
                cust_address3 ='".addslashes($cust_address3)."',
                machine_id =$machine_id,
                machine_code ='".addslashes($machine_code)."',
                machine_name ='".addslashes($machine_name)."',
                machine_brand ='".addslashes($machine_brand)."',
                machine_type ='".addslashes($machine_type)."',
                serialnumber ='".addslashes($serialnumber)."',
                accessories_required ='".addslashes($accessories_required)."',
                job_cancel ='".addslashes($job_cancel)."',
                job_status ='".addslashes($job_status)."',
                reason ='".addslashes($reason)."',
                jobregisterlastmodify_by ='".addslashes($jobregisterlastmodify_by)."'
            
            WHERE  jobregister_id ='".addslashes($jobregister_id)."' ";

     if (mysqli_query($conn, $sql)) {
         header("Location:" . $_SERVER["HTTP_REFERER"]);
     } else {
         echo "ERROR: Hush! Sorry $sql. " . mysqli_error($conn);
     }

     // Close connection
     mysqli_close($conn);
 }

?>
