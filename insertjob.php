<?php

include 'dbconnect.php';

if(isset($_POST['save_job']))
{
$job_code=mysqli_real_escape_string($conn,$_POST['job_code']);
$job_name=$_POST['job_name'];
$job_description=$_POST['job_description'];
$jobtypecreated_by = $_POST['jobtypecreated_by'];
$jobtypelastmodify_by = $_POST['jobtypelastmodify_by'];

$sql="INSERT INTO `jobtype_list`(`job_code`, `job_name`, `job_description`, `jobtypecreated_by`, `jobtypelastmodify_by`) VALUES ('$job_code','$job_name','$job_description','$jobtypecreated_by','$jobtypelastmodify_by')";
$query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
if($query)
{
	echo "Data Saved Successfully";
	
} else {
	echo "Failed to save data";
}
}

?>