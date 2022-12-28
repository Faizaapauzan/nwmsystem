<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['jobregister_id']) && $_POST['jobregister_id']!='' || $_POST['jobregister_id']==''
    &&
   isset($_POST['technician_leaving']) && $_POST['technician_leaving']!='' || $_POST['technician_leaving']==''
    &&
   isset($_POST['leaving_timestamp']) && $_POST['leaving_timestamp']!='' || $_POST['leaving_timestamp']=='')

    {
        
        $sql = "UPDATE job_register SET 
                       technician_leaving ='".addslashes($_POST['technician_leaving'])."',
                       leaving_timestamp ='".addslashes($_POST['leaving_timestamp'])."'
                      
                 WHERE jobregister_id='".addslashes($_POST['jobregister_id'])."'";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>