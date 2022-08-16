<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['customer_name']) && $_POST['customer_name']!='' || $_POST['customer_name']==''
    &&
   isset($_POST['today_date']) && $_POST['today_date']!='' || $_POST['today_date']==''
    &&
   isset($_POST['jobregister_id']) && $_POST['jobregister_id']!='' || $_POST['jobregister_id']=='')

    {
        
        $sql = "INSERT INTO job_update (customer_name, today_date, jobregister_id)
                VALUES ('".addslashes($_POST['customer_name'])."',
                        '".addslashes($_POST['today_date'])."',
                        '".addslashes($_POST['jobregister_id'])."')";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>