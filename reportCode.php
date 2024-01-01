<?php
    
    require 'dbconnect.php';
    
    // ========== View Info ==========
    if(isset($_GET['servicereport_id'])) {
        
        $servicereport_id = mysqli_real_escape_string($conn, $_GET['servicereport_id']);
        
        $query = "SELECT * FROM job_register INNER JOIN servicereport ON job_register.jobregister_id = servicereport.jobregister_id  WHERE servicereport.servicereport_id='$servicereport_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($query_run) == 1) {
            
            $student = mysqli_fetch_array($query_run);
            
            $res = ['status' => 200, 'message' => 'Entry Fetch Successfully by id', 'data' => $student];
            
            echo json_encode($res);
            
            return;
        }
    
        else {
            
            $res = ['status' => 404, 'message' => 'Entry Id Not Found'];
            
            echo json_encode($res);
            
            return;
        }
    }

    // ========== View Media ==========
    if (isset($_POST['jobregister_id'])) {
        $jobregister_id = mysqli_real_escape_string($conn, $_POST['jobregister_id']);
    
        $query = "SELECT * FROM technician_photoupdate WHERE jobregister_id='$jobregister_id'";
        $query_run = mysqli_query($conn, $query);
    
        if ($query_run && mysqli_num_rows($query_run) > 0) {
            $photos = [];
    
            while ($photo = mysqli_fetch_assoc($query_run)) {
                $photos[] = ['file_name' => $photo['file_name']];
            }
    
            $res = ['status' => 200, 
                    'message' => 'Photos Fetch Successfully', 
                    'photos' => $photos];

            echo json_encode($res);
        }
        
        else {
            $res = ['status' => 404, 
                    'message' => 'No photos for this job'];
                    
            echo json_encode($res);
        }
    }

    // ========== Delete ==========
    if(isset($_POST['delete_report'])) {
        $servicereport_id = mysqli_real_escape_string($conn, $_POST['servicereport_id']);
        
        $query = "DELETE FROM servicereport WHERE servicereport_id='$servicereport_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if ($query_run) {
            $res = ['status' => 200, 'message' => 'Staff Deleted Successfully'];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Staff Not Deleted'];
        
            echo json_encode($res);
            
            return;
        }
    }
?>