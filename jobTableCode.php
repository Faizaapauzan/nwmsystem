<?php
    
    require 'dbconnect.php';

    if(isset($_GET['jobregister_id'])) {
        $jobregister_id = mysqli_real_escape_string($conn, $_GET['jobregister_id']);
        
        $query = "SELECT * FROM job_register WHERE jobregister_id='$jobregister_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($query_run) == 1) {
            $job = mysqli_fetch_array($query_run);
            
            $res = ['status' => 200, 'message' => 'Job Fetch Successfully', 'data' => $job];
        
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 404, 'message' => 'Job ID Not Found'];
        
            echo json_encode($res);
            
            return;
        }
    }   
?>