<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['tech_name']) && $_POST['tech_name']!='' || $_POST['tech_name']==''
    &&
    isset($_POST['support']) && $_POST['support']!='' || $_POST['support']==''
    &&
   isset($_POST['customer_name']) && $_POST['customer_name']!='' || $_POST['customer_name']==''
    &&
   isset($_POST['machine_name']) && $_POST['machine_name']!='' || $_POST['machine_name']==''
    &&
   isset($_POST['requested_date']) && $_POST['requested_date']!='' || $_POST['requested_date']==''
    &&
   isset($_POST['jobregister_id']) && $_POST['jobregister_id']!='' || $_POST['jobregister_id']==''
    &&
   isset($_POST['machine_name']) && $_POST['machine_name']!='' || $_POST['machine_name']=='')

    {
        
        $sql ="INSERT INTO job_update (tech_name, 
                                       support, 
                                       customer_name, 
                                       machine_name, 
                                       requested_date, 
                                       jobregister_id, 
                                       machine_name)

                      VALUES ('".addslashes($_POST['tech_name'])."',
                              '".addslashes($_POST['support'])."',
                              '".addslashes($_POST['customer_name'])."',
                              '".addslashes($_POST['machine_name'])."',
                              '".addslashes($_POST['requested_date'])."',
                              '".addslashes($_POST['jobregister_id'])."',
                              '".addslashes($_POST['machine_name'])."')";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>