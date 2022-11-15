<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['job_status']) && $_POST['job_status']!='' || $_POST['job_status']==''
    &&
   isset($_POST['job_assign']) && $_POST['job_assign']!='' || $_POST['job_assign']==''
   &&
   isset($_POST['customer_name']) && $_POST['customer_name']!='' || $_POST['customer_name']==''
   &&
   isset($_POST['requested_date']) && $_POST['jobregister_id']!='' || $_POST['requested_date']=='')

    {
        
        $sql = "UPDATE job_register SET 
                       job_status ='".addslashes($_POST['job_status'])."'
                      
                 WHERE job_assign='".addslashes($_POST['job_assign'])."'
                 AND customer_name='".addslashes($_POST['customer_name'])."'
                 AND requested_date='".addslashes($_POST['requested_date'])."' ";
                 
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>