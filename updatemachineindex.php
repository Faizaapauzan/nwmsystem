<?php 

include 'dbconnect.php';


		if (isset($_POST['update'])) {

        $machine_id = $_POST['machine_id'];
        $type_id = $_POST['type_id'];
        $machine_type = $_POST['machine_type'];
        $brand_id = $_POST['brand_id'];
        $machine_brand = $_POST['machine_brand'];
        $machine_code = $_POST['machine_code'];
		$machine_name = $_POST['machine_name'];
		$serialnumber = $_POST['serialnumber'];
		$customer_name  = $_POST['customer_name'];
		$purchase_date = $_POST['purchase_date'];
		$machine_description  = $_POST['machine_description'];
		$machinelistlastmodify_by = $_POST['machinelistlastmodify_by'];
	
           
	 $query = "UPDATE machine_list SET
            type_id ='".addslashes($type_id)."',
            machine_type ='".addslashes($machine_type)."',
            brand_id ='".addslashes($brand_id)."',
            machine_brand ='".addslashes($machine_brand)."',
            machine_code ='".addslashes($machine_code)."',
            machine_name ='".addslashes($machine_name)."',
            serialnumber ='".addslashes($serialnumber)."',
            customer_name ='".addslashes($customer_name)."',
            purchase_date ='".addslashes($purchase_date)."',
            machine_description ='".addslashes($machine_description)."',
            machinelistlastmodify_by ='".addslashes($machinelistlastmodify_by)."'

             WHERE  machine_id ='".addslashes($machine_id)."' ";

			 $query_run = mysqli_query($conn, $query);
     
if ($query_run) {
                            echo '<script> alert("Data Updated"); </script>';
                            header("location:machine.php");
                        } else {
                            echo '<script> alert("Data Not Updated"); </script>';
                        }
                    }
                    ?>
