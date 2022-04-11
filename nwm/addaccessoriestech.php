<?php
session_start();
$con = mysqli_connect("localhost","root","","nwmsystem");


  if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql = "SELECT jobregister_id FROM `job_accessories` WHERE  jobregister_id ='$jobregister_id'";
  }

if(isset($_POST['update_techacc']))
{
    $jobid = $_POST['jobregister_id'];
    $accessories_id = $_POST['accessories_id'];
    $accessories_code = $_POST['accessories_code'];
    $accessories_name = $_POST['accessories_name'];
    $accessories_quantity = $_POST['accessories_quantity'];

   foreach ($accessories_id as $index => $accessories_ids) {


    $s_accessories_id = $accessories_ids;
    $s_accessories_code = $accessories_code[$index];
    $s_accessories_name = $accessories_name[$index];
    $s_accessories_quantity = $accessories_quantity[$index];

    $jobregister_id = mysqli_insert_id($con);

    //  $query = "INSERT INTO `job_accessories`(`jobregister_id`, `accessories_id`, `accessories_code`,`accessories_name`, `accessories_quantity`) values('$jobregister_id','$s_accessories_id','$s_accessories_code','$s_accessories_name','$s_accessories_quantity', (SELECT jobregister_id FROM job_register WHERE jobregister_id  = '$jobregister_id'))";
    
    $sql = "INSERT INTO `job_accessories`(`jobregister_id`, `accessories_id`, `accessories_code`,`accessories_name`, `accessories_quantity`) VALUES ('$jobid','$s_accessories_id','$s_accessories_code','$s_accessories_name','$s_accessories_quantity')";
    //  $query = "INSERT INTO `job_accessories`(`accessories_id`, `accessories_code`,`accessories_name`, `accessories_quantity`) VALUES ('$s_accessories_id','$s_accessories_code','$s_accessories_name','$s_accessories_quantity')";
    $query=mysqli_query($con,$sql) or die(mysqli_error($con));


    }

    if($query)
{
	echo "Data Saved Successfully";
	
} else {
	echo "Failed to save data";
}
}

  
?>