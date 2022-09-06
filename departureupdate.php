<?php

include 'dbconnect.php';


$response = array('success' => false);

if(isset($_POST['jobupdate_id']) && $_POST['jobupdate_id']!='' || $_POST['jobupdate_id']==''
    &&
   isset($_POST['technician_departure']) && $_POST['technician_departure']!='' || $_POST['technician_departure']==''
    &&
   isset($_POST['storeDate']) && $_POST['storeDate']!='' || $_POST['storeDate']=='')

    {
        
        $sql = "UPDATE job_update SET 
                technician_departure ='".addslashes($_POST['technician_departure'],)."',
                storeDate ='".addslashes($_POST['storeDate'],)."'
                      
                 WHERE jobupdate_id='".addslashes($_POST['jobupdate_id'])."'";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>