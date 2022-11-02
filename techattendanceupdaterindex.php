<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['tech_clockin']) && $_POST['tech_clockin']!='' || $_POST['tech_clockin']==''
    &&
   isset($_POST['tech_clockout']) && $_POST['tech_clockout']!='' || $_POST['tech_clockout']==''
    &&
   isset($_POST['techupdate_id']) && $_POST['techupdate_id']!='' || $_POST['techupdate_id']=='')

    {
        
        $sql = "UPDATE tech_update SET
                       tech_clockin ='".addslashes($_POST['tech_clockin'])."',
                       tech_clockout ='".addslashes($_POST['tech_clockout'])."'
                WHERE  techupdate_id ='".addslashes($_POST['techupdate_id'])."' ";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>