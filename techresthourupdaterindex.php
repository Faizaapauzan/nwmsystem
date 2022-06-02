<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['tech_out']) && $_POST['tech_out']!='' || $_POST['tech_out']==''
    &&
   isset($_POST['tech_in']) && $_POST['tech_in']!='' || $_POST['tech_in']==''
    &&
   isset($_POST['ass_out']) && $_POST['ass_out']!='' || $_POST['ass_out']==''
    &&
   isset($_POST['ass_in']) && $_POST['ass_in']!='' || $_POST['ass_in']=='' 
    &&
   isset($_POST['resthour_id']) && $_POST['resthour_id']!='' || $_POST['resthour_id']=='')

    {
        
        $sql = "UPDATE technician_resthour SET
                       tech_out ='".addslashes($_POST['tech_out'])."',
                       tech_in ='".addslashes($_POST['tech_in'])."',
                       ass_out ='".addslashes($_POST['ass_out'])."',
                       ass_in ='".addslashes($_POST['ass_in'])."'
                WHERE  resthour_id ='".addslashes($_POST['resthour_id'])."' ";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>