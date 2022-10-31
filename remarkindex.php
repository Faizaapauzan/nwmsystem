<?php
session_start();
include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['update_remark']))
{
    $jobregister_id = $_POST['jobregister_id'];
    $remark_desc = $_POST['remark_desc'];
    $remark_solution = $_POST['remark_solution'];

   foreach ($remark_desc as $index => $remark_descs) {

    $s_remark_desc = $remark_descs;
    $s_remark_solution = $remark_solution[$index];
     

    $sql = "INSERT INTO `technician_remark`(`jobregister_id`, `remark_desc`,`remark_solution`) VALUES 
    
     
    ('".addslashes($jobregister_id)."',
    '".addslashes($s_remark_desc)."',
     '".addslashes($s_remark_solution)."')";



    $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));

    }

    if($query)
{
	 $response['success'] = true;
	
} 

echo json_encode($response);

}
?>