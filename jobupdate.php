<?php

    include 'dbconnect.php';

    $response = array('success' => false);

    if (isset($_POST['update_time'])) {
        $jobregister_id = $_POST['jobregister_id'];
        $technician_departure = $_POST['technician_departure'];
        $technician_arrival = $_POST['technician_arrival'];
        $technician_leaving = $_POST['technician_leaving'];
        $tech_out = $_POST['tech_out'];
        $tech_in  = $_POST['tech_in'];

      $sql = "UPDATE job_register SET 
                     technician_departure='".addslashes($technician_departure)."', 
                     technician_arrival='".addslashes($technician_arrival)."', 
                     technician_leaving='".addslashes($technician_leaving)."', 
                     tech_out='".addslashes($tech_out)."', 
                     tech_in='".addslashes($tech_in)."' 
              WHERE jobregister_id='$jobregister_id'";
        
      if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

    echo json_encode($response);

?>