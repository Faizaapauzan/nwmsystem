<?php 

include 'dbconnect.php';


	{
		if (isset($_POST['submit'])) {
      
        $machine_code = $_POST['machine_code'];
        $machine_name = $_POST['machine_name'];
        $machine_type = $_POST['machine_type'];
        $machine_brand   = $_POST['machine_brand'];
		$serialnumber = $_POST['serialnumber'];
		$customer_name = $_POST['customer_name'];
		$purchase_date = $_POST['purchase_date'];
        $machine_description = $_POST['machine_description'];
		$machinelistcreated_by = $_POST['machinelistcreated_by'];
		$machinelistlastmodify_by = $_POST['machinelistlastmodify_by'];
           
	
	    $sql = "INSERT INTO machine_list (machine_code, machine_name, machine_type, machine_brand, serialnumber, customer_name, purchase_date, machine_description, machinelistcreated_by, machinelistlastmodify_by)

		VALUES ('$machine_code', '$machine_name', '$machine_type', ' $machine_brand','$serialnumber', '$customer_name', '$purchase_date','$machine_description', '$machinelistcreated_by', '$machinelistlastmodify_by')";

			if (mysqli_query($conn, $sql)) {
				$customer_code = mysqli_insert_id($conn);
			
				header("location: machine.php");
			}
		}

	}
	
?>
