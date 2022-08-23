<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['tech_name']) && $_POST['tech_name']!='' || $_POST['tech_name']==''
    &&
   isset($_POST['customer_name']) && $_POST['customer_name']!='' || $_POST['customer_name']==''
    &&
   isset($_POST['requested_date']) && $_POST['requested_date']!='' || $_POST['requested_date']==''
    &&
   isset($_POST['jobregister_id']) && $_POST['jobregister_id']!='' || $_POST['jobregister_id']=='')

    {
        
        $sql ="INSERT INTO job_update (tech_name, customer_name, requested_date, jobregister_id)
                      VALUES ('".addslashes($_POST['tech_name'])."',
                              '".addslashes($_POST['customer_name'])."',
                              '".addslashes($_POST['requested_date'])."',
                              '".addslashes($_POST['jobregister_id'])."')";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>