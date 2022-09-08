<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['machine_id']) && $_POST['machine_id']!='' || $_POST['machine_id']==''
    &&
   isset($_POST['customer_name']) && $_POST['customer_name']!='' || $_POST['customer_name']==''
    &&
   isset($_POST['requested_date']) && $_POST['requested_date']!='' || $_POST['requested_date']==''
    &&
   isset($_POST['job_status']) && $_POST['job_status']!='' || $_POST['job_status']==''
    &&
   isset($_POST['reason']) && $_POST['reason']!='' || $_POST['reason']==''
    &&
   isset($_POST['jobregisterlastmodify_by']) && $_POST['jobregisterlastmodify_by']!='' || $_POST['jobregisterlastmodify_by']==''
    &&
   isset($_POST['jobregister_id']) && $_POST['jobregister_id']!='' || $_POST['jobregister_id']=='')

    {
        
        $sql = "UPDATE job_register SET 
                       job_status ='".addslashes($_POST['job_status'])."',
                       reason ='".addslashes($_POST['reason'])."',
                       jobregisterlastmodify_by ='".addslashes($_POST['jobregisterlastmodify_by'])."' 

                WHERE machine_id='".addslashes($_POST['machine_id'])."'
                 AND customer_name='".addslashes($_POST['customer_name'])."'
                 AND requested_date='".addslashes($_POST['requested_date'])."'";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>