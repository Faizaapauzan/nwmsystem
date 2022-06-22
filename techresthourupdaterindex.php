<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['tech_out']) && $_POST['tech_out']!='' || $_POST['tech_out']==''
    &&
   isset($_POST['tech_in']) && $_POST['tech_in']!='' || $_POST['tech_in']==''
    &&
   isset($_POST['Ass_1']) && $_POST['Ass_1']!='' || $_POST['Ass_1']==''
    &&
   isset($_POST['Ass1_out']) && $_POST['Ass1_out']!='' || $_POST['Ass1_out']==''
    &&
   isset($_POST['Ass1_in']) && $_POST['Ass1_in']!='' || $_POST['Ass1_in']=='' 
    &&
   isset($_POST['Ass_2']) && $_POST['Ass_2']!='' || $_POST['Ass_2']==''
    &&
    isset($_POST['Ass2_out']) && $_POST['Ass2_out']!='' || $_POST['Ass2_out']==''
    &&
   isset($_POST['Ass2_in']) && $_POST['Ass2_in']!='' || $_POST['Ass2_in']=='' 
    &&
   isset($_POST['Ass_3']) && $_POST['Ass_3']!='' || $_POST['Ass_3']==''
    &&
   isset($_POST['Ass3_out']) && $_POST['Ass3_out']!='' || $_POST['Ass3_out']==''
    &&
   isset($_POST['Ass3_in']) && $_POST['Ass3_in']!='' || $_POST['Ass3_in']=='' 
    &&
   isset($_POST['Ass_4']) && $_POST['Ass_4']!='' || $_POST['Ass_4']==''
    &&
   isset($_POST['Ass4_out']) && $_POST['Ass4_out']!='' || $_POST['Ass4_out']==''
    &&
   isset($_POST['Ass4_in']) && $_POST['Ass4_in']!='' || $_POST['Ass4_in']=='' 
    &&
   isset($_POST['resthour_id']) && $_POST['resthour_id']!='' || $_POST['resthour_id']=='')

    {
        
        $sql = "UPDATE technician_resthour SET
                       tech_out ='".addslashes($_POST['tech_out'])."',
                       tech_in ='".addslashes($_POST['tech_in'])."',
                       Ass_1 ='".addslashes($_POST['Ass_1'])."',
                       Ass1_out ='".addslashes($_POST['Ass1_out'])."',
                       Ass1_in ='".addslashes($_POST['Ass1_in'])."',
                       Ass_2 ='".addslashes($_POST['Ass_2'])."',
                       Ass2_out ='".addslashes($_POST['Ass2_out'])."',
                       Ass2_in ='".addslashes($_POST['Ass2_in'])."',
                       Ass_3 ='".addslashes($_POST['Ass_3'])."',
                       Ass3_out ='".addslashes($_POST['Ass3_out'])."',
                       Ass3_in ='".addslashes($_POST['Ass3_in'])."',
                       Ass_4 ='".addslashes($_POST['Ass_4'])."',
                       Ass4_out ='".addslashes($_POST['Ass4_out'])."',
                       Ass4_in ='".addslashes($_POST['Ass4_in'])."'
                WHERE  resthour_id ='".addslashes($_POST['resthour_id'])."' ";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>