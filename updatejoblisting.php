<?php
session_start();
$con = mysqli_connect("localhost","root","","nwmsystem");

if(isset($_POST['update_job']))
{
    $jobregister_id = $_POST['jobregister_id'];
    $job_assign = $_POST['job_assign'];

foreach($_POST['job_assign'] as $jobregister_id => $job_assign) {
   $sql = "UPDATE job_register SET job_assign ='$job_assign' WHERE jobregister_id='$jobregister_id'";
   

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