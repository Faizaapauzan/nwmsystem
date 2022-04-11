<?php 

include 'dbconnect.php';

//code check customer code
	
	$result = mysqli_query($conn,"SELECT count(*) FROM machine_list WHERE machine_code ='" . $_POST["machine_code"] . "'");
	$row = mysqli_fetch_row($result);
	$machine_code_count = $row[0];
	if($machine_code_count>0) echo "<span style='color:red'> Machine code Already Exist </span>";
	
	

	else

		//insert into database
	
	{
        if (isset($_POST['save_machine'])) {
            $machine_code = $_POST['machine_code'];
            $machine_name = $_POST['machine_name'];
            $machine_type = $_POST['machine_type'];
            $machine_brand = $_POST['machine_brand'];
            $serialnumber = $_POST['serialnumber'];
            $customer_name = $_POST['customer_name'];
            $purchase_date = $_POST['purchase_date'];
            $machine_description = $_POST['machine_description'];
            $machinelistcreated_by = $_POST['machinelistcreated_by'];
		    $machinelistlastmodify_by = $_POST['machinelistlastmodify_by'];
           
    
            $sql = "INSERT INTO machine_list (machine_code, machine_name, machine_type, machine_brand, serialnumber, customer_name, purchase_date, machine_description, machinelistcreated_by, machinelistlastmodify_by )

		VALUES ('$machine_code', '$machine_name', '$machine_type', ' $machine_brand', '$serialnumber', '$customer_name', '$purchase_date', '$machine_description', '$machinelistcreated_by', '$machinelistlastmodify_by')";

            $query=mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if ($query) {
                echo "Data Saved Successfully";
            } else {
                echo "Failed to save data";
            }
        }}

?>