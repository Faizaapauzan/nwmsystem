<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['technician_departure']) && $_POST['technician_departure']!='' || $_POST['technician_departure']==''
    &&
   isset($_POST['technician_arrival']) && $_POST['technician_arrival']!='' || $_POST['technician_arrival']==''
    &&
   isset($_POST['technician_leaving']) && $_POST['technician_leaving']!='' || $_POST['technician_leaving']==''
    &&
   isset($_POST['jobregisterlastmodify_by']) && $_POST['jobregisterlastmodify_by']!='' || $_POST['jobregisterlastmodify_by']==''
    &&
   isset($_POST['jobregister_id']) && $_POST['jobregister_id']!='' || $_POST['jobregister_id']=='')

    {
        
        $sql = "UPDATE job_register SET
                       technician_departure ='".addslashes($_POST['technician_departure'])."',
                       technician_arrival ='".addslashes($_POST['technician_arrival'])."',
                       technician_leaving ='".addslashes($_POST['technician_leaving'])."',
                       jobregisterlastmodify_by ='".addslashes($_POST['jobregisterlastmodify_by'])."'
                WHERE  jobregister_id ='".addslashes($_POST['jobregister_id'])."' ";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>