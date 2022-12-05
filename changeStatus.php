<?php
    
    include 'dbconnect.php';
    
    $response = array('success' => false);
    if (isset($_POST['job_status']) && $_POST['job_status']!='' || $_POST['job_status']==''
            &&
        isset($_POST['departure_timestamp']) && $_POST['departure_timestamp']!='' || $_POST['departure_timestamp']==''
            &&
        isset($_POST['DateAssign']) && $_POST['DateAssign']!='' || $_POST['DateAssign']==''
            &&
        isset($_POST['jobregister_id']) && $_POST['jobregister_id']!='' || $_POST['jobregister_id']=='')
            {
                $sql = "UPDATE job_register SET 
                               job_status ='".addslashes($_POST['job_status'])."',
                               departure_timestamp ='".addslashes($_POST['departure_timestamp'],)."',
                               DateAssign ='".addslashes($_POST['DateAssign'])."'
                        WHERE jobregister_id='".addslashes($_POST['jobregister_id'])."'";
                
                if($conn->query($sql))
                    
                    {
                        $response['success'] = true;
                    }
            }
            
    echo json_encode($response);

?>