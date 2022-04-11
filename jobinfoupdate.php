<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'nwmsystem');

    if(isset($_POST['update_job']))
    {   
        $jobregister_id = $_POST['jobregister_id'];
        $job_priority = $_POST['job_priority'];
        $job_order_number = $_POST['job_order_number'];
        $job_name = $_POST['job_name'];
        $job_description  = $_POST['job_description'];
        $requested_date = $_POST['requested_date'];
        $delivery_date = $_POST['delivery_date'];
        $customer_name = $_POST['customer_name'];
        $customer_grade = $_POST['customer_grade'];
        $customer_address  = $_POST['customer_address'];
        $customer_PIC = $_POST['customer_PIC'];
        $customer_phone = $_POST['customer_phone'];
        $machine_name = $_POST['machine_name'];
        $machine_type = $_POST['machine_type'];
        $machine_brand = $_POST['machine_brand'];
        $job_assign = $_POST['job_assign'];

 $sql = "UPDATE job_register SET
                        
job_priority='$job_priority',
job_order_number='$job_order_number',
job_name='$job_name',
job_description='$job_description',
requested_date='$requested_date',
delivery_date='$delivery_date',
customer_name='$customer_name',
customer_grade='$customer_grade',
customer_address='$customer_address',
customer_PIC='$customer_PIC',
customer_phone='$customer_phone',
machine_name='$machine_name',
machine_type='$machine_type',
machine_brand='$machine_brand',
job_assign ='$job_assign'

WHERE jobregister_id='$jobregister_id'";

       $query=mysqli_query($connection,$sql) or die(mysqli_error($connection));
if($query)
{
	echo "Data Saved Successfully";
	
} else {
	echo "Failed to save data";
}
    }
?>