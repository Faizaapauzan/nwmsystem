<?php
session_start();
include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['update_acc']))
{
  $jobid = $_POST['jobregister_id'];
  parse_str($_POST['data'], $formData); // Parse serialized form data

  $accessories_id = $formData['accessories_id'];
  $accessories_code = $formData['accessories_code'];
  $accessories_name = $formData['accessories_name'];
  $accessories_uom = $formData['accessories_uom'];
  $accessories_quantity = $formData['accessories_quantity'];

   foreach ($accessories_id as $index => $accessories_ids) {


    $s_accessories_id = $accessories_ids;
    $s_accessories_code = $accessories_code[$index];
    $s_accessories_name = $accessories_name[$index];
    $s_accessories_uom = $accessories_uom[$index];
    $s_accessories_quantity = $accessories_quantity[$index];

    $jobregister_id = mysqli_insert_id($conn);

    //  $query = "INSERT INTO `job_accessories`(`jobregister_id`, `accessories_id`, `accessories_code`,`accessories_name`, `accessories_quantity`) values('$jobregister_id','$s_accessories_id','$s_accessories_code','$s_accessories_name','$s_accessories_quantity', (SELECT jobregister_id FROM job_register WHERE jobregister_id  = '$jobregister_id'))";
    
   $sql = "INSERT INTO `job_accessories`(`jobregister_id`, `accessories_id`, `accessories_code`,`accessories_name`,`accessories_uom`, `accessories_quantity`) VALUES ('$jobid','$s_accessories_id','$s_accessories_code','$s_accessories_name','$s_accessories_uom','$s_accessories_quantity')";
    //  $query = "INSERT INTO `job_accessories`(`accessories_id`, `accessories_code`,`accessories_name`, `accessories_quantity`) VALUES ('$s_accessories_id','$s_accessories_code','$s_accessories_name','$s_accessories_quantity')";
   $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));


    }

  if ($query) {
      $response['success'] = true;
  } else {
      $response['error'] = mysqli_error($conn); // Add error message to response
  }

  echo json_encode($response);

}
  
?>