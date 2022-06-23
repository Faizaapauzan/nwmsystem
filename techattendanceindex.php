<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['techname']) && $_POST['techname']!='' || $_POST['techname']==''
    &&
   isset($_POST['att_date']) && $_POST['att_date']!='' || $_POST['att_date']=='')

    {
        
        $sql = "INSERT INTO tech_attendance (techname, att_date) 
                       
                       VALUES ('".addslashes($_POST['techname'])."',
                               '".addslashes($_POST['att_date'])."')";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>