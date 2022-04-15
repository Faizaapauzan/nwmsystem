<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['srvcreportnumber']) && $_POST['srvcreportnumber']!='')

    {
        
        $sql = "INSERT INTO servicereport_number (srvcreportnumber) VALUES ('".addslashes($_POST['srvcreportnumber'])."')";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>