	<?php
	include 'dbconnect.php';
	?> 
	

	<?php

    $response = array('success' => false);

    if (isset($_POST['updateassign'])) {

        $jobregister_id = $_POST['jobregister_id'];
        $assistant = $_POST['assistant'];
        $customer_name = $_POST['customer_name'];
        $machine_name = $_POST['machine_name'];
        $requested_date = $_POST['requested_date'];
       
        foreach ($assistant as $assistantlist)

        {

            $sql = "INSERT INTO assistants (jobregister_id , username, customer_name, machine_name, requested_date) 
                                    VALUES ('$jobregister_id','$assistantlist','$customer_name','$machine_name','$requested_date')";

             if($conn->query($sql))
        {
            $response['success'] = true;
        }
        
        }

        
     
    }

echo json_encode($response);


  
	?>