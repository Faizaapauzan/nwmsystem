<?php
    
    include 'dbconnect.php';
    
    $response = array('success' => false);
    
    if (isset($_POST['updateassign'])) {
        $tech_leader = $_POST['job_assign'];
        $techupdate_date = $_POST['techupdate_date'];
        $username = $_POST['username'];
        
        $stmt = $conn->prepare("UPDATE tech_update SET username=? WHERE techupdate_date=? AND tech_leader=?");
        
        if ($stmt) {
            $techassistant = implode("\n", $_POST['username']);
            $stmt->bind_param("sss", $techassistant, $techupdate_date, $tech_leader);
            
            if ($stmt->execute()) {
                $response['success'] = true;
            }
            
            else {
                $response['error'] = $stmt->error;
            }
            
            $stmt->close();
        }
        
        else {
            $response['error'] = $conn->error;
        }
    }
    
    ob_clean();
    echo json_encode($response);

?>
