	<?php
	include 'dbconnect.php';
	?> 
	

	<?php

    $response = array('success' => false);

    if (isset($_POST['technicianassign'])) {
        $jobregister_id = $_POST['jobregister_id'];
        $technician_rank = $_POST['technician_rank'];
        $staff_position = $_POST['staff_position'];
        $job_assign = $_POST['job_assign'];
        $jobregisterlastmodify_by  = $_POST['jobregisterlastmodify_by'];

      $sql = "UPDATE job_register SET technician_rank='$technician_rank', staff_position='$staff_position', job_assign='$job_assign', jobregisterlastmodify_by='$jobregisterlastmodify_by' WHERE jobregister_id='$jobregister_id'";
        
      if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);


  
	?>