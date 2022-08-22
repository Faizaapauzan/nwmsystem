<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['tech_name']) && $_POST['tech_name']!='' || $_POST['tech_name']==''
    &&
   isset($_POST['customer_name']) && $_POST['customer_name']!='' || $_POST['customer_name']==''
    &&
   isset($_POST['requested_date']) && $_POST['requested_date']!='' || $_POST['requested_date']=='')

    {
        
        $sql ="INSERT INTO job_update (tech_name, customer_name, requested_date)
                      VALUES ('".addslashes($_POST['tech_name'])."',
                              '".addslashes($_POST['customer_name'])."',
                              '".addslashes($_POST['requested_date'])."')";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>