<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['technician']) && $_POST['technician']!='' || $_POST['technician']==''
    &&
   isset($_POST['Ass_1']) && $_POST['Ass_1']!='' || $_POST['Ass_1']==''
    &&
   isset($_POST['Ass_2']) && $_POST['Ass_2']!='' || $_POST['Ass_2']==''
    &&
   isset($_POST['Ass_3']) && $_POST['Ass_3']!='' || $_POST['Ass_3']==''
    &&
   isset($_POST['Ass_4']) && $_POST['Ass_4']!='' || $_POST['Ass_4']==''
    &&
   isset($_POST['today_date']) && $_POST['today_date']!='' || $_POST['today_date']=='')

    {
        
        $sql = "INSERT INTO technician_resthour (technician, Ass_1, Ass_2, Ass_3, Ass_4, today_date) 
                       
                       VALUES ('".addslashes($_POST['technician'])."',
                               '".addslashes($_POST['Ass_1'])."',
                               '".addslashes($_POST['Ass_2'])."',
                               '".addslashes($_POST['Ass_3'])."',
                               '".addslashes($_POST['Ass_4'])."',
                               '".addslashes($_POST['today_date'])."')";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>