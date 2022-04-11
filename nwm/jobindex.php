<?php
include 'dbconnect.php'; ?>

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
    $customer_phone = $_POST['customer_phone'];
    $customer_address = $_POST['customer_address'];
    $machine_code = $_POST['machine_code'];
    $machine_name = $_POST['machine_name'];
    $machine_type  = $_POST['machine_type'];
    $machine_brand  = $_POST['machine_brand'];
    $accessories_needed  = $_POST['accessories_needed'];
    $jobregistercreated_by  = $_POST['jobregistercreated_by'];
    $jobregisterlastmodify_by  = $_POST['jobregisterlastmodify_by'];
  
  
    //----------------------------------------------------
  
        // insertion to job reg table
        $sql = "INSERT INTO `job_register`(`job_code`,`job_name`,`job_order_number`,`job_description`,`customer_code`,`customer_name`,`customer_grade`,`job_priority`,`requested_date`,`delivery_date`,`customer_PIC`,`customer_phone`,`customer_address`,`machine_code`,`machine_name`,`machine_type`,`machine_brand`,`accessories_needed`,`jobregistercreated_by`,`jobregisterlastmodify_by`) VALUES('$job_code', '$job_name', '$job_order_number', '$job_description', '$customer_code','$customer_name', '$customer_grade', '$job_priority', '$requested_date', '$delivery_date', ' $customer_PIC', '$customer_phone','$customer_address', '$machine_code', '$machine_name', '$machine_type','$machine_brand', '$accessories_needed', '$jobregistercreated_by','$jobregisterlastmodify_by')" ;
        $result = mysqli_query($conn, $sql);

    //-------------------------------------

    $jobregister_id = $_POST['jobregister_id'];
    $accessories_id = $_POST['accessories_id'];
    $accessories_code = $_POST['accessories_code'];
    $accessories_name = $_POST['accessories_name'];
    $accessories_quantity = $_POST['accessories_quantity'];

            // retrieve last id
    $jobregister_id = mysqli_insert_id($conn);


        // insertion to job_accesssories details table
       
    foreach ($accessories_id as $index => $accessories_ids) {


    $s_accessories_id = $accessories_ids;
    $s_accessories_code = $accessories_code[$index];
    $s_accessories_name = $accessories_name[$index];
    $s_accessories_quantity = $accessories_quantity[$index];
      

      $sql = "INSERT INTO `job_accessories`(`jobregister_id`, `accessories_id`, `accessories_code`,`accessories_name`, `accessories_quantity`) VALUES ('$jobregister_id','$s_accessories_id','$s_accessories_code','$s_accessories_name','$s_accessories_quantity')";
        // mysqli_free_result( $result );

    }

    if (mysqli_query($conn, $sql)) {
        header("location: jobregister.php");
    } else {
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }
}

	// Close connection
	mysqli_close($conn);
	?>

    
