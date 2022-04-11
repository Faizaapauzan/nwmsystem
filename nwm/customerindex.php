<?php 

include 'dbconnect.php';

//code check customer code
	
	$result = mysqli_query($conn,"SELECT count(*) FROM customer_list WHERE customer_code='" . $_POST["customer_code"] . "'");
	$row = mysqli_fetch_row($result);
	$customer_code_count = $row[0];
	if($customer_code_count>0) echo "<span style='color:red'> Customer Code Already Exist </span>";
	

	else

		//insert into database
	
	{
		 
		if (isset($_POST['submit'])) {
        $customer_id  = $_POST['customer_id'];
        $customer_code = $_POST['customer_code'];
        $customer_name = $_POST['customer_name'];
        $customer_grade = $_POST['customer_grade'];
        $customer_PIC   = $_POST['customer_PIC'];
        $cust_phone1 = $_POST['cust_phone1'];
		$cust_phone2 = $_POST['cust_phone2'];
        $cust_address1 = $_POST['cust_address1'];
		$cust_address2 = $_POST['cust_address2'];
		$cust_address3 = $_POST['cust_address3'];
		$customercreated_by  = $_POST['customercreated_by'];
        $customerlasmodify_by = $_POST['customerlasmodify_by'];
            
 $sql = "INSERT INTO customer_list (customer_code, customer_name, customer_grade, customer_PIC,
     cust_phone1, cust_phone2, cust_address1, cust_address2, cust_address3, customercreated_by, customerlasmodify_by)


					
VALUES ('$customer_code', '$customer_name', '$customer_grade', ' $customer_PIC', '$cust_phone1', '$cust_phone2', '$cust_address1', '$cust_address2', '$cust_address3', '$customercreated_by', '$customerlasmodify_by')";


			if (mysqli_query($conn, $sql)) {
				$customer_id = mysqli_insert_id($conn);
			
				header("location: customer.php");
			}
		}

	}
	
?>
