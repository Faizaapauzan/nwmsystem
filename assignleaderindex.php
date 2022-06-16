	<?php
	include 'dbconnect.php';
	?> 
	

	<?php

    $response = array('success' => false);

    if (isset($_POST['updateassign'])) {
        $jobregister_id = $_POST['jobregister_id'];
        $technician_rank = $_POST['technician_rank'];
        $staff_position = $_POST['staff_position'];
        $job_assign = $_POST['job_assign'];
        $Job_assistant = $_POST['Job_assistant'];
        $Job_assistant2 = $_POST['Job_assistant2'];
        $Job_assistant3 = $_POST['Job_assistant3'];
        $Job_assistant4 = $_POST['Job_assistant4'];
       
        $jobregisterlastmodify_by  = $_POST['jobregisterlastmodify_by'];

      $sql = "UPDATE job_register SET 
                    technician_rank ='".addslashes($_POST['technician_rank'])."',
                    staff_position ='".addslashes($_POST['staff_position'])."',
                    job_assign ='".addslashes($_POST['job_assign'])."',
                    Job_assistant ='".addslashes($_POST['Job_assistant'])."',
                    Job_assistant2 ='".addslashes($_POST['Job_assistant2'])."',
                    Job_assistant3 ='".addslashes($_POST['Job_assistant3'])."',
                    Job_assistant4 ='".addslashes($_POST['Job_assistant4'])."',
                  
                    jobregisterlastmodify_by ='".addslashes($_POST['jobregisterlastmodify_by'])."' 

                 WHERE jobregister_id='".addslashes($_POST['jobregister_id'])."'";
        
      if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);


  
	?>