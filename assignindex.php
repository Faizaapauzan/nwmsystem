	<?php
	include 'dbconnect.php';
	?> 
	

	<?php

    $response = array('success' => false);

    if (isset($_POST['update_assign'])) {
        $jobregister_id = $_POST['jobregister_id'];
        $technician_rank = $_POST['technician_rank'];
        $staff_position = $_POST['staff_position'];
        $job_assign = $_POST['job_assign'];
        $Job_assistant = $_POST['Job_assistant'];
        $Job_assistant2 = $_POST['Job_assistant2'];
        $Job_assistant3 = $_POST['Job_assistant3'];
        $Job_assistant4 = $_POST['Job_assistant4'];
        $job_status = $_POST['job_status'];
        $jobregisterlastmodify_by  = $_POST['jobregisterlastmodify_by'];

        $sql = "UPDATE job_register SET

            technician_rank ='".addslashes($technician_rank)."',
            staff_position ='".addslashes($staff_position)."',
            job_assign ='".addslashes($job_assign)."',
            Job_assistant ='".addslashes($Job_assistant)."',
            Job_assistant2 ='".addslashes($Job_assistant2)."',
            Job_assistant3 ='".addslashes($Job_assistant3)."',
            Job_assistant4 ='".addslashes($Job_assistant4)."',
            job_status ='".addslashes($job_status)."',
            jobregisterlastmodify_by ='".addslashes($jobregisterlastmodify_by)."'

             WHERE  jobregister_id ='".addslashes($jobregister_id)."' ";
        
      if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);


  
	?>
