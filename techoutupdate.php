<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['jobupdate_id']) && $_POST['jobupdate_id']!='' || $_POST['jobupdate_id']==''
    &&
   isset($_POST['tech_out']) && $_POST['tech_out']!='' || $_POST['tech_out']=='')

    {
        
        $sql = "UPDATE job_update SET 
                       tech_out ='".addslashes($_POST['tech_out'])."'
                      
                 WHERE jobupdate_id='".addslashes($_POST['jobupdate_id'])."'";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>