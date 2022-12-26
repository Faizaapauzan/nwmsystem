<?php
    
    include 'dbconnect.php';
    
    $response = array('success' => false);
    
    if(isset($_POST['jobregister_id']) && $_POST['jobregister_id']!='' || $_POST['jobregister_id']==''
        &&
       isset($_POST['technician_departure']) && $_POST['technician_departure']!='' || $_POST['technician_departure']==''
        &&
       isset($_POST['departure_timestamp']) && $_POST['departure_timestamp']!='' || $_POST['departure_timestamp']==''
        &&
       isset($_POST['DateAssign']) && $_POST['DateAssign']!='' || $_POST['DateAssign']==''
        &&
       isset($_POST['job_status']) && $_POST['job_status']!='' || $_POST['job_status']=='')
        
        {
            $sql = "UPDATE job_register SET 
                           technician_departure ='".addslashes($_POST['technician_departure'],)."',
                           departure_timestamp ='".addslashes($_POST['departure_timestamp'],)."',
                           DateAssign ='".addslashes($_POST['DateAssign'],)."',
                           job_status ='".addslashes($_POST['job_status'],)."'
                    WHERE jobregister_id='".addslashes($_POST['jobregister_id'])."'";
            
            if($conn->query($sql))
            
                {
                    $response['success'] = true;
                }
        }

    echo json_encode($response);

?>