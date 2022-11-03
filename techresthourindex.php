<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['tech_leader']) && $_POST['tech_leader']!='' || $_POST['tech_leader']==''
    &&
   isset($_POST['techupdate_date']) && $_POST['techupdate_date']!='' || $_POST['techupdate_date']=='')

    {
        
        $sql = "INSERT INTO tech_update (tech_leader, techupdate_date) 
                       
                       VALUES ('".addslashes($_POST['tech_leader'])."',
                               '".addslashes($_POST['techupdate_date'])."')";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>