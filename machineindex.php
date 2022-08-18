<?php 

include 'dbconnect.php';


		if (isset($_POST['submit'])) {
      
        $machine_code = $_POST['machine_code'];
        $machine_name = $_POST['machine_name'];
        $type_id = $_POST['type_id'];
		$serialnumber = $_POST['serialnumber'];
		$customer_name = $_POST['customer_name'];
		$purchase_date = $_POST['purchase_date'];
        $machine_description = $_POST['machine_description'];
		$machinelistcreated_by = $_POST['machinelistcreated_by'];
		$machinelistlastmodify_by = $_POST['machinelistlastmodify_by'];
           
	
	    $sql = "INSERT INTO machine_list (machine_code, machine_name, type_id, serialnumber, customer_name, purchase_date, machine_description, machinelistcreated_by, machinelistlastmodify_by)

	 VALUES ('".addslashes($_POST['machine_code'])."',
        '".addslashes($_POST['machine_name'])."',
        '".addslashes($_POST['type_id'])."',
        '".addslashes($_POST['serialnumber'])."',
        '".addslashes($_POST['customer_name'])."',
        '".addslashes($_POST['purchase_date'])."',
        '".addslashes($_POST['machine_description'])."',
        '".addslashes($_POST['machinelistcreated_by'])."',
		'".addslashes($_POST['machinelistlastmodify_by'])."')";

			if (mysqli_query($conn, $sql)) {
				$customer_code = mysqli_insert_id($conn);
			
				header("location: machine.php");
			}
		}

	
	
?>
