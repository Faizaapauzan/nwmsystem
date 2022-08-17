<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['storeDate']) && $_POST['storeDate']!='' || $_POST['storeDate']==''
    &&
   isset($_POST['tech_name']) && $_POST['tech_name']!='' || $_POST['tech_name']==''
    &&
   isset($_POST['customer_name']) && $_POST['customer_name']!='' || $_POST['customer_name']==''
    &&
   isset($_POST['technician_departure']) && $_POST['technician_departure']!='' || $_POST['technician_departure']=='')
   
    {
        $sql ="INSERT INTO job_update (storeDate, tech_name, customer_name, technician_departure)
                      VALUES ('".addslashes($_POST['storeDate'])."',
                              '".addslashes($_POST['tech_name'])."',
                              '".addslashes($_POST['customer_name'])."',
                              '".addslashes($_POST['technician_departure'])."')";
               
        if($conn->query($sql))
            {
                $response['success'] = true;
            }
    }

echo json_encode($response);

?>