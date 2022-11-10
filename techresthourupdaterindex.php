<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['tech_out']) && $_POST['tech_out']!='' || $_POST['tech_out']==''
    &&
   isset($_POST['technician_in']) && $_POST['technician_in']!='' || $_POST['technician_in']==''
    &&
   isset($_POST['techupdate_id']) && $_POST['techupdate_id']!='' || $_POST['techupdate_id']==''
   &&
   isset($_POST['tech_leader']) && $_POST['tech_leader']!='' || $_POST['tech_leader']==''
   &&
   isset($_POST['techupdate_date']) && $_POST['techupdate_date']!='' || $_POST['techupdate_date']=='')

    {
        
        $sql = "UPDATE tech_update SET
                       tech_out ='".addslashes($_POST['tech_out'])."',
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