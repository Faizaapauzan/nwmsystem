	<?php
	include 'dbconnect.php';
	?> 
	

	<?php

    $response = array('success' => false);

    if (isset($_GET['jobstatus'])){
        $query =  mysqli_query($conn, "SELECT * FROM staff_register WHERE staff_position ='Leader'");
        while ($data = mysqli_fetch_array($query)) {
            if ($_GET['value'] == $data['username']){
                $jobregister_id = $_GET['jobregister_id'];
                $technician_rank = $data['technician_rank'];
                $staff_position = $data['staff_position'];
                $job_assign = $_GET['value'];
                $jobregisterlastmodify_by  = $_GET['lastmodify_by'];

                $sql = "UPDATE job_register SET technician_rank='$technician_rank', staff_position='$staff_position', job_assign='$job_assign', jobregisterlastmodify_by='$jobregisterlastmodify_by' WHERE jobregister_id='$jobregister_id'";

                if($conn->query($sql))
                {
                    $response['success'] = true;
                    break;
                }
            }
        }
        
    }

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