<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['jobregister_id']) && $_POST['jobregister_id']!='' || $_POST['jobregister_id']==''
    &&
   isset($_POST['technician_arrival']) && $_POST['technician_arrival']!='' || $_POST['technician_arrival']==''
    &&
   isset($_POST['arrival_timestamp']) && $_POST['arrival_timestamp']!='' || $_POST['arrival_timestamp']=='')

    {
        $sql = "UPDATE job_register SET 
                technician_arrival ='".addslashes($_POST['technician_arrival'])."',
                arrival_timestamp ='".addslashes($_POST['arrival_timestamp'])."'
                WHERE jobregister_id='".addslashes($_POST['jobregister_id'])."'";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>