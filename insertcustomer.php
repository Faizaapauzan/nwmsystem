<?php

include 'dbconnect.php';

if(isset($_POST['save_cust']))
{
$customer_code=mysqli_real_escape_string($conn,$_POST['customer_code']);
$customer_name=$_POST['customer_name'];
$cust_address1=$_POST['cust_address1'];
$cust_address2=$_POST['cust_address2'];
$cust_address3=$_POST['cust_address3'];
$customer_grade=$_POST['customer_grade'];
$customer_PIC=$_POST['customer_PIC'];
$cust_phone1=$_POST['cust_phone1'];
$cust_phone2=$_POST['cust_phone2'];
$customercreated_by  = $_POST['customercreated_by'];
$customerlasmodify_by = $_POST['customerlasmodify_by'];


$sql="INSERT INTO `customer_list`(`customer_code`, `customer_name`, `cust_address1`, `cust_address2`, `cust_address3`, `customer_grade`, `customer_PIC`, `cust_phone1`, `cust_phone2`, `customercreated_by`, `customerlasmodify_by`) VALUES ('$customer_code','$customer_name','$cust_address1', '$cust_address2', '$cust_address3', '$customer_grade','$customer_PIC', '$cust_phone1', '$cust_phone2', '$customercreated_by', '$customerlasmodify_by')";
$query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
if($query)
{
	echo "Data Saved Successfully";
	
} else {
	echo "Failed to save data";
}
}

?>