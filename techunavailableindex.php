<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['tech_name']) && $_POST['tech_name']!='' || $_POST['tech_name']==''
    &&
   isset($_POST['reason']) && $_POST['reason']!='' || $_POST['reason']==''
    &&
   isset($_POST['date_from']) && $_POST['date_from']!='' || $_POST['date_from']==''
    &&
   isset($_POST['date_to']) && $_POST['date_to']!='' || $_POST['date_to']=='')

    {
        
        $sql = "INSERT INTO tech_off (tech_name, reason, date_from, date_to) 
                       
                       VALUES ('".addslashes($_POST['tech_name'])."',
                               '".addslashes($_POST['reason'])."',
                               '".addslashes($_POST['date_from'])."',
                               '".addslashes($_POST['date_to'])."')";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>