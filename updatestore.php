<?php
session_start();
include 'dbconnect.php';

if(isset($_POST['update_store']))
{
    $jobregister_id = $_POST['jobregister_id'];
    $accessories_id = $_POST['accessories_id'];
    $accessories_status = $_POST['accessories_status'];

foreach($_POST['accessories_status'] as $accessories_id => $accessories_status) {
   $sql = "UPDATE job_accessories SET accessories_status ='$accessories_status' WHERE jobregister_id='$jobregister_id' AND accessories_id='$accessories_id' ";
   

    $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));

    }

    if($query)
{
	echo "Data Saved Successfully";
	
} else {
	echo "Failed to save data";
}
}
?>