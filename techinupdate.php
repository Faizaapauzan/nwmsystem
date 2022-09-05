<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['jobupdate_id']) && $_POST['jobupdate_id']!='' || $_POST['jobupdate_id']==''
    &&
   isset($_POST['tech_in']) && $_POST['tech_in']!='' || $_POST['tech_in']=='')

    {
        
        $sql = "UPDATE job_update SET 
                       tech_in ='".addslashes($_POST['tech_in'])."'
                      
                 WHERE jobupdate_id='".addslashes($_POST['jobupdate_id'])."'";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>