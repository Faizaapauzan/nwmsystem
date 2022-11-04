<?php
include 'dbconnect.php';

    $response = array('success' => false);

    if (isset($_POST['updateassign'])) {

        $tech_leader = $_POST['tech_leader'];
        $username = $_POST['username'];
        $techupdate_date = $_POST['techupdate_date'];
    
       $techassistant=implode(",",$username);
    {
     
       $sql = "UPDATE tech_update SET username='$techassistant' WHERE techupdate_date='$techupdate_date' AND tech_leader='$tech_leader'";
       
 if($conn->query($sql))
        {
            $response['success'] = true;
        }
        
        }
    }

echo json_encode($response);

?>