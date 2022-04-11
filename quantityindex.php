<?php
session_start();
$con = mysqli_connect("localhost","root","","nwmsystem");

if(isset($_POST['save']))
{
    $jobregister_id = $_POST['jobregister_id'];
    $accessories_id = $_POST['accessories_id'];
    $accessories_code = $_POST['accessories_code'];
    $accessories_name = $_POST['accessories_name'];
    $accessories_quantity = $_POST['accessories_quantity'];

   foreach ($accessories_id as $index => $accessories_ids) {


    $s_accessories_id = $accessories_ids;
    $s_accessories_code = $accessories_code[$index];
    $s_accessories_name = $accessories_name[$index];
    $s_accessories_quantity = $accessories_quantity[$index];
      

    $query = "INSERT INTO `job_accessories`(`jobregister_id`, `accessories_id`, `accessories_code`,`accessories_name`, `accessories_quantity`) VALUES ('$jobregister_id','$s_accessories_id','$s_accessories_code','$s_accessories_name','$s_accessories_quantity')";
    $query_run = mysqli_query($con, $query);

    }

    if($query_run)
    {
        header("location: accessoriesregister.php");
    }
    else
    {
     echo "ERROR: Hush! Sorry $query. "
            . mysqli_error($con);
    }
}
?>