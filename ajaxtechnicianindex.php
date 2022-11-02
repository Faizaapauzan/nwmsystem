	<?php
	include 'dbconnect.php';
	?> 
	

	<?php

        $response = array('success' => false);

    if (isset($_POST['updatetechnician'])) {
        $jobregister_id = $_POST['jobregister_id'];
		$machine_id = $_POST['machine_id'];
		$machine_code = $_POST['machine_code'];
		$machine_name = $_POST['machine_name'];		
		$serialnumber  = $_POST['serialnumber'];
        $jobregisterlastmodify_by  = $_POST['jobregisterlastmodify_by'];

        {
	
			$machine_id = !empty($machine_id) ? "'$machine_id'" : "NULL";
		}

        $sql = "UPDATE job_register SET

           
            machine_id = $machine_id,
            machine_code ='".addslashes($machine_code)."', 
            machine_name ='".addslashes($machine_name)."',
            
            serialnumber ='".addslashes($serialnumber)."',
            
            jobregisterlastmodify_by ='".addslashes($jobregisterlastmodify_by)."'

             WHERE jobregister_id ='".addslashes($jobregister_id)."' ";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

  
	?>
