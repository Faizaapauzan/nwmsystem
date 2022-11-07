<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['technician_in']) && $_POST['technician_in']!='' || $_POST['technician_in']==''
    &&
   isset($_POST['tech_leader']) && $_POST['tech_leader']!='' || $_POST['tech_leader']==''
    &&
   isset($_POST['techupdate_date']) && $_POST['techupdate_date']!='' || $_POST['techupdate_date']=='')

    {
        
        $sql = "UPDATE tech_update SET 
                       technician_in ='".addslashes($_POST['technician_in'])."'
                      
                 WHERE tech_leader='".addslashes($_POST['tech_leader'])."'
                 AND techupdate_date='".addslashes($_POST['techupdate_date'])."'";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>