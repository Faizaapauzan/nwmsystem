<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['clock_out']) && $_POST['clock_out']!='' || $_POST['clock_out']==''
    &&
   isset($_POST['clock_in']) && $_POST['clock_in']!='' || $_POST['clock_in']==''
    &&
   isset($_POST['attID']) && $_POST['attID']!='' || $_POST['attID']=='')

    {
        
        $sql = "UPDATE tech_attendance SET
                       clock_out ='".addslashes($_POST['clock_out'])."',
                       clock_in ='".addslashes($_POST['clock_in'])."'
                WHERE  attID ='".addslashes($_POST['attID'])."' ";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>