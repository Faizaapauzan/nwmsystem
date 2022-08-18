<?php 

include 'dbconnect.php';

 if (isset($_POST['save_machine'])) {
            $type_id = $_POST['type_id'];
            $serialnumber = $_POST['serialnumber'];
            $machine_code = $_POST['machine_code'];
            $machine_name = $_POST['machine_name'];            
            $customer_name = $_POST['customer_name'];
            $purchase_date = $_POST['purchase_date'];
            $machine_description = $_POST['machine_description'];
            $machinelistcreated_by = $_POST['machinelistcreated_by'];
		    $machinelistlastmodify_by = $_POST['machinelistlastmodify_by'];
           
    
            $sql = "INSERT INTO machine_list (type_id, serialnumber, machine_code, machine_name, customer_name, purchase_date, machine_description, machinelistcreated_by, machinelistlastmodify_by )

		 VALUES ('".addslashes($_POST['type_id'])."',
        '".addslashes($_POST['serialnumber'])."',
         '".addslashes($_POST['machine_code'])."',
        '".addslashes($_POST['machine_name'])."',
        '".addslashes($_POST['customer_name'])."',
        '".addslashes($_POST['purchase_date'])."',
        '".addslashes($_POST['machine_description'])."',
        '".addslashes($_POST['machinelistcreated_by'])."',
		'".addslashes($_POST['machinelistlastmodify_by'])."')";


            $query=mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if ($query) {
                echo "Data Saved Successfully";
            } else {
                echo "Failed to save data";
            }
        }

?>