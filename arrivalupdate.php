<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['jobregister_id']) && $_POST['jobregister_id']!='' || $_POST['jobregister_id']==''
    &&
   isset($_POST['DateAssign']) && $_POST['DateAssign']!='' || $_POST['DateAssign']==''
    &&
   isset($_POST['technician_arrival']) && $_POST['technician_arrival']!='' || $_POST['technician_arrival']=='')

    {
        $sql = "UPDATE job_register SET 
                technician_arrival ='".addslashes($_POST['technician_arrival'])."',
                DateAssign ='".addslashes($_POST['DateAssign'])."'
                WHERE jobregister_id='".addslashes($_POST['jobregister_id'])."'";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>