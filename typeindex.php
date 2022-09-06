<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['brand_id']) && $_POST['brand_id']!='' || $_POST['brand_id']==''
    &&
   isset($_POST['type_name']) && $_POST['type_name']!='' || $_POST['type_name']=='')

    {
        
        $sql = "INSERT INTO machine_type (brand_id, type_name) 
                       
                       VALUES ('".addslashes($_POST['brand_id'])."',
                               '".addslashes($_POST['type_name'])."')";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>