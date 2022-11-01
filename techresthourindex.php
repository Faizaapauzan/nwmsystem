<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['techname']) && $_POST['techname']!='' || $_POST['techname']==''
    &&
   isset($_POST['today_date']) && $_POST['today_date']!='' || $_POST['today_date']=='')

    {
        
        $sql = "INSERT INTO technician_resthour (techname, today_date) 
                       
                       VALUES ('".addslashes($_POST['techname'])."',
                               '".addslashes($_POST['today_date'])."')";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>