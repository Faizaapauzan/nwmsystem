<?php
session_start();
$con = mysqli_connect("localhost","root","","nwmsystem");

if(isset($_POST['update_remark']))
{
    $jobregister_id = $_POST['jobregister_id'];
    $remark_desc = $_POST['remark_desc'];
    $remark_solution = $_POST['remark_solution'];

   foreach ($remark_desc as $index => $remark_descs) {

    $s_remark_desc = $remark_descs;
    $s_remark_solution = $remark_solution[$index];
     

    $sql = "INSERT INTO `technician_remark`(`jobregister_id`, `remark_desc`,`remark_solution`) VALUES ('$jobregister_id','$s_remark_desc','$s_remark_solution')";
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