<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['technician']) && $_POST['technician']!='' || $_POST['technician']==''
    &&
   isset($_POST['today_date']) && $_POST['today_date']!='' || $_POST['today_date']=='')

    {
        
        $sql = "INSERT INTO technician_resthour (technician, today_date) 
                       
                       VALUES ('".addslashes($_POST['technician'])."',
                               '".addslashes($_POST['today_date'])."')";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>