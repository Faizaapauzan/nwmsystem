<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['jobregister_id']) && $_POST['jobregister_id']!='' || $_POST['jobregister_id']==''
    &&
   isset($_POST['tech_in']) && $_POST['tech_in']!='' || $_POST['tech_in']=='')

    {
        
        $sql = "UPDATE job_register SET 
                       tech_in ='".addslashes($_POST['tech_in'])."'
                      
                 WHERE jobregister_id='".addslashes($_POST['jobregister_id'])."'";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>