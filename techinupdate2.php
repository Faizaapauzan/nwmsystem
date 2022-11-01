<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['tech_in']) && $_POST['tech_in']!='' || $_POST['tech_in']==''
    &&
   isset($_POST['technician']) && $_POST['technician']!='' || $_POST['technician']==''
    &&
   isset($_POST['today_date']) && $_POST['today_date']!='' || $_POST['today_date']=='')

    {
        
        $sql = "UPDATE technician_resthour SET 
                       tech_in ='".addslashes($_POST['tech_in'])."'
                      
                 WHERE technician='".addslashes($_POST['technician'])."'
                 AND today_date='".addslashes($_POST['today_date'])."'";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>