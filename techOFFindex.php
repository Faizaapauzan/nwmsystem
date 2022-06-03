<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['staffregister_id']) && $_POST['staffregister_id']!='' || $_POST['staffregister_id']==''
    &&
   isset($_POST['tech_avai']) && $_POST['tech_avai']!='' || $_POST['tech_avai']=='')

    {
        
        $sql = "UPDATE staff_register SET
                       tech_avai ='".addslashes($_POST['tech_avai'])."'
                WHERE  staffregister_id ='".addslashes($_POST['staffregister_id'])."' ";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>