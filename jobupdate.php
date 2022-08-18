<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['technician_arrival']) && $_POST['technician_arrival']!='' || $_POST['technician_arrival']==''
    &&
   isset($_POST['technician_leaving']) && $_POST['technician_leaving']!='' || $_POST['technician_leaving']==''
    &&
   isset($_POST['tech_out']) && $_POST['tech_out']!='' || $_POST['tech_out']==''
    &&
   isset($_POST['tech_in']) && $_POST['tech_in']!='' || $_POST['tech_in']==''
    &&
   isset($_POST['jobupdate_id']) && $_POST['jobupdate_id']!='' || $_POST['jobupdate_id']=='')
   
    {
        $sql = "UPDATE job_update SET
                       technician_arrival ='".addslashes($_POST['technician_arrival'])."',
                       technician_leaving ='".addslashes($_POST['technician_leaving'])."',
                       tech_out ='".addslashes($_POST['tech_out'])."',
                       tech_in ='".addslashes($_POST['tech_in'])."'
                WHERE  jobupdate_id ='".addslashes($_POST['jobupdate_id'])."' ";
        
        if($conn->query($sql))
            {
                $response['success'] = true;
            }
    }

echo json_encode($response);

?>