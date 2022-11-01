	<?php
	include 'dbconnect.php';
	?> 
	

	<?php

    $response = array('success' => false);

    if (isset($_POST['technicianassign'])) {
        $jobregister_id = $_POST['jobregister_id'];
        $job_assign = $_POST['job_assign'];
        $technician_rank = $_POST['technician_rank'];
        $staff_position = $_POST['staff_position'];
        $DateAssign = $_POST['DateAssign'];
        $jobregisterlastmodify_by  = $_POST['jobregisterlastmodify_by'];

      $sql = "UPDATE job_register SET 
      technician_rank='".addslashes($technician_rank)."',
      staff_position='".addslashes($staff_position)."',
      job_assign='".addslashes($job_assign)."',
      DateAssign='".addslashes($DateAssign)."',
      jobregisterlastmodify_by='".addslashes($jobregisterlastmodify_by)."'
      
      WHERE jobregister_id='".addslashes($jobregister_id)."'";
        
      if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);


  
	?>