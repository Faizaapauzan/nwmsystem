<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['jobregister_id']) && $_POST['jobregister_id']!='' || $_POST['jobregister_id']==''
    &&
   isset($_POST['technician_departure']) && $_POST['technician_departure']!='' || $_POST['technician_departure']=='')

    {
        $sql = "UPDATE job_register SET 
                technician_departure ='".addslashes($_POST['technician_departure'],)."'
                WHERE jobregister_id='".addslashes($_POST['jobregister_id'])."'";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>