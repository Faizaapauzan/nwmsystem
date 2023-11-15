<?php
    
    include 'dbconnect.php';
    
    $response = array('success' => false);
    
    if(isset($_POST['tech_leader']) && $_POST['tech_leader']!='' || $_POST['tech_leader']==''
            &&
        isset($_POST['techupdate_date']) && $_POST['techupdate_date']!='' || $_POST['techupdate_date']==''
            &&
        isset($_POST['tech_clockin']) && $_POST['tech_clockin']!='' || $_POST['tech_clockin']==''
            &&
        isset($_POST['tech_clockout']) && $_POST['tech_clockout']!='' || $_POST['tech_clockout']==''
            &&
        isset($_POST['techupdate_id']) && $_POST['techupdate_id']!='' || $_POST['techupdate_id']==''
            &&
        isset($_POST['attendancecreated_by']) && $_POST['attendancecreated_by']!='' || $_POST['attendancecreated_by']=='') {
            
            $sql = "UPDATE tech_update SET
                           tech_clockin ='".addslashes($_POST['tech_clockin'])."',
                           tech_clockout ='".addslashes($_POST['tech_clockout'])."',
                           attendancecreated_by ='".addslashes($_POST['attendancecreated_by'])."'
                    WHERE tech_leader='".addslashes($_POST['tech_leader'])."'
                    AND techupdate_date='".addslashes($_POST['techupdate_date'])."'";
        
            if($conn->query($sql)) {
                $response['success'] = true;
            }
    }
    
    echo json_encode($response);

?>