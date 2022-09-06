<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['brandname']) && $_POST['brandname']!='' || $_POST['brandname']=='')

    {
        
        $sql = "INSERT INTO machine_brand (brandname) 
                       
                       VALUES ('".addslashes($_POST['brandname'])."')";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>