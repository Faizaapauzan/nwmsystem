<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['technician']) && $_POST['technician']!='' || $_POST['technician']==''
    &&
   isset($_POST['assistant']) && $_POST['assistant']!='' || $_POST['assistant']=='')

    {
        
        $sql = "INSERT INTO technician_resthour (technician, assistant) 
                       
                       VALUES ('".addslashes($_POST['technician'])."',
                               '".addslashes($_POST['assistant'])."')";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>